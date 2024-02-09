<?php
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UtilisateursController;
use App\Http\Controllers\PersonnesPhysiquesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnesMoralesController;
use App\Http\Controllers\ClientPhysiqueOperationController;
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


Route::get('/users', [UtilisateursController::class, 'index'])->name('dashboard.utilisateur');
Route::get('/users/{id}/edit', [UtilisateursController::class, 'edit'])->name('edit.user');
Route::delete('/users/{id}/delete', [UtilisateursController::class, 'delete'])->name('delete.user');
Route::put('/users/{id}/update', [UtilisateursController::class, 'update'])->name('update.user');



Route::get('/physique', [PersonnesPhysiquesController::class, 'index'])->name('client.physique');
Route::get('/client/physique/create', [PersonnesPhysiquesController::class, 'create'])->name('client.physique.create');
Route::post('/client/physique/store', [PersonnesPhysiquesController::class, 'store'])->name('client.physique.store');

Route::get('/client/physique/{id}/edit', [PersonnesPhysiquesController::class, 'edit'])->name('client.physique.edit');
Route::put('/client/physique/{id}', [PersonnesPhysiquesController::class, 'update'])->name('client.physique.update');
Route::delete('/client/physique/{id}', [PersonnesPhysiquesController::class, 'destroy'])->name('client.physique.destroy');

// Routes pour les personnes morales
Route::get('/moral', [PersonnesMoralesController::class, 'index'])->name('client.moral');
Route::get('/client/moral/create', [PersonnesMoralesController::class, 'create'])->name('client.moral.create');
Route::post('/client/moral/store', [PersonnesMoralesController::class, 'store'])->name('client.moral.store');


// Routes pour les opérations de mise à jour
Route::put('/client/moral/{id}/edit', [PersonnesMoralesController::class, 'edit'])->name('client.moral.edit');
Route::post('/client/moral/{id}', [PersonnesMoralesController::class, 'update'])->name('client.moral.update');

// Route pour l'opération de suppression
Route::delete('/client/moral/{id}', [PersonnesMoralesController::class, 'destroy'])->name('client.moral.destroy');



Route::get('/operation', [ClientPhysiqueOperationController::class, 'index'])->name('client.operation');

Route::post('/create-profil', [ProfilController::class, 'store'])->name('create.profil');
Route::post('/operations/client-physique/store', [ClientPhysiqueOperationController::class, 'store'])->name('client.physique.operation.store');
Route::put('/client/physique/operation/{operation}', [ClientPhysiqueOperationController::class, 'update'])->name('client.physique.operation.update');
Route::delete('/client/physique/operation/{operation}', [ClientPhysiqueOperationController::class, 'destroy'])->name('client.physique.operation.destroy');
