<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\RulesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManageLogicController;
use App\Livewire\Admin\Roles;

Route::view('/', 'welcome')->name('home');
Route::view('/onboard/services', 'onboard.services')->name('onboard.services');
Route::view('/onboard/about', 'onboard.about')->name('onboard.about');
Route::view('/onboard/contact', 'onboard.contact')->name('onboard.contact');

Route::view('/admin/roles-permissions', 'admin.roles-perm')->name('admin.roles-perm');

Route::view('/admin/users', 'admin.users')->name('admin.users');

Route::post('/admin/roles', [RolesController::class, 'mkRole'])->name('admin.roles');
Route::post('/admin/permissions', [RolesController::class, 'mkPermission'])->name('admin.permissions');

Route::post('/admin/rule-query', [RulesController::class, 'ruleQuery'])->name('admin.rules.query');

Route::post('/admin/rule-send', [RulesController::class, 'ruleSend'])->name('admin.rule.send');
Route::post('/admin/new-rule', [RulesController::class, 'newRule'])->name('admin.new.rule');


Route::view('/admin/roles-permissions', 'admin.roles-perm')
    ->name('admin.roles-perm');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('admin/download-txt/{filename}', function ($filename) {
    

    $fileUrl = "http://31.97.126.130:1000/download/output_file/" . rawurlencode($filename);

    $response = \Http::get($fileUrl);
    if ($response->successful()) {

    return response($response->body())
            ->header('Content-Type', 'application/octet-stream')
            ->header('Content-Disposition', 'attachment; filename="'.$filename.'"');
        // return view('admin.models');
    } else {

    // dd('here');
        return view('admin.models')->withErrors('Failed to download the file.');    
    }
})->name('admin.download.txt');

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/customers', [AdminController::class, 'customers'])->name('admin.customers');
    Route::get('/customers/single/{id?}', [AdminController::class, 'customerSingle'])->name('admin.customers.single');
    Route::get('/add-customer-mapping/{id?}/{new?}', [RulesController::class, 'addCustomerMapping'])->name('admin.add.customer.mapping');  
    Route::get('/modify-mapping/{id?}', [RulesController::class, 'modifyMapping'])->name('admin.modify.mapping');
    Route::get('/temp-mapping/{id?}', [RulesController::class, 'tempMapping'])->name('admin.temp_mappings');
    Route::post('/save-mapping/{id?}', [RulesController::class, 'saveMapping'])->name('admin.save.mapping');

    Route::get('/download/output/{filename}', [ManageLogicController::class, 'downloadOutputFile'])
    ->where('filename', '.*')
    ->name('admin.download.output');

});


Route::prefix('admin/logic-manager')->middleware(['auth', 'verified'])->group(function () {
    


    Route::get('/verbs', [ManageLogicController::class, 'indexVerb'])
    ->name('admin.verbs.index');

    Route::get('/verbs/create/view', [ManageLogicController::class, 'createVerbView'])
    ->name('admin.verbs.create.view');
  
    Route::post('/verb', [ManageLogicController::class, 'storeVerb'])
    ->name('admin.verb.store');

    Route::post('/verb/{verb?}', [ManageLogicController::class, 'updateVerb'])
    ->name('admin.verb.edit');

    Route::delete('/verb/{verb}', [ManageLogicController::class, 'destroyVerb'])
    ->name('admin.verb.destroy');

});

// Route::get('/admin/roles-permissions', Roles::class)
//     ->name('admin.roles-perm');

require __DIR__.'/settings.php';
// require __DIR__.'/admin.php';
