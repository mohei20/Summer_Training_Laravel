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
    $allposts = [
        ["title"=>"post1", "body"=>"post1 body", "details"=>"post1 detailes"],
        ["title"=>"post2", "body"=>"post2 body", "details"=>"post2 detailes"],
        ["title"=>"post3", "body"=>"post3 body", "details"=>"post3 detailes"],
    ];

    return view("homepage", ["posts"=>$allposts]);
});
Route::get('/contactus', function () {
    return view('contactus');
});
Route::get('/aboutus', function () {
    return view('aboutus');
});
