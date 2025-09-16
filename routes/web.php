<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class . '@index')->name('home');
Route::get('/cities', CityController::class . '@index')->name('cities');
Route::get('/cities/{city:slug}', CityController::class . '@slug')->name('city.slug');

Route::get('/boarding-houses', BoardingHouseController::class . '@index')->name('boardingHouses');
Route::get('/boarding-houses/{boardingHouse:slug}', BoardingHouseController::class . '@slug')->name('boardingHouse.slug');
Route::get('/find-boarding-house-search', BoardingHouseController::class . '@findBoardingHouses')->name('find.boardingHouses.search');
Route::get('/find-boarding-house', BoardingHouseController::class . '@find')->name('find.boardingHouse');

Route::get('/check-booking', BookingController::class . '@checkBooking')->name('check.booking');
Route::get('/detail-booking', BookingController::class . '@detailBooking')->name('detail.booking');