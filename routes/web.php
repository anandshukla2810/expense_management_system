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
use App\Http\Controllers\SubtransactiontagController;
use App\Http\Controllers\SubtransactionsController;
use App\Http\Controllers\TransactiontagController;
use App\Http\Controllers\AccountvalueController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\CsvController;

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


Route::resource('templates', TemplateController::class);
Route::get('csv/upload', [CsvController::class, 'showForm'])->name('csv.upload');
Route::post('csv/process', [CsvController::class, 'processCsv'])->name('csv.process');

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
    
    Route::prefix('transaction_tag')->group(function () {
        Route::get('/all', [TransactiontagController::class, 'index'])->name('transactiontag.index');
        Route::get('/add', [TransactiontagController::class, 'create'])->name('transactiontag.create');
        Route::post('/store', [TransactiontagController::class, 'store'])->name('transactiontag.store');
        Route::get('/edit/{id}', [TransactiontagController::class, 'edit'])->name('transactiontag.edit');
        Route::put('/update/{id}', [TransactiontagController::class, 'update'])->name('transactiontag.update');
        Route::get('/delete/{id}', [TransactiontagController::class, 'delete'])->name('transactiontag.delete');
    });
    
    Route::prefix('transaction')->group(function () {
        Route::get('/all', [TransactionsController::class, 'index'])->name('transaction.index');
        Route::get('/add', [TransactionsController::class, 'create'])->name('transaction.create');
        Route::post('/store', [TransactionsController::class, 'store'])->name('transaction.store');
        Route::get('/edit/{id}', [TransactionsController::class, 'edit'])->name('transaction.edit');
        Route::put('/update/{id}', [TransactionsController::class, 'update'])->name('transaction.update');
        Route::get('/delete/{id}', [TransactionsController::class, 'delete'])->name('transaction.delete');
    });

    Route::prefix('sub_transaction')->group(function () {
        Route::get('/all', [SubtransactiontagController::class, 'index'])->name('subtransactiontag.index');
        Route::get('/add', [SubtransactiontagController::class, 'create'])->name('subtransactiontag.create');
        Route::post('/store', [SubtransactiontagController::class, 'store'])->name('subtransactiontag.store');
        Route::get('/edit/{id}', [SubtransactiontagController::class, 'edit'])->name('subtransactiontag.edit');
        Route::put('/update/{id}', [SubtransactiontagController::class, 'update'])->name('subtransactiontag.update');
        Route::get('/delete/{id}', [SubtransactiontagController::class, 'delete'])->name('subtransactiontag.delete');
    });

    Route::prefix('sub_transactions')->group(function () {
        Route::get('/all', [SubtransactionsController::class, 'index'])->name('subtransactions.index');
        Route::get('/add', [SubtransactionsController::class, 'create'])->name('subtransactions.create');
        Route::post('/store', [SubtransactionsController::class, 'store'])->name('subtransactions.store');
        Route::get('/edit/{id}', [SubtransactionsController::class, 'edit'])->name('subtransactions.edit');
        Route::put('/update/{id}', [SubtransactionsController::class, 'update'])->name('subtransactions.update');
        Route::get('/delete/{id}', [SubtransactionsController::class, 'delete'])->name('subtransactions.delete');
    });
    Route::prefix('account_value')->group(function () {
        Route::get('/all', [AccountvalueController::class, 'index'])->name('accountvalue.index');
        Route::get('/add', [AccountvalueController::class, 'create'])->name('accountvalue.create');
        Route::post('/store', [AccountvalueController::class, 'store'])->name('accountvalue.store');
        Route::get('/edit/{id}', [AccountvalueController::class, 'edit'])->name('accountvalue.edit');
        Route::put('/update/{id}', [AccountvalueController::class, 'update'])->name('accountvalue.update');
        Route::get('/delete/{id}', [AccountvalueController::class, 'delete'])->name('accountvalue.delete');
    });
    
});


