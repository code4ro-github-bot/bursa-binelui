<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/* Public routes. */
Route::post('/doneaza/thanks/{uuid}', [\App\Http\Controllers\DonationController::class, 'thankYou'])->name('donation.thanks');
Route::post('/doneaza/callbacks/{donation:uuid}', [\App\Http\Controllers\DonationController::class, 'euPlatescCallback'])->name('donation.callback');
Route::get('/doneaza/{donation:uuid}', [\App\Http\Controllers\DonationController::class, 'makeDonation'])->name('donation.make');
