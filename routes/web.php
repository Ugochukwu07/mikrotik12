<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MikrotikController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageRenewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceZoneController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('cancel', function () {
    return view('user.payment.cancel');
})->name('cancel');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('users', [UserController::class, 'index'])->name('users');
Route::get('users/create', [UserController::class, 'create'])->name('users-create');
Route::post('users', [UserController::class, 'store'])->name('users-store');
Route::get('users/{user}', [UserController::class, 'show'])->name('users-show');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users-edit');
Route::patch('users/{user}', [UserController::class, 'update'])->name('users-update');

Route::get('resellers', [ResellerController::class, 'index'])->name('resellers');
Route::get('resellers/create', [ResellerController::class, 'create'])->name('resellers-create');
Route::post('resellers', [ResellerController::class, 'store'])->name('resellers-store');
Route::get('resellers/{reseller}', [ResellerController::class, 'show'])->name('resellers-show');
Route::get('resellers/{reseller}/edit', [ResellerController::class, 'edit'])->name('resellers-edit');
Route::patch('resellers/{reseller}', [ResellerController::class, 'update'])->name('resellers-update');

Route::get('staff', [StaffController::class, 'index'])->name('staff');
Route::get('staff/create', [StaffController::class, 'create'])->name('staff-create');
Route::post('staff', [StaffController::class, 'store'])->name('staff-store');
Route::get('staff/{staff}/edit', [StaffController::class, 'edit'])->name('staff-edit');
Route::patch('staff/{staff}', [StaffController::class, 'update'])->name('staff-update');

Route::get('packages', [PackageController::class, 'index'])->name('packages');
Route::get('packages/create', [PackageController::class, 'create'])->name('packages-create');
Route::post('packages', [PackageController::class, 'store'])->name('packages-store');
Route::get('packages/{package}', [PackageController::class, 'show'])->name('packages-show');
Route::get('packages/{package}/edit', [PackageController::class, 'edit'])->name('packages-edit');
Route::patch('packages/{package}', [PackageController::class, 'update'])->name('packages-update');

Route::get('package-renew/{user}/edit', [PackageRenewController::class, 'edit'])->name('package-renew');
Route::patch('package-renew/{user}', [PackageRenewController::class, 'update'])->name('package-renew-update');

Route::get('payments', [PaymentController::class, 'index'])->name('payments');
Route::get('payments/create', [PaymentController::class, 'create'])->name('payments-create');
Route::post('payments', [PaymentController::class, 'store'])->name('payments-store');

Route::get('settings', [SettingsController::class, 'index'])->name('settings');
Route::patch('settings/{settings}', [SettingsController::class, 'update'])->name('settings-update');

Route::post('categories', [CategoryController::class, 'store'])->name('category-store');

Route::get('account', [AccountController::class, 'index'])->name('account');
Route::get('account/create', [AccountController::class, 'create'])->name('account-create');
Route::post('account', [AccountController::class, 'store'])->name('account-store');

Route::get('service-zone', [ServiceZoneController::class, 'index'])->name('service-zone');
Route::post('service-zone', [ServiceZoneController::class, 'store'])->name('service-zone-store');
Route::get('service-zone/{serviceZone}/edit', [ServiceZoneController::class, 'edit'])->name('service-zone-edit');
Route::patch('service-zone/{serviceZone}', [ServiceZoneController::class, 'update'])->name('service-zone-update');

Route::get('tickets', [TicketController::class, 'index'])->name('tickets');
Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets-create');
Route::post('tickets', [TicketController::class, 'store'])->name('tickets-store');
Route::get('tickets/{ticket}', [TicketController::class, 'show'])->name('tickets-show');
Route::get('tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets-edit');
Route::patch('tickets/{ticket}', [TicketController::class, 'update'])->name('tickets-update');

Route::get('subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions');
Route::get('subscriptions-show/{subscription}', [SubscriptionController::class, 'show'])->name('subscriptions-show');

Route::get('payments', [PaymentController::class, 'index'])->name('payments');
Route::get('payments/create', [PaymentController::class, 'create'])->name('payments-create');

Route::post('comments', [CommentController::class, 'store'])->name('comments-store');

Route::get('roles', [RoleController::class, 'index'])->name('roles');
Route::get('roles-create', [RoleController::class, 'create'])->name('roles-create');
Route::post('roles-create', [RoleController::class, 'store'])->name('roles-store');
Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles-edit');
Route::patch('roles/{role}', [RoleController::class, 'update'])->name('roles-update');

Route::post('stripe', [StripeController::class, 'store'])->name('stripe-store');

Route::post('stripe-webhook', [StripeWebhookController::class, 'handle'])->name('success');

Route::patch('company/{company}', [CompanyController::class, 'update'])->name('company-update');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::patch('profile/{profile}', [ProfileController::class, 'update'])->name('profile-update');

Route::get('mikrotik', [MikrotikController::class, 'index'])->name('mikrotik');
Route::get('report', [ReportController::class, 'index'])->name('report');

