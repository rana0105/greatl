<?php
Route::get('/','HomeController@index')->name('home.home');
Route::get('public-projects', 'Frontend\ProjectController@getProjectview')->name('projects');
Route::get('getProjectsearch', 'Frontend\ProjectController@getProjectsearch');
Route::get('getType/{id}', 'Frontend\ProjectController@getProjectrate');

Route::get('public-freelancers', 'Frontend\FreelancerController@getFreelancerview')->name('freelancers');
Route::get('getSchange/{id}', 'Frontend\FreelancerController@getSchange');
Route::get('/getfreeSearch', 'Frontend\FreelancerController@getfreeSearch');
Route::get('getProjectsearchf', 'Frontend\FreelancerController@getProjectsearchf');

Route::get('getCategory/{id}', 'Frontend\FreelancerController@getCategory');

Route::get('getSearch/{id}','HomeController@getSearch');

Route::post('searchresult', 'HomeController@postAsearch')->name('search');
Route::post('searchresults', 'HomeController@postAsearchlog')->name('searchlogin');

//Auth::routes();

Route:: get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route:: post('login', 'Auth\LoginController@login');
Route:: post('logout', 'Auth\LoginController@logout')->name('logout');
Route:: post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route:: get('password/reset', 'Auth\ForgotPasswordController@ashowLinkRequestForm')->name('password.request');
Route:: post('password/reset', 'Auth\ResetPasswordController@reset');
Route:: get('password/reset/{token}', 'Auth\ResetPasswordController@ashowResetForm')->name('password.reset');
Route:: get('register', 'Auth\RegisterController@showRegistrationForm');
Route:: post('register', 'Auth\RegisterController@register')->name('register');
Route:: get('user/activation/{token}', 'Auth\RegisterController@userActivation');

// Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::group( ['middleware' => ['auth']], function() {
    Route::group(['middleware' => 'admincheck'], function() {
        Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
        // Start Backend Controller
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'Backend\PermissionController');
        Route::resource('posts', 'PostController');

        Route::resource('project-category', 'Backend\ProjectCategoryController');
        Route::resource('job-level', 'Backend\JobLevelController');
        Route::resource('rate-type', 'Backend\ProjectTypeController');
        Route::resource('skill-category', 'Backend\SkillCategoryController');
        Route::resource('gsetting', 'Backend\GenSettingController');
        Route::resource('servicefee', 'Backend\ServiceFeeController');
    });
    Route::get('freelancer-payment','Backend\PaymentController@freelancerPaymentViewAdmin')->name('freelancer.payment.admin.show');
    Route::get('freelancer-withdraw','Backend\PaymentController@freelancerWithdrawViewAdmin')->name('freelancer.withdraw.admin.show');
    Route::post('freelancer/withdraw-cancel/{id}','Backend\PaymentController@faildWithdrawAmountUpdate')->name('faild.amount');
    Route::post('freelancer/withdraw-retry/{id}','Backend\PaymentController@retryWithdrawAmountUpdate')->name('retry.amount');
    Route::post('freelancer/payment-complete/{id}','Backend\PaymentController@statusAmountUpdate')->name('status.complete');
    // End Backend Controller

    // Start Frontend and Backend Controller

    Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'Backend\AddMoneyController@payWithPaypal',));
    Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'Backend\AddMoneyController@postPaymentWithpaypal',));
    Route::get('paypal', array('as' => 'payment.status','uses' => 'Backend\AddMoneyController@getPaymentStatus',));

    Route::get('/my-projects', 'HomeController@clientProfile')->name('client');
    Route::get('/my-projects/{status}', 'HomeController@clientProfileFilter')->name('client.filter');
	Route::get('/freelancer', 'HomeController@freelancerProfile')->name('freelancer');

    Route::get('client-profile/{id}', 'Frontend\FreelancerController@getClientprofile')->name('client-profile');

    // End Frontend and Backend Controller

    // Start Frontend Controller

    Route::get('projects', 'Frontend\ProjectController@getProjectviewlog')->name('projec');
    Route::get('freelancers', 'Frontend\FreelancerController@getFreelancerviewlog')->name('freelance');

	Route::get('project-post', 'Frontend\ProjectController@getProjectpost');
    Route::post('project-post', 'Frontend\ProjectController@postProjectpost');
    Route::get('project-details/{id}', 'Frontend\ProjectController@getProjectdetails')->name('project.show');
    // paypal payment
    Route::post('project/{project}/payment', 'Backend\PaymentController@checkout')->name('project.payment.checkout');
	Route::get('project/{project}/payment', 'Backend\PaymentController@payment')->name('project.payment');
    // paypal payment
    Route::post('payment','Backend\PaypalTransferController@checkout')->name('payment.paypal');
    // this is after make the payment, PayPal redirect back to your site
    Route::get('payment/{project}/status','Backend\PaypalTransferController@getPaymentStatus')->name('payment.status');

    Route::get('project/{project}/payment-history', 'Backend\PaymentController@getPaymentFreelancer')->name('payment.history');
    Route::post('project/{project}', 'Backend\PaymentController@postPaymentFreelancer')->name('payment.history.post');
    Route::get('freelancer/{jobapply}/payment-history', 'Backend\PaymentController@freelancerPaymentView')->name('freelancer.payment.history');
    Route::post('pdf/history', 'Frontend\FreelancerController@pdfHistory')->name('pdf.history');

    Route::get('client-project-details/{id}', 'Frontend\ProjectController@getProjectdetailsclient')->name('client.project.details');
    Route::get('post-edit/{id}', 'Frontend\ProjectController@getProjectedit');
    Route::get('hire-complete/{id}', 'Frontend\ProjectController@hireComplete');
    Route::get('project-decline/{id}', 'Frontend\ProjectController@projectDecline');

    Route::post('post-updated/{id}', 'Frontend\ProjectController@postProjectupdate');

    Route::get('job-applicant-list/{id}', 'Frontend\ProjectController@getJobapplicantlist');

    Route::get('file-download/{id}', 'Frontend\ProjectController@getFiledownload');

    //Freelancer
	Route::get('freelancer-profile/{freelancer}', 'Frontend\FreelancerController@profileView')->name('client.freelancer.profile');
    Route::get('getSimilerjob', 'Frontend\FreelancerController@getFreelancerprofilesi');
    
	Route::get('freelancer-profile', 'Frontend\FreelancerController@getFreelancerprofileupdate')->name('freelancer.profile.show');

    Route::post('freelancer-profile-update', 'Frontend\FreelancerController@postProfileupdate')->name('freelancer.profile.update');
    Route::post('freelancer.contact.update', 'Frontend\FreelancerController@postContactupdate')->name('freelancer.contact.update');
    Route::post('freelancer-setting-update', 'Frontend\FreelancerController@postSettingupdate')->name('freelancer.setting.update');
    Route::post('freelancer-myprofile-update', 'Frontend\FreelancerController@postMyprofileupdate')->name('freelancer.myprofile.update');
    Route::post('freelancer-password-update', 'Frontend\FreelancerController@postPasswordupdate')->name('freelancer.password.update');
    Route::post('freelancer-membership-update', 'Frontend\FreelancerController@postMembershipupdate')->name('freelancer.membership.update');
    Route::post('freelancer-language-update', 'Frontend\FreelancerController@postLanguageupdate')->name('freelancer.language.update');

    Route::post('language/{id}', 'Frontend\FreelancerController@postLanguagedelete')->name('language');

    //Client
    Route::get('client-profile', 'Frontend\ClientController@getClientprofileupdate')->name('client.profile.show');
    Route::post('client-profile-update', 'Frontend\ClientController@postProfileupdate')->name('client.profile.update');
    Route::post('client-contact-update', 'Frontend\ClientController@postContactupdate')->name('client.contact.update');
    Route::post('client-password-update', 'Frontend\ClientController@postPasswordupdate')->name('client.password.update');
    Route::post('client-membership-update', 'Frontend\ClientController@postMembershipupdate')->name('client.membership.update');
    Route::post('client-language-update', 'Frontend\ClientController@postLanguageupdate')->name('client.language.update');

    

    Route::get('getrateType/{id}', 'Frontend\FreelancerController@getJobrate');

	Route::get('apply-job/{project}', 'Frontend\FreelancerController@getApplyjob');
    Route::post('apply-job/{project}', 'Frontend\JobApplyController@postApplyjob');
    Route::post('hire/{apply}', 'Frontend\JobApplyController@hireForJob')->name('apply.hire');
    Route::post('jobapplydelete/{id}', 'Frontend\JobApplyController@jobapplydelete')->name('jobapplydelete');

    Route::get('complete/{id}', 'Frontend\JobApplyController@getComplete')->name('complete');
    Route::post('complete', 'Frontend\JobApplyController@postComplete');

    Route::get('review/{id}', 'Frontend\JobApplyController@getReview')->name('review');
    Route::post('review', 'Frontend\JobApplyController@postReview');

    Route::get('freelancer-rating/{project_id}/{freelancer_id}', 'Frontend\JobApplyController@getReviewfree')->name('freereview');
    Route::post('freelancer-rating', 'Frontend\JobApplyController@postReviewfree');
    Route::post('project/cancel/{id}', 'Frontend\JobApplyController@cancelForJob')->name('project.cancel.freelancer');


	Route::get('proposal-project/{id}', 'Frontend\FreelancerController@getProposalproject');

	Route::get('freelancer-transaction-history', 'Frontend\FreelancerController@getFreetranshistory');
	Route::get('freelancer-weekly-timesheet', 'Frontend\FreelancerController@getFreeweektime');
    Route::get('balance-overview', 'Frontend\FreelancerController@getBalanceoverview');
	Route::get('balance-withdraw', 'Frontend\FreelancerController@getBalancewithdraw')->name('balance.withdraw');
    Route::post('balance-withdraw', 'Frontend\FreelancerController@postBalancewithdraw')->name('freelance.balance.withdraw');
	Route::get('payment-method', 'Frontend\FreelancerController@getPaymentmethod');

    // End Frontend Controller
    // 
    Route::get('/markAsRead', function () {
     auth()->user()->unreadNotifications->markAsRead();
     
    });

  
    Route::get('message_get', 'Frontend\ChatController@chat');
    Route::get('message/{id}', 'Frontend\JobApplyController@getMessagef')->name('project.freelancer.message');
    Route::post('message', 'Frontend\JobApplyController@postMessagef');
    
    Route::get('project/{project}/apply', 'Frontend\JobApplyController@apply');


    Route::get('check_online', function () {
        // dd(config('broadcasting.connections.pusher'));
        dd(\Pusher::connection('default'));
        $pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            config('broadcasting.connections.pusher.options')
             );
        $response = $pusher->get_channel_info('private-client-chat.5.project.4');
        // $response = $pusher->get( '/channels/private-channel-name/users');
        dd($response);
    });
    Route::namespace('Frontend')->group(function () {
        Route::prefix('notification')->group(function() {
            Route::get('/unread', 'NotificationController@unreadInfo');
        });
        Route::post('project/{project}/with/{user}/message','ChatController@brodcastAndStore')->name('project.message.send');
        Route::get('project/{project}/with/{user}','ChatController@show')->name('project.message.show');
        Route::get('project/{project}/with/{user}/db_message','ChatController@clientData')->name('project.message.database');

        Route::post('project/{project}/message','ChatController@freelancerBrodcastMessage')->name('freelencer.project.message.send');
        Route::get('project/{project}/message','ChatController@freelancerView')->name('freelencer.message.view');
        Route::get('project/{project}/db_message','ChatController@freelancerData')->name('freelencer.message.database');
    });
});

