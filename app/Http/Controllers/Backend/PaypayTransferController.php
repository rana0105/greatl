<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\JobPost;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\ExecutePayment;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Illuminate\Support\Facades\Auth;

class PaypalTransferController extends Controller
{
    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;

    public function __construct()
    {
        // setup PayPal api context
        $this->mode = config('paypal.settings.mode');

        if( $this->mode == 'sandbox' )
        {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
        }

        if( $this->mode == 'live' )
        {
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
        }

        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function checkout($project, $paymentData)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($paymentData['budget']);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(\URL::route('payment.status', $project))
            ->setCancelUrl(\URL::route('payment.status', $project));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->apiContext);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }
        // dd($payment);
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        if(isset($redirect_url)) {
            // redirect to paypal
            return redirect()->away($redirect_url);
        }

        return redirect()->route('payment.status',  $project)
            ->with('error', 'Unknown error occurred');
    }
    public function getPaymentStatus(Request $request, JobPost $project)
    {
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            return \Redirect::route('project.payment', $project)
                ->with('error', 'Payment failed');
        }

        $payment = Payment::get($request->input('paymentId'), $this->apiContext);

        // PaymentExecution object includes information necessary 
        // to execute a PayPal account payment. 
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->apiContext);
        // dd($result->transactions);
        if ($result->getState() == 'approved') { // payment made
            $confirmPaymentInfo = [
                'payment_id'    => $request->paymentId,
                'token'         => $request->token,
                'PayerID'       => $request->PayerID,
                'merchant_id'   => $result->transactions[0]->payee->merchant_id,
                'merchant_email'=> $result->transactions[0]->payee->email,
                'payment'       => $result->transactions[0]->amount->total,
                'currency'      => $result->transactions[0]->amount->currency,
                'user_id'       => Auth::user()->id
            ];
            // ------------------------------------------
            // all after payment process goes hare
            // ------------------------------------------
            $project->projectPayment()->create($confirmPaymentInfo);
            
            // $project->update(['status' => config('project.status.active')]);
            // here goes the project paymetn status
            return \Redirect::route('client.project.details', $project)
                ->with('success', 'Payment success');
        }
        return \Redirect::route('project.payment',  $project)
            ->with('error', 'Payment failed');
    }

}
