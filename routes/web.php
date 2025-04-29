<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/reports', [ReportController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('reports');

    Route::get('/invoice', [InvoiceController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('invoice');


// Route::get('/invoice', function () {
//     return view('invoice');
// })->middleware(['auth', 'verified'])->name('invoice');

Route::get('/ledgers', function () {
    return view('ledger');
})->middleware(['auth', 'verified'])->name('ledgers');

Route::get('/company', function () {
    return view('company');
})->middleware(['auth', 'verified'])->name('company');

Route::get('/openreportform', function () {
    return view('create_report');
})->middleware(['auth', 'verified'])->name('openreportform');
Route::get('/openinvoiceform', function () {
    return view('create_invoice');
})->middleware(['auth', 'verified'])->name('openinvoiceform');
Route::get('/openledgerform', function () {
    return view('create_ledger');
})->middleware(['auth', 'verified'])->name('openledgerform');
Route::get('/openCompanyform', function () {
    return view('create_company');
})->middleware(['auth', 'verified'])->name('openCompanyform');

Route::post('report/savereport',[ReportController::class,'savereport'])->middleware(['auth', 'verified'])->name('report.save');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/download-report-pdf{id}', [ReportController::class, 'downloadPdf'])->name('download.report.pdf');
Route::delete('/report/delete/{id}', [ReportController::class, 'destroy'])->name('report.delete');
Route::post('/reports/send-email', [ReportController::class, 'sendEmail'])->name('send.report.email');
Route::get('/reports/{id}', [ReportController::class, 'getReport'])->name('reports.get');

Route::post('/reports/saveinvoice', [InvoiceController::class, 'saveinvoice'])->name('save.invoice');

Route::get('/send-test-mail', function () {
    $data = ['message' => 'This is a test from Laravel 11 mail system.'];
    Mail::to('vaishnavibadabe2001@gmail.com')->send(new TestMail($data));

    return 'Test mail sent!';
});

require __DIR__.'/auth.php';

