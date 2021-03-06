<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripePaymentController;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

//Route::get('/', function () {
//    return view('frontEnd.index');
//});
Route::get('blog-list', function () {
    return view('frontEnd.blog-list');
});
Route::get('front-login', function () {
    return view('frontEnd.login');
});
Route::get('front-signup', function () {
    return view('frontEnd.signup');
});



Route::get('driver-login-password', function () {
    return view('frontEnd.driver-login-password');
});
Route::get('about-us', function () {
    return view('frontEnd.about');
});
//Front end
Route::get('/', 'frontEnd\HomeController@index');
Route::get('list-latest-news', 'frontEnd\HomeController@listLatestNews');
Route::get('grid-list-latest-news', 'frontEnd\HomeController@gridListLatestNews');
Route::get('latest-news/{id}/details', 'frontEnd\HomeController@latestNewsDetails');
Route::get('latest-news-by-keyword/{keywords}/', 'frontEnd\HomeController@latestNewsByKeywords');
Route::post('front/distanceAndDuration', 'frontEnd\HomeController@distanceAndDuration')->name('front.distanceAndDuration');

Route::get('safety-page', 'frontEnd\HomeController@safetyPage');
Route::get('terms-and-condition', 'frontEnd\HomeController@termsAndCondition');
Route::get('faq-page', 'frontEnd\HomeController@faqPage');
Route::get('driver-guideline', 'frontEnd\HomeController@guideline');
Route::post('open-modal', 'frontEnd\HomeController@openModal');

//Contact us page front end
Route::get('contact-us', 'frontEnd\ContactController@index')->name('contactUs');
Route::post('helpAndSupport', 'frontEnd\ContactController@helpAndSupport');
//End Contact us page front end
//Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
Route::group(['namespace' => 'frontEnd\driver'], function () {
    Route::get('driver-signup', 'DriverLoginController@index')->name('driver.driver-signup');
    Route::post('sendOtp', 'DriverLoginController@sendOtp')->name('driver.sendOtp');
    Route::post('phoneExists', 'DriverLoginController@phoneExists')->name('driver.phoneExists');
    Route::post('verifyOTP', 'DriverLoginController@verifyOTP')->name('driver.verifyOTP');
    Route::post('thirdStepVerify', 'DriverLoginController@thirdStepVerify')->name('driver.thirdStepVerify');
    Route::post('driver-register', 'DriverLoginController@register')->name('driver.driver-register');
    Route::post('driver-login', 'DriverLoginController@login')->name('driver.login');
    Route::get('driverLogin', 'DriverLoginController@driverLogin')->name('driver.driverLogin');
    Route::post('checkEmailOrPhone', 'DriverLoginController@checkEmailOrPhone')->name('driver.checkEmailOrPhone');
    Route::get('driver/verifyEmail/{email}', 'DriverLoginController@verifyEmail')->name('driver.verifyEmail');
    Route::get('mail-verification-success', 'DriverLoginController@mailVerificationSuccess')->name('driver.mail-verification-success');
    Route::post('phoneExistsForgetPass', 'DriverLoginController@phoneExistsForgetPass')->name('driver.phoneExistsForgetPass');
    Route::get('driver-page', 'DriverLoginController@driverPage')->name('driver.driverPage');
    Route::post('resetPassword', 'DriverLoginController@resetPassword')->name('driver.resetPassword');
    
});

