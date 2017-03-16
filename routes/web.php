<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function() {
   return view('home');
});

Route::post('pdf', 'PDFGeneratorController@generate');

/*
Route::post('pdf', function(){
   // dd(request()->all());
   // echo request('name');
   // echo request('email-address');
   // echo request('protocol');
   // echo request('coin');
   // echo request('title');

   Fpdf::AddPage();
   Fpdf::SetFont('Courier', 'B', 18);
   Fpdf::Cell(50, 25, request('protocol'));
   Fpdf::Output();
});
*/
