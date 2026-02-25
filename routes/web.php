<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalPrintController;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/admin');
Route::middleware(['auth'])->group(function () {
    Route::get('/report/proposal/print', ProposalPrintController::class)
        ->name('report.proposal.print');
});