Route::group(['namespace' => 'frontEnd\passenger'], function () {
    Route::get('passenger-signup', 'PassengerOperationController@index')->name('passenger.passenger-signup');
    Route::post('passenger/sendOtp', 'PassengerOperationController@sendOtp')->name('passenger.sendOtp');
    Route::post('passenger/phoneExists', 'PassengerOperationController@phoneExists')->name('passenger.phoneExists');
    Route::post('passenger/verifyOTP', 'PassengerOperationController@verifyOTP')->name('passenger.verifyOTP');
    Route::post('passenger-register', 'PassengerOperationController@register')->name('passenger.passenger-register');
    Route::post('passenger-login', 'PassengerOperationController@passenger_login')->name('passenger.passenger_login');
    Route::get('passengerLogin', 'PassengerOperationController@passengerLogin')->name('passenger.passengerLogin');
    Route::post('passenger/checkEmailOrPhone', 'PassengerOperationController@checkEmailOrPhone')->name('passenger.checkEmailOrPhone');
    Route::get('passenger/verifyEmail/{email}', 'PassengerOperationController@verifyEmail')->name('passenger.verifyEmail');
    Route::get('mail-verification-success', 'PassengerOperationController@mailVerificationSuccess')->name('passenger.mail-verification-success');
    Route::post('passenger/phoneExistsForgetPass', 'PassengerOperationController@phoneExistsForgetPass')->name('passenger.phoneExistsForgetPass');
    Route::post('passenger/resetPassword', 'PassengerOperationController@resetPassword')->name('passenger.resetPassword');
    Route::get('rider-page', 'PassengerOperationController@riderPage')->name('passenger.riderPage');
});

Route::group(['namespace' => 'frontEnd'], function () {
    Route::get('driver/login/{provider}', 'SocialLoginController@redirect');
    Route::get('passenger/login/{provider}', 'SocialLoginController@redirect');
    Route::get('login/{provider}/callback', 'SocialLoginController@callback');
});

Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
Route::get('stripe-card-edit', [StripePaymentController::class, 'stripeCardEdit']);
Route::post('stripe-card-update', [StripePaymentController::class, 'stripeCardUpdate']);
Route::get('stripe-charge-add', [StripePaymentController::class, 'stripeChargeAdd']);
Route::get('thanks-stripe', [StripePaymentController::class, 'stripeThanks']);
Route::get('failed-stripe', [StripePaymentController::class, 'stripeFailed']);
Route::get('canceled-stripe', [StripePaymentController::class, 'canceledStripe']);





Auth::routes();