// single action controllers
Route::patch('terminate-user/{user}', [\App\Http\Controllers\Invokable\TerminateUserController::class, '__invoke'])->name('terminate-user');
Route::patch('change-package-status/{package}', [\App\Http\Controllers\Invokable\ChangePackageStatus::class, '__invoke'])->name('change-package-status');
Route::get('reseller-user/create', [\App\Http\Controllers\Invokable\ResellerCreateUser::class, '__invoke'])->name('reseller-user-create');
Route::post('reseller-user', [\App\Http\Controllers\Invokable\ResellerStoreUser::class, '__invoke'])->name('reseller-user-store');
Route::get('reseller-payment/create', [\App\Http\Controllers\Invokable\ResellerPaymentCreate::class, '__invoke'])->name('reseller-payments-create');
Route::post('reseller-payment', [\App\Http\Controllers\Invokable\ResellerPaymentStore::class, '__invoke'])->name('reseller-payments-store');
Route::post('user-payment/{id}/store', [\App\Http\Controllers\Invokable\StripePaymentStore::class, '__invoke'])->name('user-payment-store');

// single action mikrotik options
Route::get('mk-system-resource', [\App\Http\Controllers\Mikrotik\SystemResource::class, '__invoke'])->name('mk-system-resource');
Route::get('mk-route', [\App\Http\Controllers\Mikrotik\Route::class, '__invoke'])->name('mk-route');
Route::get('mk-interface', [\App\Http\Controllers\Mikrotik\MikrotikInterface::class, '__invoke'])->name('mk-interface');
Route::get('mk-clock', [\App\Http\Controllers\Mikrotik\Clock::class, '__invoke'])->name('mk-clock');
Route::get('mk-license', [\App\Http\Controllers\Mikrotik\License::class, '__invoke'])->name('mk-license');
Route::get('mk-package', [\App\Http\Controllers\Mikrotik\MikrotikPackage::class, '__invoke'])->name('mk-package');
Route::get('mk-admin', [\App\Http\Controllers\Mikrotik\AdminUser::class, '__invoke'])->name('mk-admin');
Route::get('mk-active-user', [\App\Http\Controllers\Mikrotik\MikrotikUser::class, '__invoke'])->name('mk-active-user');
Route::get('mk-add', [\App\Http\Controllers\Mikrotik\IPAddress::class, '__invoke'])->name('mk-add');
Route::get('mk-ppp-users', [\App\Http\Controllers\Mikrotik\PPPUsers::class, '__invoke'])->name('mk-ppp-users');
Route::get('mk-ppp-active', [\App\Http\Controllers\Mikrotik\PPPActive::class, '__invoke'])->name('mk-ppp-active');
Route::get('mk-hotspot-users', [\App\Http\Controllers\Mikrotik\HotSpotUsers::class, '__invoke'])->name('mk-hotspot-users');
Route::get('mk-hotspot-active', [\App\Http\Controllers\Mikrotik\HotSpotActive::class, '__invoke'])->name('mk-hotspot-active');
Route::get('mk-ppp-profile', [\App\Http\Controllers\Mikrotik\PPPProfile::class, '__invoke'])->name('mk-ppp-profile');
Route::get('mk-hotspot-profile', [\App\Http\Controllers\Mikrotik\HotSpotProfile::class, '__invoke'])->name('mk-hotspot-profile');
Route::get('mk-ntp-client', [\App\Http\Controllers\Mikrotik\NTPClient::class, '__invoke'])->name('mk-ntp-client');
Route::get('mk-firewall-rules', [\App\Http\Controllers\Mikrotik\FirewallRules::class, '__invoke'])->name('mk-firewall-rules');
Route::get('mk-firewall-nat', [\App\Http\Controllers\Mikrotik\FirewallNat::class, '__invoke'])->name('mk-firewall-nat');
Route::get('mk-firewall-service-port', [\App\Http\Controllers\Mikrotik\FirewallServicePort::class, '__invoke'])->name('mk-firewall-service-port');
Route::get('mk-firewall-address-list', [\App\Http\Controllers\Mikrotik\FirewallAddressList::class, '__invoke'])->name('mk-firewall-address-list');

// reports download
Route::post('rpt-all-users', [\App\Http\Controllers\Reports\AllUsers::class, '__invoke'])->name('rpt-all-users');
Route::post('rpt-accounting', [\App\Http\Controllers\Reports\Accounting::class, '__invoke'])->name('rpt-accounting');
Route::post('rpt-user-billing', [\App\Http\Controllers\Reports\UserBilling::class, '__invoke'])->name('rpt-user-billing');
Route::post('rpt-user-payment', [\App\Http\Controllers\Reports\UserPayment::class, '__invoke'])->name('rpt-user-payment');
Route::post('rpt-log', [\App\Http\Controllers\Reports\MikrotikLog::class, '__invoke'])->name('rpt-log');

// invoice download
Route::post('rpt-bill-invoice', [\App\Http\Controllers\Reports\BillInvoice::class, '__invoke'])->name('rpt-bill-invoice');
Route::post('rpt-payment-invoice', [\App\Http\Controllers\Reports\PaymentReceipt::class, '__invoke'])->name('rpt-payment-invoice');

require __DIR__ . '/auth.php';
