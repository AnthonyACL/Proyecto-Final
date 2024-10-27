<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\EmployController;
#este es el que agrege
            

Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');


    #Principal de tables
	Route::get('tables',[EmployController::class, 'index'])->name('tables');

	#Rutas para Employ
	Route::get('/employes/{employe}/edit', [EmployController::class, 'edit'])->name('employes.edit');
	Route::put('/employes/{employe}', [EmployController::class, 'update'])->name('employes.update');  // Actualizar
	Route::delete('/employes/{id}', [EmployController::class, 'destroy'])->name('employes.destroy');
	
	Route::get('/employes/create', [EmployController::class, 'create'])->name('employes.create');
	Route::post('/employes', [EmployController::class, 'store'])->name('employes.store');

	
/*
	Route::get('/employes', [EmployController::class, 'index'])->name('tables');  // Ruta para mostrar todos
	Route::get('/employes/create', [EmployController::class, 'create'])->name('employes.create');  // Crear
	Route::post('/employes', [EmployController::class, 'store'])->name('employes.store');  // Almacenar
	Route::get('/employes/{employe}', [EmployController::class, 'show'])->name('employes.show');  // Mostrar
	Route::get('/employes/{employe}/edit', [EmployController::class, 'edit'])->name('employes.edit');  // Editar
	
	Route::delete('/employes/{id}', [EmployController::class, 'destroy'])->name('employes.destroy');  // Eliminar
*/
	
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});