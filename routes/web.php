<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\RoutesNotifications;
use App\Http\Controllers\StripeController;
use Illuminate\Http\Request;


Auth::routes();



Route::get('/email/verify/{id}/{hash}',  [App\Http\Controllers\Auth\SupplierVerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', [App\Http\Controllers\Auth\SupplierVerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// CurrencyController Route
Route::get('/Currency/{id}', [App\Http\Controllers\CurrencyController::class, 'setCurrency'])->name('currency');

Route::get('reload-captcha', function(){
  return response()->json(['captcha'=> captcha_img()]);
});

// Language Switch Route
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

// MessageController Route
Route::get('/fetch-old-messages-user', [App\Http\Controllers\MessagesController::class, 'getOldMessagesUser']);
Route::post('/send-user', [App\Http\Controllers\MessagesController::class, 'postSendMessageUser']);
Route::get('/load-latest-messages-user',  [App\Http\Controllers\MessagesController::class, 'getLoadLatestMessagesSeller']);
Route::get('/load-latest-messages',  [App\Http\Controllers\MessagesController::class, 'getLoadLatestMessages']);
Route::post('/send', [App\Http\Controllers\MessagesController::class, 'postSendMessage']);
Route::get('/fetch-old-messages', [App\Http\Controllers\MessagesController::class, 'getOldMessages']);


// Seller Profile Page
Route::get('seller/profile/{id}', [App\Http\Controllers\MainController::class, 'seller'])->name('seller.profile');
Route::post('seller/follow', [App\Http\Controllers\FollowerController::class, 'store'])->name('seller.follow');
Route::post('seller/unfollow', [App\Http\Controllers\FollowerController::class, 'destroy'])->name('seller.unfollow');

Route::post('report', [App\Http\Controllers\ReportController::class, 'store'])->name('report');

// Customer Login Routes
Route::prefix('/customer')->name('customer.')->namespace('App\Http\Controllers\Customer\Auth')->group(function () {

    //Login Routes
    // Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::post('/logout', 'LoginController@logout')->name('logout');

    //Forgot Password Routes
    // Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    // Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Reset Password Routes
    // Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    // Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');
});

Route::namespace('Auth')->group(function () {

    //Login Routes
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login')->middleware('if_not_login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::post('/register/customer', [App\Http\Controllers\Auth\RegisterController::class, 'createCustomer'])->name('register.customer');

    //Forgot Password Routes
    // Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    // Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    //Reset Password Routes
    // Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    // Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
});


//  ***** Website Front Pages Route *****

// MainController Routes
Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('index');
Route::get('/search', [App\Http\Controllers\MainController::class, 'search'])->name('search');
Route::get('/customer-home', [App\Http\Controllers\CustomerHomeController::class, 'index'])->name('customer-home');
Route::get('/product-details/{id}', [App\Http\Controllers\MainController::class, 'productDetails'])->name('product-details');
Route::get('/auction-product/{id}', [App\Http\Controllers\MainController::class, 'auctionDetails'])->name('auction-product')->middleware('auth:customer');
Route::get('/category/products/{id}', [App\Http\Controllers\MainController::class, 'categoryProducts'])->name('category-products');
Route::get('/Seller/products/{id}', [App\Http\Controllers\MainController::class, 'SellerProducts'])->name('Seller-products');
Route::get('/about-us', [App\Http\Controllers\MainController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [App\Http\Controllers\MainController::class, 'contactUs'])->name('contact-us');
Route::get('/blogs', [App\Http\Controllers\MainController::class, 'blogs'])->name('blogs');

// Auction Controller Routes
Route::get('/auction', [App\Http\Controllers\AuctionController::class, 'index'])->name('auction');
Route::get('/auction/category/{id}', [App\Http\Controllers\AuctionController::class, 'category_products'])->name('auction-category');
Route::get('/auction-details/{id}', [App\Http\Controllers\AuctionController::class, 'auctionDetails'])->name('auction-details');
Route::get('/auction-details/{id}', [App\Http\Controllers\AuctionController::class, 'auctionDetails'])->name('auction-details');

// Bid Controller Routes
Route::post('/submit-bid', [App\Http\Controllers\BidController::class, 'submitBid'])->name('submit-bid');

// CartController Routes
// Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
// Route::get('/add-to-cart/{id}', [App\Http\Controllers\CartController::class, 'addToCart']);
// Route::patch('/update-cart', [App\Http\Controllers\CartController::class, 'update']);
// Route::delete('/remove-from-cart', [App\Http\Controllers\CartController::class, 'remove']);

// ***** Customer Routes *****

// CustomerHomeController Routes
Route::get('/setting', [App\Http\Controllers\CustomerHomeController::class, 'setting'])->name('setting');
Route::post('/setting/{id}', [App\Http\Controllers\CustomerHomeController::class, 'settingSave'])->name('setting.save');
Route::post('/password/{id}', [App\Http\Controllers\CustomerHomeController::class, 'changepass'])->name('password.save');

// Deposit Via Paypal Routes
 Route::post('/customer/deposit-in-wallet-via-paypal', [App\Http\Controllers\CustomerWalletDepositController::class, 'deposit'])->name('customer-deposit-in-wallet-via-paypal');
 Route::post('/user/deposit-in-wallet-via-paypal', [App\Http\Controllers\UserWalletDepositController::class, 'deposit'])->name('user-deposit-in-wallet-via-paypal');

// Wishlist Controller
Route::resource('/wishlist', App\Http\Controllers\WishlistController::class)->names('wishlist');

// Customer Forget Password Routes
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('cus.forget.password.get');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('cus.forget.password.post');
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('cus.reset.password.get');
Route::post('reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('cus.reset.password.post');

Route::get('/verify_email', [App\Http\Controllers\Auth\VerificationController::class,'show'])->middleware('web');

Route::get('user/restriction', [App\Http\Controllers\HomeController::class, 'restrictedPage'])->name('user.restriction');

Route::group(['middleware' => 'web'], function () {
  Route::get('/cities/{id}', [App\Http\Controllers\HelperController::class, 'cities'])->name('cities');
    Route::group(['middleware' => ['is_user_verified','is_user_admin_verified']], function() {
          Route::post('/verify/supplier/{id}', [App\Http\Controllers\Supplier\SupplierController::class, 'verify'])->name('supplier.verify');
          Route::post('/unverify/supplier/{id}', [App\Http\Controllers\Supplier\SupplierController::class, 'unverify'])->name('supplier.unverify');


          Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
          Route::get('/checkout_cities/{id}', [App\Http\Controllers\CartController::class, 'checkout_cities'])->name('checkout-cities');
          Route::post('/checkout/order-submit', [App\Http\Controllers\CartController::class, 'submit_order'])->name('order-submit');
          Route::post('/checkout/order-Product', [App\Http\Controllers\CartController::class, 'orderProduct'])->name('order-product');


          Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
          Route::get('/products_sub_category/{id}', [App\Http\Controllers\HelperController::class, 'sub_categories'])->name('products_sub_categories');
          Route::get('/user_products/{id}', [App\Http\Controllers\HelperController::class, 'user_products'])->name('user_products');
          Route::get('/all-products', [App\Http\Controllers\HelperController::class, 'all_products'])->name('all-products');
          Route::post('/featured', [App\Http\Controllers\HelperController::class, 'featured'])->name('featured');
          Route::get('/all-auctions', [App\Http\Controllers\AdminController::class, 'auctions'])->name('admin_auctions');
          Route::get('/all-product-adds', [App\Http\Controllers\AdminController::class, 'product_adds'])->name('admin_product_adds');
          Route::get('/support', [App\Http\Controllers\AdminController::class, 'support'])->name('admin_support');

          Route::get('/suppliers', [App\Http\Controllers\HomeController::class, 'suplliers'])->name('suppliers');
          Route::get('/buyyers', [App\Http\Controllers\HomeController::class, 'buyyers'])->name('buyers');
          // Admin Supplier Wallet
          Route::get('/suppliers/wallet/create/{id}', [App\Http\Controllers\Supplier\SupplierController::class, 'addFunds'])->name('suppliers.add.wallet');
          Route::post('/suppliers/wallet/store', [App\Http\Controllers\Supplier\SupplierController::class, 'storeFunds'])->name('suppliers.store.wallet');

          Route::get('/suppliers/voucher/create/{id}', [App\Http\Controllers\Admin\VoucherController::class, 'create'])->name('suppliers.add.voucher');
          Route::post('/suppliers/voucher/store', [App\Http\Controllers\Admin\VoucherController::class, 'store'])->name('suppliers.store.voucher');

          Route::get('/suppliers/create', [App\Http\Controllers\Supplier\SupplierController::class, 'create'])->name('supplier.create');
          Route::post('/suppliers/store', [App\Http\Controllers\Supplier\SupplierController::class, 'store'])->name('supplier.store');

          // Admin Supplier and Companies Notification
          Route::get('/notification/{id}', [App\Http\Controllers\AdminNotificationController::class, 'create'])->name('notification.create');
          Route::post('/notification/send', [App\Http\Controllers\AdminNotificationController::class, 'sendNotification'])->name('notification.send');

          // Admin Cutomer  Notification
          Route::get('/customer/notification/{id}', [App\Http\Controllers\AdminNotificationController::class, 'customerCreate'])->name('notification.customer.create');
          Route::post('/customer/notification/send', [App\Http\Controllers\AdminNotificationController::class, 'customerSendNotification'])->name('notification.customer.send');

          // Assign Suppliers Services Routes
          Route::get('/suppliers/services/create/{id}', [App\Http\Controllers\Supplier\ServiceController::class, 'create'])->name('admin.suppliers.services.create');
          Route::post('/suppliers/services/store', [App\Http\Controllers\Supplier\ServiceController::class, 'store'])->name('admin.suppliers.services.store');

          // Adminn Companies Routes
          Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies');
          Route::post('/companies/verify/company/{id}', [App\Http\Controllers\CompanyController::class, 'verify'])->name('company.verify');
          Route::post('/companies/unverify/company/{id}', [App\Http\Controllers\CompanyController::class, 'unverify'])->name('company.unverify');

          // Admin Add Products of Suppliers
          Route::get('/suppliers/product/create/{id}', [App\Http\Controllers\AdminProductController::class, 'create'])->name('admin.supplier.product.create');
          Route::post('/suppliers/product/store', [App\Http\Controllers\AdminProductController::class, 'store'])->name('admin.supplier.product.store');

          // Supplier Change Status of Orders
          Route::get('/suppliers/product/status/{id}', [App\Http\Controllers\Supplier\OrderNotificationController::class, 'index'])->name('admin.supplier.order_status');
          Route::post('/suppliers/product/status/store', [App\Http\Controllers\Supplier\OrderNotificationController::class, 'store'])->name('admin.supplier.order_status.store');

          Route::delete('/buyyers/{id}/delete', [App\Http\Controllers\HomeController::class, 'delete_buyyer'])->name('delete_buyyer');
          Route::delete('/suplliers/{id}/delete', [App\Http\Controllers\HomeController::class, 'delete_supllier'])->name('delete_supllier');

          Route::get('/user/setting', [App\Http\Controllers\HomeController::class, 'setting'])->name('user.setting');
          Route::post('/user/setting/{id}', [App\Http\Controllers\HomeController::class, 'settingSave'])->name('user.setting.save');
          Route::post('/user/password/{id}', [App\Http\Controllers\HomeController::class, 'changepass'])->name('user.password.save');


          Route::resource('/city', App\Http\Controllers\CityController::class);
          Route::resource('/add-package-price', App\Http\Controllers\AddPackagePriceController::class);
          Route::resource('/products-category', App\Http\Controllers\ProductsCategoryController::class);
          Route::resource('/products-sub-category', App\Http\Controllers\ProductsSubCategoryController::class);
          Route::get('/products/share/{id}', [App\Http\Controllers\ProductsController::class, 'shareProduct'])->name('product.share');
          Route::resource('/products', App\Http\Controllers\ProductsController::class);
          Route::resource('/Advertisement', App\Http\Controllers\AdvertisementController::class);
          Route::resource('/country', CountryController::class);
          Route::resource('/colors', App\Http\Controllers\ColorController::class);
          Route::resource('/frontend-slider', App\Http\Controllers\FrontendSlidersController::class);
          Route::get('/Admin/Advertisement', [App\Http\Controllers\AdminAddsController::class, 'Addvertisement'])->name('add-show');
          Route::get('/frontend-slider/approve/{id}', [App\Http\Controllers\AdminAddsController::class, 'approve'])->name('add-approve');
          Route::get('/frontend-slider/reject/{id}', [App\Http\Controllers\AdminAddsController::class, 'reject'])->name('add-reject');
          Route::resource('/product-add', App\Http\Controllers\ProductAddController::class);
          Route::resource('/product-auction', App\Http\Controllers\ProductAuctionController::class);
          Route::resource('/wallet', App\Http\Controllers\WalletController::class);
          Route::resource('/customer-wallet', App\Http\Controllers\CustomerWalletController::class);
          Route::get('/Requests', [App\Http\Controllers\MessagesController::class, 'toSeller'])->name('customer_request');
          Route::get('supplier/order-chat', [App\Http\Controllers\ProductPurchase\ChatController::class, "chat"])->name('supplier.chat');
          Route::post('supplier/order', [App\Http\Controllers\ProductPurchase\OrderController::class, "order"])->name('supplier.order');
          Route::get('/seller/order', [App\Http\Controllers\MessagesController::class, 'toSeller'])->name('seller_request');
          Route::get('/Request/customer', [App\Http\Controllers\MessagesController::class, 'toCustomer'])->name('customer_chat');
          Route::get('/customer-orders', [App\Http\Controllers\OrderController::class, 'customer_orders'])->name('customer-orders');
          Route::get('/user-orders', [App\Http\Controllers\OrderController::class, 'user_orders'])->name('user-orders');
          Route::get('/admin-orders', [App\Http\Controllers\OrderController::class, 'admin_orders'])->name('all-orders');
          Route::get('/pending-bids', [App\Http\Controllers\BidController::class, 'pending_bids'])->name('pending-bids');
          Route::get('/all-pending-bids/{id}', [App\Http\Controllers\BidController::class, 'all_pending_bids'])->name('all-pending-bids');
          Route::get('/end-bid/{id}', [App\Http\Controllers\BidController::class, 'end_bid'])->name('end-bid');
          Route::get('/accepted-bids', [App\Http\Controllers\BidController::class, 'accept_bid'])->name('accepted-bids');
          Route::get('/rejected-bids', [App\Http\Controllers\BidController::class, 'reject_bid'])->name('rejected-bids');
          Route::get('/all-rejected-bids/{id}', [App\Http\Controllers\BidController::class, 'all_reject_bids'])->name('all-rejected-bids');
          Route::get('/customer-bids', [App\Http\Controllers\BidController::class, 'customer_bids'])->name('customer-bids');
          Route::get('/all-bids', [App\Http\Controllers\BidController::class, 'admin_bids'])->name('all-bids');
          Route::get('/orders', [App\Http\Controllers\OrderController::class, 'orders'])->name('orders');
          Route::get('/orders/create/{group_id}', [App\Http\Controllers\ProductPurchase\OrderController::class, 'create'])->name('order.create');
          Route::post('/orders/store', [App\Http\Controllers\ProductPurchase\OrderController::class, 'store'])->name('order.store');
          Route::get('/pending-orders', [App\Http\Controllers\OrderController::class, 'pending_orders'])->name('pending-orders');
          Route::get('/order-approve/{id}', [App\Http\Controllers\OrderController::class, 'order_approve']);
          Route::get('/order-cancel/{id}', [App\Http\Controllers\OrderController::class, 'order_cancel']);
          Route::get('/check-review/{id}', [App\Http\Controllers\OrderController::class, 'check_review']);
          Route::post('/submit-review', [App\Http\Controllers\OrderController::class, 'submit_review'])->name('submit-review');

          Route::get('/reports-management', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('product.reports');
          Route::get('/reports-management/proof/{id}', [App\Http\Controllers\Admin\ReportController::class, 'report_proof'])->name('product.reports.proof');
          Route::post('/reports-management/terminate', [App\Http\Controllers\Admin\ReportController::class, 'terminate'])->name('report.terminate');


          //withdrawRequestAdmin
          Route::get('/Withdraw-Request/Customer', [App\Http\Controllers\WithdrawRequestController::class, 'showCustomerRequest'])->name('withdraw-customer');
          Route::get('/Withdraw-Request/Seller', [App\Http\Controllers\WithdrawRequestController::class, 'showSellerRequest'])->name('withdraw-seller');
          Route::get('/request-approve/{role}/{id}', [App\Http\Controllers\WithdrawRequestController::class, 'request_approve'])->name('request-approve');
          Route::get('/request-cancel/{role}/{id}', [App\Http\Controllers\WithdrawRequestController::class, 'request_cancel'])->name('request-cancel');

          //order Confirmation
          Route::get('/order/approve/{id}', [App\Http\Controllers\OrderConfirmationController::class, 'approve'])->name('order-approve');
          Route::get('/order/reject/{id}', [App\Http\Controllers\OrderConfirmationController::class, 'reject'])->name('order-reject');
          //paypal
          Route::post('handle-payment', [App\Http\Controllers\PayPalPaymentController::class, 'handlePayment'])->name('make.payment');
          Route::get('cancel-payment', [App\Http\Controllers\PayPalPaymentController::class, 'paymentCancel'])->name('cancel.payment');
          Route::get('payment-success', [App\Http\Controllers\PayPalPaymentController::class, 'paymentSuccess'])->name('success.payment');

          //Stripe payment gateway
          Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
          Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');
          Route::post('/deposit-in-wallet', [App\Http\Controllers\WalletController::class, 'depositInWallet'])->name('deposit-in-wallet');
          Route::post('/deposit-in-customer-wallet', [App\Http\Controllers\CustomerWalletController::class, 'depositInWallet'])->name('deposit-in-customer-wallet');
          Route::post('/customer-withdraw-request', [App\Http\Controllers\CustomerWalletController::class, 'customerWithdrawRequest'])->name('customer-withdraw-request');
          Route::post('/user-withdraw-request', [App\Http\Controllers\WalletController::class, 'userWithdrawRequest'])->name('user-withdraw-request');

          // Admin Wallet
          Route::get('/admin-wallet', [App\Http\Controllers\Admin\WalletController::class, 'index'])->name('admin.wallet');
          Route::get('/admin-wallet/create', [App\Http\Controllers\Admin\WalletController::class, 'create'])->name('admin.wallet.create');
          Route::post('/admin-wallet/store', [App\Http\Controllers\Admin\WalletController::class, 'store'])->name('admin.wallet.store');
    });
});


// Login With Google Routes
Route::get('auth/google',  [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('google_user');
Route::get('auth/google/callbackuser', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback'])->name('user.callaback');
Route::get('auth/google/customer',  [App\Http\Controllers\Customer\Auth\LoginController::class, 'redirectToGoogle'])->name('google_customer');
Route::get('auth/google/callbackcustomer', [App\Http\Controllers\Customer\Auth\LoginController::class, 'handleGoogleCallback'])->name('customer.callaback');


// User Forget Password Route
Route::get('forget-password/seller', [App\Http\Controllers\User\Auth\ForgetPassword::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password/seller', [App\Http\Controllers\User\Auth\ForgetPassword::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/seller/{token}', [App\Http\Controllers\User\Auth\ForgetPassword::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password/seller', [App\Http\Controllers\User\Auth\ForgetPassword::class, 'submitResetPasswordForm'])->name('reset.password.post');

// Company Authentication Routes
Route::group(['middleware' => 'company_authenticated'],function(){
  Route::get('company/register',[App\Http\Controllers\Company\Auth\HomeController::class, "showRegistrationForm"])->name("company.register");
  Route::get('company/login',[App\Http\Controllers\Company\Auth\HomeController::class, "showLoginForm"])->name("company.login");

  Route::post('company/register/shipment',[App\Http\Controllers\Company\Auth\Shipment\RegisterController::class, "register"])->name("company.shipment.register");
  Route::post('company/register/clearance',[App\Http\Controllers\Company\Auth\Clearance\RegisterController::class, "register"])->name("company.clearance.register");

  Route::post('company/login/shipment',[App\Http\Controllers\Company\Auth\Shipment\LoginController::class, "login"])->name("company.shipment.login");
  Route::post('company/login/clearance',[App\Http\Controllers\Company\Auth\Clearance\LoginController::class, "login"])->name("company.clearance.login");
});
Route::post('company/logout',[App\Http\Controllers\Company\Auth\LogoutController::class, "logout"])->name("company.logout");


Route::get('send-email', [App\Http\Controllers\SendEmailController::class, "index"])->name("send.email");
Route::get('shipment/send-email', [App\Http\Controllers\SendEmailController::class, "shipment_index"])->name("shipment.send.email");
Route::get('clearance/send-email', [App\Http\Controllers\SendEmailController::class, "clearance_index"])->name("clearance.send.email");
Route::post('send-email', [App\Http\Controllers\SendEmailController::class, "send"])->name("send.email.store");


// Shipment User RoutesNotifications
Route::group(['middleware' => 'shipment_user','prefix' => 'company/shipment'], function () {

  Route::group(['middleware' => 'verify:shipment'], function() {
    // Dashboard
    Route::get('/dashboard',[App\Http\Controllers\Company\Shipment\ShipmentController::class, "index"])->name("shipment.index");
    // Shipment Account Services
    Route::group(['middleware' => 'verified_by_admin:shipment'], function(){

      Route::get('/services-management',[App\Http\Controllers\Company\Shipment\ServiceController::class, "index"])->name("shipment.service.index");
      Route::get('/services-management/create',[App\Http\Controllers\Company\Shipment\ServiceController::class, "create"])->name("shipment.service.create");
      Route::get('/services-management/show/{id}',[App\Http\Controllers\Company\Shipment\ServiceController::class, "show"])->name("shipment.service.show");
      Route::post('/services-management/store',[App\Http\Controllers\Company\Shipment\ServiceController::class, "store"])->name("shipment.service.store");
      Route::post('/services-management/update',[App\Http\Controllers\Company\Shipment\ServiceController::class, "update"])->name("shipment.service.update");
      Route::post('/services-management/delete',[App\Http\Controllers\Company\Shipment\ServiceController::class, "delete"])->name("shipment.service.delete");

      Route::get('/order-management',[App\Http\Controllers\Company\Shipment\OrderController::class, "index"])->name("shipment.orders");
      Route::get('/order-management/change_status/{order_id}',[App\Http\Controllers\Company\Shipment\OrderController::class, "status"])->name("shipment.order.status");
      Route::post('/order-management/change_status',[App\Http\Controllers\Company\Shipment\OrderController::class, "changeStatus"])->name("shipment.order.status.change");

      // Shipment Advertisement Routes
      Route::get('advertisement-management',[App\Http\Controllers\Company\Shipment\AdvertisementController::class, "index"])->name("shipment.advertisement");
      Route::get('advertisement-management/create',[App\Http\Controllers\Company\Shipment\AdvertisementController::class, "create"])->name("shipment.advertisement.create");
      Route::get('advertisement-management/edit/{id}',[App\Http\Controllers\Company\Shipment\AdvertisementController::class, "edit"])->name("shipment.advertisement.edit");
      Route::post('advertisement-management/store',[App\Http\Controllers\Company\Shipment\AdvertisementController::class, "store"])->name("shipment.advertisement.store");
      Route::post('advertisement-management/update',[App\Http\Controllers\Company\Shipment\AdvertisementController::class, "update"])->name("shipment.advertisement.update");
      Route::post('advertisement-management/delete',[App\Http\Controllers\Company\Shipment\AdvertisementController::class, "delete"])->name("shipment.advertisement.delete");

      Route::get('wallet',[App\Http\Controllers\Company\Shipment\WalletController::class, "index"])->name("shipment.wallet.index");

      // Route::get('/conversation', [App\Http\Controllers\ProductPurchase\ChatController::class, "shipmentChat"])->name('shipment.chat');

    });
    Route::get('/features/not_allowed',[App\Http\Controllers\Company\HomeController::class, "restrictedPage"])->name("shipment.features.restriction");
  });
  // Verification Routes
  Route::get('/email/verify', [App\Http\Controllers\Company\Auth\Shipment\VerificationController::class, "show"])->name('shipment.verification.notice');
  Route::get('/email/verify/{id}/{hash}/{email}', [App\Http\Controllers\Company\Auth\Shipment\VerificationController::class, "verify"])->name('shipment.verification.verify');
  Route::post('/email/resend',  [App\Http\Controllers\Company\Auth\Shipment\VerificationController::class, "resend"])->name('shipment.verification.resend');
});

// Clearance Account Routes

Route::group(['middleware' => 'clearance_user','prefix' => 'company/clearance'], function () {

  Route::group(['middleware' => 'verify:clearance'], function(){
    // Dashboard
    Route::get('/dashboard',[App\Http\Controllers\Company\Clearance\ClearanceController::class, "index"])->name("clearance.index");
    Route::group(['middleware' => 'verified_by_admin:clearance'], function(){
      // Clearance Account Services Routes
      Route::get('/services-management',[App\Http\Controllers\Company\Clearance\ServiceController::class, "index"])->name("clearance.service.index");
      Route::get('/services-management/create',[App\Http\Controllers\Company\Clearance\ServiceController::class, "create"])->name("clearance.service.create");
      Route::get('/services-management/show/{id}',[App\Http\Controllers\Company\Clearance\ServiceController::class, "show"])->name("clearance.service.show");
      Route::post('/services-management/store',[App\Http\Controllers\Company\Clearance\ServiceController::class, "store"])->name("clearance.service.store");
      Route::post('/services-management/update',[App\Http\Controllers\Company\Clearance\ServiceController::class, "update"])->name("clearance.service.update");
      Route::post('/services-management/delete',[App\Http\Controllers\Company\Clearance\ServiceController::class, "delete"])->name("clearance.service.delete");

      // Clearance Advertisement Routes
      Route::get('advertisement-management',[App\Http\Controllers\Company\Clearance\AdvertisementController::class, "index"])->name("clearance.advertisement");
      Route::get('advertisement-management/create',[App\Http\Controllers\Company\Clearance\AdvertisementController::class, "create"])->name("clearance.advertisement.create");
      Route::get('advertisement-management/edit/{id}',[App\Http\Controllers\Company\Clearance\AdvertisementController::class, "edit"])->name("clearance.advertisement.edit");
      Route::post('advertisement-management/store',[App\Http\Controllers\Company\Clearance\AdvertisementController::class, "store"])->name("clearance.advertisement.store");
      Route::post('advertisement-management/update',[App\Http\Controllers\Company\Clearance\AdvertisementController::class, "update"])->name("clearance.advertisement.update");
      Route::post('advertisement-management/delete',[App\Http\Controllers\Company\Clearance\AdvertisementController::class, "delete"])->name("clearance.advertisement.delete");

      Route::get('wallet',[App\Http\Controllers\Company\Clearance\WalletController::class, "index"])->name("clearance.wallet.index");

    });
    Route::get('/features/not_allowed',[App\Http\Controllers\Company\HomeController::class, "restrictedPage"])->name("clearance.features.restriction");
  });
  // Verification Routes
  Route::get('/email/verify', [App\Http\Controllers\Company\Auth\Clearance\VerificationController::class, "show"])->name('clearance.verification.notice');
  Route::get('/email/verify/{id}/{hash}/{email}', [App\Http\Controllers\Company\Auth\Clearance\VerificationController::class, "verify"])->name('clearance.verification.verify');
  Route::post('/email/resend',  [App\Http\Controllers\Company\Auth\Clearance\VerificationController::class, "resend"])->name('clearance.verification.resend');
});


// Shipment and Clearance Services
Route::get('clearance-agencies', [App\Http\Controllers\Company\FrontController::class, "getClearanceAgencies"])->name('clearance_agencies');
Route::get('shipment-companies', [App\Http\Controllers\Company\FrontController::class, "getShipmentCompanies"])->name('shipment_companies');

Route::get('clearance-agencies/{agency}/services', [App\Http\Controllers\Company\FrontController::class, "getClearanceServices"])->name('clearance_services');
Route::get('shipment-companies/{company}/services', [App\Http\Controllers\Company\FrontController::class, "getShipmentServices"])->name('shipment_services');

Route::get('clearance-agencies/{agency}/services/show/{id}', [App\Http\Controllers\Company\FrontController::class, "showClearanceService"])->name('clearance_services.show');
Route::get('shipment-companies/{company}/services/show/{id}', [App\Http\Controllers\Company\FrontController::class, "showShipmentService"])->name('shipment_services.show');

// Sellers
Route::get('/sellers', [App\Http\Controllers\Supplier\SupplierController::class, "index"])->name('seller');
Route::get('/auction-products', [App\Http\Controllers\AuctionProductController::class, "index"])->name('auction-products');

Route::group(['middleware' => 'access_chat'], function(){
  // Product Purchasing Proccess Routes
  Route::get('customer/customer-purchase', [App\Http\Controllers\ProductPurchase\ChatController::class, "chat"])->name('customer.chat');
  Route::post('customer/group/add-member',[App\Http\Controllers\ProductPurchase\ConversationController::class, "addMember"]);
  Route::post('customer/group/remove-member',[App\Http\Controllers\ProductPurchase\ConversationController::class, "removeMember"]);
  Route::post('customer/group/start',[App\Http\Controllers\ProductPurchase\ConversationController::class, "start"]);
  Route::post('conversation/get-members',[App\Http\Controllers\ProductPurchase\ConversationController::class, "getMembers"]);

  Route::post('groups', [App\Http\Controllers\ProductPurchase\GroupController::class, "store"])->name('chat.supplier');
});
Route::post('conversations', [App\Http\Controllers\ProductPurchase\ConversationController::class, "store"]);
Route::post('conversations/get/{group_id}', [App\Http\Controllers\ProductPurchase\ChatController::class, "getConversationByGroup"]);


Route::get('/conversation', [App\Http\Controllers\ProductPurchase\ChatController::class, "shipmentChat"])->name('shipment.chat');
Route::get('/clearance/conversation', [App\Http\Controllers\ProductPurchase\ChatController::class, "clearanceChat"])->name('clearance.chat');

Route::get('optimize',function() {
  \Artisan::call('optimize');
  return "Optimized";
});

Route::get('linkstorage', function () {
    \Artisan::call('storage:link');
	return "Storage Linked";
});

Route::get('optimize/clear',function() {
  \Artisan::call('optimize:clear');
  return "Optimize Cleared";
});
