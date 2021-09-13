<?php

use App\Http\Controllers\AccueilController;
use App\Models\Accueil;
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
    return view('welcome');
});


Route::resource('/article', AccueilController::class)->middleware('auth');

Route::get('/dashboard', function () {
    $articles = Accueil::all();
    return view('dashboard', compact('articles'));
})->middleware(['auth', 'connexion'])->name('dashboard');

require __DIR__.'/auth.php';
