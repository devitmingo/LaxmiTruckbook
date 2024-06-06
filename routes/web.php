<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TruckTypeController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\BillingTypeController;
use App\Http\Controllers\AddShortController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TyreController;
use App\Http\Controllers\UrearefillingController;
use App\Http\Controllers\PattaController;
use App\Http\Controllers\MurgaBusingController;
use App\Http\Controllers\KinpinController;
use App\Http\Controllers\GearKlatchController;
use App\Http\Controllers\MaintenanceFormController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\VendorController;

//Clear Cache facade value:
Route::get('/clear', function() {
  $exitCode = Artisan::call('cache:clear');
  $exitCode = Artisan::call('optimize');
   $exitCode = Artisan::call('route:cache');
      $exitCode = Artisan::call('route:clear');
      $exitCode = Artisan::call('view:clear');
       $exitCode = Artisan::call('config:cache');
  return '<h1>Done</h1>';
  
});


 Route::get('/', [AdminController::class, 'login'])->name('login');
    Route::post('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::post('/loginPost',[AdminController::class,'loginPost'])->name('loginPost');
    Route::get('/register', [AdminController::class, 'register'])->name('register');
    Route::post('/register', [AdminController::class, 'registerStore'])->name('registerStore');

Route::middleware(['auth'])->group(function () {
    // Logout
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    //Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
   
    //Add Parties
    Route::resource('/admin/session', SessionController::class);

     //Add Transaction
     Route::resource('/admin/trans', TransactionController::class);

    //Add Parties
    Route::resource('/admin/party', PartyController::class);

    //Add Driver
    Route::resource('/admin/driver', DriverController::class);
    
    //Add Supplier
    Route::resource('/admin/supplier', SupplierController::class);

    //Add State
    Route::resource('/admin/state', StateController::class);

    //Add Bill Type
    Route::resource('/admin/billType', BillingTypeController::class);

    //Add Route
    Route::resource('/admin/route', RouteController::class);

    //Add TruckName
    Route::resource('/admin/vehicleType', TruckTypeController::class);

    //Add TruckName
    Route::resource('/admin/vehicle', VehicleController::class);

    //Add TruckName
    Route::resource('/admin/truck', TruckController::class);

    //Add Supplier Charge
     Route::resource('/admin/supplierCharge', App\Http\Controllers\SupplierChargesController::class);

    //Add Party Advance
      Route::resource('/admin/partyAdvance', App\Http\Controllers\PartyAdvanceController::class);
    
    //Add Supplier Advance
    Route::resource('/admin/supplierAdvance', App\Http\Controllers\SupplierAdvanceController::class);

    //Add Party Payment
    Route::resource('/admin/partyPayment', App\Http\Controllers\PartyPaymentController::class);
    
    //Add Supplier Payment
    Route::resource('/admin/supplierPayment', App\Http\Controllers\SupplierPaymentController::class);


    Route::get('/common-get-select', [AdminController::class, 'getSelectOption']);

    Route::get('/common-get-select2', [AdminController::class, 'getSelectOption2']);

    Route::get('/common-get-vehicle', [AdminController::class, 'getVehicle']);

    Route::get('/fetchSelectCust', [AdminController::class, 'fetchSelectCust']);
    Route::get('/fetchSelectTruck', [AdminController::class, 'fetchSelectTruck']);
    Route::get('/supplier-report', [AddShortController::class, 'supplierReport'])->name('supplierReport');
    Route::get('/supplier-ledger-report', [AddShortController::class, 'supplierledgerReport'])->name('supplierledgerReport');
    Route::get('/supplier-ledger-pdf', [AddShortController::class, 'supplierledgerPdf'])->name('supplierledgerPdf');
    Route::get('/supplier-balance-list/{id}', [AddShortController::class, 'supplierBalanceList'])->name('supplierBalanceList');
    Route::get('/party-report', [AddShortController::class, 'partyReport'])->name('partyReport');
    Route::get('/party-ledger-report', [AddShortController::class, 'partyLedgerReport'])->name('partyLedgerReport');
    Route::get('/party-ledger-pdf', [AddShortController::class, 'partyledgerPdf'])->name('partyledgerPdf');
    Route::get('/party-balance-list/{id}', [AddShortController::class, 'partyBalanceList'])->name('partyBalanceList');
    Route::get('/addShort', [AddShortController::class, 'AddShort'])->name('addShort');
    Route::post('/supplier-multi-payment', [AddShortController::class, 'supplierMultiPayment'])->name('supplierMultiPayment');
    Route::post('/party-multi-payment', [AddShortController::class, 'partyMultiPayment'])->name('partyMultiPayment');
    Route::post('/addPODReceive', [AddShortController::class, 'addPODReceive'])->name('addPODReceive');
    Route::get('/master-delete', [AddShortController::class, 'masterDelete'])->name('masterDelete');

   
    //trip
    Route::resource('/admin/trips', TripController::class);
    Route::get('/tripsreports', [AddShortController::class, 'tripsreports'])->name('tripsreports');
    Route::get('/companyLedger', [AddShortController::class, 'companyLedger'])->name('companyLedger');
    
    Route::get('/party-pdf/{id}', [TripController::class, 'partyPdf'])->name('partyPdf');

    //add material
    Route::get('/save_material',[TripController::class,'save_material']);
    Route::get('/fetch_material',[TripController::class,'fetch_material']);
    Route::get('/getAll/{id}',[TripController::class,'indexAll'])->name('trips.indexAll');

    //Add Tyre Route
    Route::resource('/admin/tyre', TyreController::class);

    //master get single row value
    Route::get('/get-single-row-value', [AddShortController::class, 'getsingleRowValue'])->name('getsingleRowValue');

    //Add Urea Refilling Routes
    Route::resource('/admin/urea', UrearefillingController::class);

    //Add patta Routes
    Route::resource('/admin/patta', PattaController::class);

    //Add murgaBusing Routes
    Route::resource('/admin/murgaBusing', MurgaBusingController::class);

    //Add kinpin Routes
    Route::resource('/admin/kinpin', KinpinController::class);

    //Add battery Routes
    Route::resource('/admin/maintenanceForm', MaintenanceFormController::class);

    //Add battery Routes
    Route::resource('/admin/gearklatch', GearKlatchController::class);

    //Add TruckName
     Route::resource('/admin/maintenance', MaintenanceController::class);

    //Add Payment Type master
    Route::resource('/admin/paymentType', MaintenanceController::class);

    //Add Vendor master
     Route::resource('/admin/vendor', VendorController::class);

     //Add Vendor Leger Report
    Route::get('/admin/vendor-report', [VendorController::class, 'vendorReports'])->name('vendorReports');
     //Add Vendor Leger Report
     Route::get('/admin/get-ven-bal', [VendorController::class, 'CurrentVendorOpning'])->name('CurrentVendorOpning');
    
     //Truck Profit report
    Route::get('/admin/truckReports',[AddShortController::class, 'truckReports'])->name('truckReports');

     //Truck Profit ledger
     Route::get('/admin/truckReportLedger',[AddShortController::class, 'truckReportLedger'])->name('truckReportLedger');

    //PDF for Trip Reports
    Route::get('/admin/pdf-trip-reports',[AddShortController::class, 'pdfTripReports'])->name('pdfTripReports');

    //PDF for Urea Reports
    Route::get('/admin/pdf-urea-reports',[AddShortController::class, 'pdfUreaReports'])->name('pdfUreaReports');

    //PDF for trans Reports
    Route::get('/admin/pdf-trans-reports',[AddShortController::class, 'pdfTransReports'])->name('trans.pdf');
    //PDF for maintenaces Reports
    Route::get('/admin/pdf-maintenaces-reports',[AddShortController::class, 'pdfMaintenanceReports'])->name('pdfMaintenanceReports');
    //PDF for Vendor Reports
    Route::get('/admin/pdf-vendor-reports',[VendorController::class, 'pdfVendorReports'])->name('pdfVendorReports');
    //PDF for trcuk-profit Reports
    Route::get('/admin/pdf-trcuk-profit-reports',[AddShortController::class, 'pdfTruckProfitReports'])->name('pdfTruckProfitReports');
    //PDF for truck profit ledger Reports
    Route::get('/admin/pdf-trcuk-profit-ledger-reports',[AddShortController::class, 'pdfTruckProfitLedgerReports'])->name('pdfTruckProfitLedgerReports');
         
  });

