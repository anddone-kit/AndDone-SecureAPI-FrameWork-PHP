<?php

use App\Http\Controllers\BatchesController;
use App\Http\Controllers\BankAccountsController;
use App\Http\Controllers\BatchesCancelController;
use App\Http\Controllers\CancellationsController;
use App\Http\Controllers\EndorsementsController;
use App\Http\Controllers\EPFController;
use App\Http\Controllers\EPFLiteController;
use App\Http\Controllers\MerchantsController;
use App\Http\Controllers\OutboundPaymentsController;
use App\Http\Controllers\PaymentIntentsController;
use App\Http\Controllers\PaymentLinksController;
use App\Http\Controllers\RefundsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SecurePaymentsController;
use App\Http\Controllers\SecureTokensController;
use App\Http\Controllers\TokensController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });
Route::get('configuration', function () { return view('configuration'); });

Route::get('cancellations', function() { return view('cancellations'); });
Route::get('/cancellations-cancel', [CancellationsController::class, 'handleSecureCancellations']); 

Route::get('epf', function() { return view('epf'); });
Route::get('/epf-generatequote', [EPFController::class, 'handleGenerateQuote']);
Route::get('/epf-getquotebykey', [EPFController::class, 'handleGetQuoteByKey']);
Route::get('/epf-getquotebyintent', [EPFController::class, 'handleGetQuoteByIntent']);
Route::get('/epf-retrieveendorsement', [EndorsementsController::class, 'handleRetreiveEndorsement']);
Route::get('/epf-endorsementrequest', [EndorsementsController::class, 'handleCreateEndorsement']);
Route::get('/epf-bookendorsement', [EndorsementsController::class, 'handleBookEndorsement']);
Route::get('/epf-bookquoteendorsement', [EPFController::class, 'handleBookQuoteEndorsement']);
Route::get('/epf-retrievepfa', [EPFController::class, 'handleRetreivePFA']);
Route::get('/epf-updateintent', [EPFController::class, 'handleUpdateIntent']);
Route::get('/epf-captureesign', [EPFController::class, 'handleCaptureESign']);


Route::get('epflinks', function() { return view('epflinks'); });
Route::get('/epf-quotecreate', [EPFLiteController::class, 'handleEpfQuoteCreate']);
Route::get('/epf-paymentlinkcreate', [EPFLiteController::class, 'handleEpfPaymentLinkCreate']);
Route::get('/epf-paymentlinkgetquote', [EPFLiteController::class, 'handleEpfPaymentLinkGetQuote']);

Route::get('batches', function() { return view('batches'); });
Route::get('/batches-getbatches', [BatchesController::class, 'handleGetBatches']);
Route::get('/batches-transactioncancel', [BatchesCancelController::class, 'handleBatchesTransactionCancel']);
Route::get('/batches-execute', [BatchesController::class, 'handleExecute']);
Route::get('/batches-timelines', [BatchesController::class, 'handleTimelines']);
Route::get('/batches-details', [BatchesController::class, 'handleDetails']);

Route::get('merchants', function() { return view('merchants'); });
Route::get('/merchant-create', [MerchantsController::class, 'handleMerchantCreate']);
Route::get('/merchant-details', [MerchantsController::class, 'handleMerchantDetails']);
Route::get('/merchant-search', [MerchantsController::class, 'handleMerchantSearch']);
Route::get('/merchant-suspend', [MerchantsController::class, 'handleMerchantSuspend']);
Route::get('/merchant-unsuspend', [MerchantsController::class, 'handleMerchantUnsuspend']);
Route::get('/merchant-delete', [MerchantsController::class, 'handleMerchantDelete']);
Route::get('/merchant-timeline', [MerchantsController::class, 'handleMerchantTimeline']);
Route::get('/merchant-edit', [MerchantsController::class, 'handleMerchantEdit']);

Route::get('outboundpayments', function() { return view('outboundpayments'); });
Route::get('/outboundpayments-create', [OutboundPaymentsController::class, 'handleOutboundPaymentsCreate']);
Route::get('/outboundpayments-details', [OutboundPaymentsController::class, 'handleOutboundPaymentsDetails']);
Route::get('/outboundpayments-search', [OutboundPaymentsController::class, 'handleOutboundPaymentsSearch']);
Route::get('/outboundpayments-timelines', [OutboundPaymentsController::class, 'handleOutboundPaymentsTimelines']);
Route::get('/outboundpayments-cancel', [OutboundPaymentsController::class, 'handleOutboundPaymentsCancel']);

Route::get('paymentlinks', function() { return view('paymentlinks'); });
Route::get('/paymentlinks-create', [PaymentLinksController::class, 'handleSecurePaymentLinks']);
Route::get('/paymentlinks-details', [PaymentLinksController::class, 'handleSecurePaymentLinksDetails']);
Route::get('/paymentlinks-expirations', [PaymentLinksController::class, 'handleSecurePaymentLinksExpirations']);
Route::get('/paymentlinks-update', [PaymentLinksController::class, 'handleSecurePaymentLinksUpdate']);


Route::get('payments', function() { return view('payments'); });
Route::get('/secure-payment-search', [SecurePaymentsController::class, 'handleSecurePaymentSearch']);
Route::get('/secure-payment-export', [SecurePaymentsController::class, 'handleSecurePaymentExport']); 
Route::get('/secure-payment-create', [SecurePaymentsController::class, 'handleSecurePayment']); 


Route::get('paymentdetails', function() { return view('paymentdetails'); });
Route::get('/payment-details-byid', [SecurePaymentsController::class, 'handleSecurePaymentDetailsById']); 
Route::get('/payment-details-bytoken', [SecurePaymentsController::class, 'handleSecurePaymentDetailsByToken']); 


Route::get('paymentintents', function() { return view('paymentintents'); });
Route::get('/secure-paymentintents', [PaymentIntentsController::class, 'handleSecurePaymentIntents']);
Route::get('/secure-paymentintents-expirations', [PaymentIntentsController::class, 'handleSecurePaymentIntentExpirations']);


Route::get('refunds', function() { return view('refunds'); });
Route::get('/refunds-eligibility', [RefundsController::class, 'handleSecureRefundsEligibility']);
Route::get('/refunds-request', [RefundsController::class, 'handleSecureRefunds']);

Route::get('reports', function() { return view('reports'); });
Route::get('/reports-download', [ReportsController::class, 'handleReportsDownload']);


Route::get('tokenlinks', function() { return view('tokenlinks'); });
Route::get('/secure-tokenlinks-create', [SecureTokensController::class, 'handleSecureTokenLinks']);
Route::get('/secure-tokenlinks-details', [SecureTokensController::class, 'handleSecureTokenLinksDetails']);
Route::get('/secure-tokenlinks-update', [SecureTokensController::class, 'handleSecureTokenLinksUpdate']);
Route::get('/secure-tokenlinks-expire', [SecureTokensController::class, 'handleSecureTokenLinksExpire']);
Route::get('/secure-tokenlinks-list', [SecureTokensController::class, 'handleSecureTokenLinksList']);


Route::get('tokens', function() { return view('tokens'); });
Route::get('/tokens-deactivate', [TokensController::class, 'handleTokensDeactivate']);
Route::get('/secure-tokenlinks-details', [SecureTokensController::class, 'handleSecureTokenLinksDetails']);

