<?php
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UtilisateursController;
use App\Http\Controllers\PersonnesPhysiquesController;
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

// Route pour afficher le formulaire d'inscription
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/acceuil', [AcceuilController::class, 'acceuil'])->name('acceuil');


Route::get('/users', [UtilisateursController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UtilisateursController::class, 'edit'])->name('edit');
Route::get('/users/{id}/delete', [UtilisateursController::class, 'delete'])->name('delete');
Route::put('/users/{id}/update', [UtilisateursController::class, 'update'])->name('update.user');


Route::get('/physique', [PersonnesPhysiquesController::class, 'index'])->name('physique.index');


Route::post('/create-profil', [ProfilController::class, 'store'])->name('create.profil');
