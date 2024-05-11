<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FinsetController;
use App\Http\Controllers\BudgetCategoriesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AssociateGroupsController;
use App\Http\Controllers\TransactionsController;

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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'homepage'])->name('homepage');


Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/register', function(){
    return redirect()->route('login');
});

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users/store', [UserController::class, 'store']);
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name( 'user.edit' );
    Route::post('/users/update', [UserController::class, 'update']);
    Route::get('/users/delete/{id}', [UserController::class, 'delete']);

    
    // Finset routes
    Route::get('/finset', [FinsetController::class, 'index'])->name('finset');
    Route::get('/finset/create', [FinsetController::class, 'create']);
    Route::post('/finset/store', [FinsetController::class, 'store']);
    Route::get('/finset/edit/{id}', [FinsetController::class, 'edit']);
    Route::post('/finset/update', [FinsetController::class, 'update']);
    Route::get('/finset/delete/{id}', [FinsetController::class, 'delete']);

    /**
     * Budget Categories Routes
     */
    Route::prefix('budget_categories')->group(function () {
        Route::get('/all', [BudgetCategoriesController::class, 'index'])->name('budget_categories.index');
        Route::get('/add', [BudgetCategoriesController::class, 'create'])->name('budget_categories.create');
        Route::post('/store', [BudgetCategoriesController::class, 'store'])->name('budget_categories.store');
        Route::get('/edit/{id}', [BudgetCategoriesController::class, 'edit'])->name('budget_categories.edit');
        Route::put('/update/{id}', [BudgetCategoriesController::class, 'update'])->name('budget_categories.update');
        Route::get('/delete/{id}', [BudgetCategoriesController::class, 'delete'])->name('budget_categories.delete');
    });

    /**
     * Tags Routes
     */
    Route::prefix('tags')->group(function () {
        Route::get('/all', [TagsController::class, 'index'])->name('tags.index');
        Route::get('/add', [TagsController::class, 'create'])->name('tags.create');
        Route::post('/store', [TagsController::class, 'store'])->name('tags.store');
        Route::get('/edit/{id}', [TagsController::class, 'edit'])->name('tags.edit');
        Route::put('/update/{id}', [TagsController::class, 'update'])->name('tags.update');
        Route::get('/delete/{id}', [TagsController::class, 'delete'])->name('tags.delete');
    });

    /**
     * Vendor Routes
     */
    Route::prefix('vendors')->group(function () {
        Route::get('/all', [VendorsController::class, 'index'])->name('vendors.index');
        Route::get('/add', [VendorsController::class, 'create'])->name('vendors.create');
        Route::post('/store', [VendorsController::class, 'store'])->name('vendors.store');
        Route::get('/edit/{id}', [VendorsController::class, 'edit'])->name('vendors.edit');
        Route::put('/update/{id}', [VendorsController::class, 'update'])->name('vendors.update');
        Route::get('/delete/{id}', [VendorsController::class, 'delete'])->name('vendors.delete');
    });
    

    /**
     * Accounts Routes
     */
    Route::prefix('accounts')->group(function () {
        Route::get('/all', [AccountsController::class, 'index'])->name('accounts.index');
        Route::get('/add', [AccountsController::class, 'create'])->name('accounts.create');
        Route::post('/store', [AccountsController::class, 'store'])->name('accounts.store');
        Route::get('/edit/{id}', [AccountsController::class, 'edit'])->name('accounts.edit');
        Route::put('/update/{id}', [AccountsController::class, 'update'])->name('accounts.update');
        Route::get('/delete/{id}', [AccountsController::class, 'delete'])->name('accounts.delete');
    });
    

    /**
     * Associate Groups Routes
     */
    Route::prefix('association_groups')->group(function () {
        Route::get('/all', [AssociateGroupsController::class, 'index'])->name('association_groups.index');
        Route::get('/add', [AssociateGroupsController::class, 'create'])->name('association_groups.create');
        Route::post('/store', [AssociateGroupsController::class, 'store'])->name('association_groups.store');
        Route::get('/edit/{id}', [AssociateGroupsController::class, 'edit'])->name('association_groups.edit');
        Route::put('/update/{id}', [AssociateGroupsController::class, 'update'])->name('association_groups.update');
        Route::get('/delete/{id}', [AssociateGroupsController::class, 'delete'])->name('association_groups.delete');
    });    

    /**
     * Transactions Routes
     */
    Route::prefix('transaction')->group(function () {
        Route::get('/all', [TransactionsController::class, 'index'])->name('transaction.index');
        Route::get('/add', [TransactionsController::class, 'create'])->name('transaction.create');
        Route::post('/store', [TransactionsController::class, 'store'])->name('transaction.store');
        Route::get('/edit/{id}', [TransactionsController::class, 'edit'])->name('transaction.edit');
        Route::put('/update/{id}', [TransactionsController::class, 'update'])->name('transaction.update');
        Route::get('/delete/{id}', [TransactionsController::class, 'delete'])->name('transaction.delete');
    });
    
});


