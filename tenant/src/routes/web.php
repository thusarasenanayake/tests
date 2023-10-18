<?php

use App\Models\Company;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/1', function () {
    // $companyEmployeeId = Company::find($companyId)->users->pluck('id')->toArray();
    // $data = User::findMany($companyEmployeeId);
    // $data = User::with('tasks')->findMany($companyEmployeeId);

    $companyId = 3;
    $data = Company::find($companyId)->users;

    return view('data', [
        'data' => $data,
    ]);
});

Route::get('/2', function () {
    $companyId = 3;
    $data = Company::with('users.tasks')->find($companyId)->users;

    return view('data', [
        'data' => $data,
    ]);
});

Route::get('/3', function () {

    $companyId = 3;
    $data = Company::find($companyId)->tasks;

    return view('data2', [
        'data' => $data,
        'count' => count($data)
    ]);
});