Route::group(['namespace' => 'frontEnd\driver', 'middleware' => ['driver']], function () {
    Route::get('driver-profile', 'DriverLoginController@driverProfile')->name('driver.driverProfile');
    Route::get('driver-edit-profile', 'DriverLoginController@driverEditProfile')->name('driver.driverEditProfile');
    Route::post('driver-update-profile', 'DriverLoginController@driverUpdateProfile')->name('driver.driverUpdateProfile');
    Route::get('driver-dashbord-password', 'DriverLoginController@driverDashBoardPass')->name('driver.driverDashBoardPass');
    Route::post('driver-updatePassword', 'DriverLoginController@updatePassword')->name('driver.updatePassword');
    Route::get('driver-logout', 'DriverLoginController@driverLogout')->name('driver.driverLogout');
    Route::get('add-vehicles', 'DriverLoginController@addVehicles')->name('driver.addVehicles');
    Route::post('store-vehicles', 'DriverLoginController@storeVehicles')->name('driver.storeVehicles');
    Route::get('vehicles-list', 'DriverLoginController@vehiclesList')->name('driver.vehiclesList');
    Route::get('view-vehicle', 'DriverLoginController@viewVehicle')->name('driver.viewVehicle');
    Route::get('edit-vehicle', 'DriverLoginController@editVehicle')->name('driver.editVehicle');
    Route::post('update-vehicle', 'DriverLoginController@updateVehicle')->name('driver.updateVehicle');
    Route::get('delete-vehicle', 'DriverLoginController@deleteVehicle')->name('driver.deleteVehicle');
    Route::get('driver-ride-history', 'DriverLoginController@rideHistory')->name('driver.rideHistory');
    Route::get('driver-ride-complete', 'DriverLoginController@rideComplete')->name('driver.rideComplete');
    Route::get('driver-ride-cancel-history', 'DriverLoginController@rideHistoryCancel')->name('driver.rideHistoryCancel');
    Route::get('driver-notification', 'DriverLoginController@driverNotification')->name('driver.driverNotification');
    Route::get('driver-ride-history-filter', 'DriverLoginController@rideHistoryFilter')->name('driver.rideHistoryFilter');
    Route::get('driver-complete-ride-history-filter', 'DriverLoginController@driverCompletehistoryFilter')->name('driver.driverCompletehistoryFilter');
    Route::get('driver-cancel-ride-history-filter', 'DriverLoginController@driverCancelHistoryFilter')->name('driver.driverCancelHistoryFilter');
    Route::get('driver-ride-details', 'DriverLoginController@rideDetails')->name('driver.rideDetails');
    Route::get('my-bill', 'DriverLoginController@myBill')->name('driver.myBill');
    
});
Route::group(['namespace' => 'frontEnd\passenger', 'middleware' => ['passenger']], function () {
    Route::get('passenger-profile', 'PassengerOperationController@passengerProfile')->name('passenger.passengerProfile');
    Route::get('passenger-logout', 'PassengerOperationController@passengerLogout')->name('driver.passengerLogout');
    Route::get('passenger-edit-profile', 'PassengerOperationController@passengerEditProfile')->name('driver.passengerEditProfile');
    Route::post('passenger-update-profile', 'PassengerOperationController@passengerUpdateProfile')->name('passenger.passengerUpdateProfile');
    Route::get('passenger-password-change', 'PassengerOperationController@passengerPasswordChange')->name('passenger.passengerPasswordChange');
    Route::post('passenger-updatePassword', 'PassengerOperationController@updatePassword')->name('passenger.updatePassword');
    Route::get('passenger-ride-history', 'PassengerOperationController@rideHistory')->name('passenger.rideHistory');
    Route::get('passenger-ride-complete', 'PassengerOperationController@rideComplete')->name('passenger.rideComplete');
    Route::get('passenger-ride-cancel-history', 'PassengerOperationController@rideHistoryCancel')->name('passenger.rideHistoryCancel');
    Route::get('passenger-notification', 'PassengerOperationController@passengerNotification')->name('passenger.passengerNotification');
    Route::get('passenger-ride-history-filter', 'PassengerOperationController@rideHistoryFilter')->name('passenger.rideHistoryFilter');
    Route::get('passenger-complete-ride-history-filter', 'PassengerOperationController@passengerCompletehistoryFilter')->name('passenger.passengerCompletehistoryFilter');
    Route::get('passenger-cancel-ride-history-filter', 'PassengerOperationController@passengerCancelHistoryFilter')->name('passenger.passengerCancelHistoryFilter');
    Route::get('passenger-ride-details', 'PassengerOperationController@rideDetails')->name('passenger.rideDetails');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'HomeController@index')->name('admin.home');

    Route::post('notificationUpdate', 'admin\AdminNotificationController@notificationUpdate');
    Route::post('search', 'admin\AdminNotificationController@search');
    // cab type
    Route::resource('cab-body-type', 'admin\CabTypeController');
    // cab
    Route::get('cab/driver/search', 'admin\CabController@dsearch')->name('cab.dsearch');
    Route::resource('cab', 'admin\CabController');
    // passenger
    Route::get('passenger/{id}/trash', 'admin\PassengerController@trash')->name('passenger.trash');
    Route::get('passenger/trash', 'admin\PassengerController@trashlist')->name('passenger.trashlist');
    Route::get('passenger/inactive', 'admin\PassengerController@inactive')->name('passenger.inactive');
    Route::resource('passenger', 'admin\PassengerController');
    // driver
    Route::get('driver/{id}/trash', 'admin\DriverController@trash')->name('driver.trash');
    Route::get('driver/trash', 'admin\DriverController@trashlist')->name('driver.trashlist');
    Route::get('driver/inactive', 'admin\DriverController@inactive')->name('driver.inactive');
    Route::resource('driver', 'admin\DriverController');
    // driver log
    Route::get('driver-log/filter', 'admin\DriverActivityLogController@filter');
    Route::resource('driver-log', 'admin\DriverActivityLogController');
    // driver bill
    Route::get('driver-bill/search', 'admin\DriverBillController@search');
    Route::resource('driver-bill', 'admin\DriverBillController');

    // Bill charge option
    Route::resource('bill-options', 'admin\BillChargeOptionController');
    // Bill charge sub option
    Route::resource('bill-options-value', 'admin\BillChargeOptionValueController');
    // Bill Settings

    Route::get('bill-settings/option', 'admin\BillSettingsController@option')->name('bill-settings.option');
    Route::resource('bill-settings', 'admin\BillSettingsController');
    // bill settings log
    Route::resource('bill-settings-log', 'admin\BillSettingsLogController');
    // Our services
    Route::resource('our-services', 'admin\OurServiceController');
    // Notification
    Route::resource('notification', 'admin\NotificationController');
    Route::get('tokenList', 'admin\NotificationController@tokenList')->name('notification.tokenList');
    // news category
    Route::resource('news-category', 'admin\NewsCategoryController');
    // NEWS
    Route::get('news/{id}/trash', 'admin\NewsController@trash')->name('news.trash');
    Route::get('news/trash', 'admin\NewsController@trashlist')->name('news.trashlist');

    Route::resource('news', 'admin\NewsController');
    // subscriber
    Route::resource('subscriber', 'admin\SubscriberController');
    // contact
    Route::resource('contact', 'admin\ContactUsController');
    Route::post('admin/contact-view', 'admin\ContactUsController@contactView');
    // Slider
    Route::resource('slider', 'admin\MainSliderController');
    // Ride Apps
    Route::resource('ride-apps', 'admin\RideAppsController');
    // Settings
    Route::resource('settings', 'admin\SettingsController');
    // cab ride
    Route::get('cab-ride/pending-rides', 'admin\CabRideController@pending');
    Route::get('cab-ride/complete-rides', 'admin\CabRideController@completeRide');
    Route::get('cab-ride/filter', 'admin\CabRideController@filter');
    Route::get('cab-ride/printPDFExcel', 'admin\CabRideController@printPDFExcel');
    Route::get('cab-ride/discount', 'admin\CabRideController@discount');
    Route::resource('cab-ride', 'admin\CabRideController');
    // cancel ride
    Route::resource('ride-cancel', 'admin\RideCancelController');
    Route::post('ride-cancel/show', 'admin\RideCancelController@show');
    
    // cancel issue
    Route::resource('cancel-issue', 'admin\CancelIssueController');

    // Taxi Operator 
    Route::resource('taxi-operator', 'admin\TaxiOperatorController');

    // Admin bill setting
    Route::get('fare-setting', 'admin\AdminBillSettingController@index')->name('fare-setting.index');
    Route::get('fare-setting/create', 'admin\AdminBillSettingController@create')->name('fare-setting.create');
    Route::post('fare-setting/store', 'admin\AdminBillSettingController@store')->name('fare-setting.store');
    Route::get('fare-setting/edit/{id}', 'admin\AdminBillSettingController@edit')->name('fare-setting.edit');
    Route::patch('fare-setting/update/{id}', 'admin\AdminBillSettingController@update')->name('fare-setting.update');
    Route::delete('fare-setting/delete/{id}', 'admin\AdminBillSettingController@delete')->name('fare-setting.delete');
    Route::get('fare-setting/reduceFare', 'admin\AdminBillSettingController@reduceFare')->name('fare-setting.reduceFare');
    Route::patch('fare-setting/updateReduceFare/{id}', 'admin\AdminBillSettingController@updateReduceFare')->name('fare-setting.updateReduceFare');

    // user
    Route::resource('user', 'admin\UserController');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::post('profile/profile_image', ['as' => 'profile.profile_image', 'uses' => 'ProfileController@profile_image']);

    Route::get('admin/latest-news', 'admin\LatestNewsController@index')->name('latest-news.index');
    Route::get('admin/latest-news/create', 'admin\LatestNewsController@create')->name('latest-news.create');
    Route::post('admin/latest-news/store', 'admin\LatestNewsController@store')->name('latest-news.store');
    Route::get('admin/latest-news/edit/{id}', 'admin\LatestNewsController@edit')->name('latest-news.edit');
    Route::patch('admin/latest-news/update/{id}', 'admin\LatestNewsController@update')->name('latest-news.update');
    Route::delete('admin/latest-news/{id}', 'admin\LatestNewsController@delete')->name('latest-news.delete');
    
    Route::get('admin/home-slider', 'admin\HomeFaretrimWorksController@index')->name('home-slider.index');
    Route::get('admin/home-slider/create', 'admin\HomeFaretrimWorksController@create')->name('home-slider.create');
    Route::post('admin/home-slider/store', 'admin\HomeFaretrimWorksController@store')->name('home-slider.store');
    Route::get('admin/home-slider/edit/{id}', 'admin\HomeFaretrimWorksController@edit')->name('home-slider.edit');
    Route::patch('admin/home-slider/update/{id}', 'admin\HomeFaretrimWorksController@update')->name('home-slider.update');
    Route::delete('admin/home-slider/{id}', 'admin\HomeFaretrimWorksController@delete')->name('home-slider.delete');
    
    Route::get('admin/driver-slider', 'admin\DriverSliderController@index')->name('driver-slider.index');
    Route::get('admin/driver-slider/create', 'admin\DriverSliderController@create')->name('driver-slider.create');
    Route::post('admin/driver-slider/store', 'admin\DriverSliderController@store')->name('driver-slider.store');
    Route::get('admin/driver-slider/edit/{id}', 'admin\DriverSliderController@edit')->name('driver-slider.edit');
    Route::patch('admin/driver-slider/update/{id}', 'admin\DriverSliderController@update')->name('driver-slider.update');
    Route::delete('admin/driver-slider/{id}', 'admin\DriverSliderController@delete')->name('driver-slider.delete');
    
    Route::get('admin/rider-slider', 'admin\PassengerSliderController@index')->name('rider-slider.index');
    Route::get('admin/rider-slider/create', 'admin\PassengerSliderController@create')->name('rider-slider.create');
    Route::post('admin/rider-slider/store', 'admin\PassengerSliderController@store')->name('rider-slider.store');
    Route::get('admin/rider-slider/edit/{id}', 'admin\PassengerSliderController@edit')->name('rider-slider.edit');
    Route::patch('admin/rider-slider/update/{id}', 'admin\PassengerSliderController@update')->name('rider-slider.update');
    Route::delete('admin/rider-slider/{id}', 'admin\PassengerSliderController@delete')->name('rider-slider.delete');
    
    Route::get('admin/cms-page', 'admin\CMSController@index')->name('cms-page.index');
    Route::get('admin/cms-page/create', 'admin\CMSController@create')->name('cms-page.create');
    Route::post('admin/cms-page/store', 'admin\CMSController@store')->name('cms-page.store');
    Route::get('admin/cms-page/edit/{id}', 'admin\CMSController@edit')->name('cms-page.edit');
    Route::patch('admin/cms-page/update/{id}', 'admin\CMSController@update')->name('cms-page.update');
    Route::delete('admin/cms-page/{id}', 'admin\CMSController@delete')->name('cms-page.delete');

    Route::get('admin/text-widget', 'admin\TextWidgetController@index')->name('text-widget.index');
    Route::get('admin/text-widget/create', 'admin\TextWidgetController@create')->name('text-widget.create');
    Route::post('admin/text-widget/store', 'admin\TextWidgetController@store')->name('text-widget.store');
    Route::get('admin/text-widget/edit/{id}', 'admin\TextWidgetController@edit')->name('text-widget.edit');
    Route::patch('admin/text-widget/update/{id}', 'admin\TextWidgetController@update')->name('text-widget.update');
    Route::delete('admin/text-widget/{id}', 'admin\TextWidgetController@delete')->name('text-widget.delete');

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});




