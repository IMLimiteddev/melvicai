<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\RulesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManageLogicController;
use App\Livewire\Admin\Roles;
use App\Http\Controllers\Admin\GmailController;
use App\Http\Controllers\V1\Admin\ConfigurationController;

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

    Route::get('/download/output/{filename}', [RulesController::class, 'downloadOutputFile'])
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


Route::prefix('admin/rule-service')->middleware(['auth', 'verified'])->group(function () {
    


    Route::get('/index', [RulesController::class, 'configIndex'])
    ->name('admin.rule-service.index');

    Route::get('/scan-pdf', [RulesController::class, 'scanPdf'])
    ->name('admin.rule-service.scan-pdf');

    Route::get('/display-scanned-results/{id?}', [RulesController::class, 'displayScannedResults'])
    ->name('admin.rule-service.display-scanned-results');

    Route::post('/save-scan-results', [RulesController::class, 'saveScanResults'])
    ->name('admin.rule-service.save-scan-results');

    Route::post('/admin/create-after-scan/{id?}', [RulesController::class, 'createAfterScan'])->name('admin.create.after.scan');

    Route::get('/admin/use-config-page/{id?}', [RulesController::class, 'useConfigPage'])->name('admin.use.config.page');
    Route::post('/admin/use-config/{id?}', [RulesController::class, 'useConfig'])->name('admin.use.config');

    Route::post('/process-suggested/{id}',[RulesController::class, 'processSuggested']);


});

Route::prefix('admin/config-service')->middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/index/config', [ConfigurationController::class, 'indexConfig'])
    ->name('admin.index.config');

    Route::post('/initiate/config', [ConfigurationController::class, 'configInitiate'])
    ->name('admin.initiate.config');

    Route::get('/scan-process-1/{id?}', [ConfigurationController::class, 'scanProcess1'])
    ->name('admin.scan-process-1');
    
    Route::get('/scan-process-display/{id?}', [ConfigurationController::class, 'scanProcessDisplay'])
    ->name('admin.scan-process-display');

    Route::get('/scan-process-2/{id?}', [ConfigurationController::class, 'scanProcess2'])
    ->name('admin.scan-process-2');

    Route::get('/direct-process-1/{id?}', [ConfigurationController::class, 'directProcess1'])
    ->name('admin.direct-process-1');

    Route::post('/direct-process-2/{id?}', [ConfigurationController::class, 'directProcess2'])
    ->name('admin.direct-process-2');

    Route::get('/final-process/{id?}', [ConfigurationController::class, 'finalProcess'])
    ->name('admin.final-process');

    Route::get('/single/config', [ConfigurationController::class, 'singleConfig'])
    ->name('admin.configs.single');

});

Route::get('/google/gmail/connect', [GmailController::class, 'connect'])
    ->name('gmail.connect');

Route::get('/google/gmail/callback', [GmailController::class, 'callback'])
    ->name('gmail.callback');

// Route::get('/admin/roles-permissions', Roles::class)
//     ->name('admin.roles-perm');

require __DIR__.'/settings.php';
// require __DIR__.'/admin.php';
