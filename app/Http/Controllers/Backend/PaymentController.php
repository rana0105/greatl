<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\FreePayment;
use App\Model\FreeWithdraw;
use App\Model\JobApply;
use App\Model\JobPost;
use App\Model\ProjectPayment;
use App\Model\ServiceFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment(JobPost $project)
    {
        return view('project.payment.payment', compact('project'));
    }

    public function checkout(JobPost $project, Request $request)
    {   
        $this->validate($request,[
            'budget' => 'required',
            'payment_method' => 'required',
        ]);
        if(!$project->deposit && !$this->budgetCheck($project->p_buddget, $request->input('budget'))){
            return back()->with('warning','You must be pay min 50% of your project budget');
        }
        if($request->input('payment_method') == 'paypal')
        {
            return (new PaypalTransferController())->checkout($project, $request->all());
        }
        return $request->input('payment_method');
    }

    private function budgetCheck($budget, $paymentRequest)
    {
        return $budget/2 < $paymentRequest;
    }

    public function paymentHistory(JobPost $project)
    {
        $clientPayHistory = $project->projectPayment()
                            ->where('user_id', Auth::user()->id)
                            ->get();
        return view('frontend.paymenthistory', compact('project','clientPayHistory'));
    }

    public function getPaymentFreelancer(Jobpost $project)
    {
        $project = $project->load('hired', 'deposit');
        $clientPayHistory = $project->projectPayment()
                            ->where('user_id', Auth::user()->id)
                            ->get();
        return view('project.payment.client-payment', compact('project', 'clientPayHistory'));
    }
    public function postPaymentFreelancer(Request $request)
    {
        $this->validate($request, [
            'freelancer_id'      => 'required',
            'job_post_id' => 'required',
            'client_pay' => 'required'
        ]);
        $freelancerPayment = new FreePayment;
        $freelancerPayment->user_id = Auth::user()->id;
        $freelancerPayment->freelancer_id = $request->freelancer_id;
        $freelancerPayment->job_post_id = $request->job_post_id;
        $freelancerPayment->client_pay = $request->client_pay;
        $freelancerPayment->freelancer_payment = $this->afterServiceFee($request->client_pay);
        $freelancerPayment->save();
        return redirect()->route('payment.history', $freelancerPayment->job_post_id)->with('success', 'Successfully payment for freelancer');
    }

    private function afterServiceFee($clientPay)
    {
        $serviceFee = ServiceFee::first()->servicefee;
        return $clientPay - (($clientPay * $serviceFee)/100);
    }

    public function freelancerPaymentView($apply)
    {
        $projectId = JobApply::where('id', $apply)->first();
        $freelancerPaymentHistory = FreePayment::where('job_post_id', $projectId->job_post_id)->where('freelancer_id', Auth::user()->id)->get();
        //dd($freelancerPaymentHistory);
        return view('project.payment.freelancer-payment-history', compact('freelancerPaymentHistory'));
    }

    public function freelancerPaymentViewAdmin()
    {
        $paymentFreelancer = FreePayment::all(); 
        return view('project.payment.freelancerPaymentAdmin', compact('paymentFreelancer'));
    }

    public function freelancerWithdrawViewAdmin()
    {
        $freeWithdraw = FreeWithdraw::all();
        return view('project.payment.freelancerWithdrawAdmin', compact('freeWithdraw'));
    }
    
    public function faildWithdrawAmountUpdate(Request $request, $id)
    {
        $faildAmount = FreeWithdraw::find($id);
        $faildAmount->faild_amount = $faildAmount->withdraw_amount;
        $faildAmount->withdraw_amount = 0;
        $faildAmount->save();
        return redirect()->route('freelancer.withdraw.admin.show')->with('success', 'Faild Amount Updated Successfully');
    }

    public function retryWithdrawAmountUpdate(Request $request, $id)
    {
        $faildAmount = FreeWithdraw::find($id);
        $faildAmount->withdraw_amount = $faildAmount->faild_amount;
        $faildAmount->faild_amount = 0;
        $faildAmount->save();
        return redirect()->route('freelancer.withdraw.admin.show')->with('success', 'Retry Amount to paid Successfully');
    }

    public function statusAmountUpdate(Request $request, $id)
    {
        $faildAmount = FreeWithdraw::find($id);
        $faildAmount->status = 1;
        $faildAmount->save();
        return redirect()->route('freelancer.withdraw.admin.show')->with('success', 'Payment Transaction Successfully Completed');
    }
    
}
