<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});
Route::get('about-course', function () {
    return view('about-course');
});
Route::get('profileStudent-page', function () {
    return view('profileStudent-page');
});
Route::get('teachers', function () {
    return view('teachers');
});    
Route::get('simulator', function () {
    return view('simulator');
});    
Route::get('simulatorBig', function () {
    return view('simulatorBig');
});  
Route::get('header_narrow', function () {
    return view('header_narrow');
});  
  
