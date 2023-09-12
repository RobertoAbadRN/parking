<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocusignController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RecidentsController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TermsAndConditionsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\VisitorsController;
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

/**
 * ==============================
 *       @Router - login
 * ==============================
 */
Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginView'])->name('loginView');
    Route::get('/login2', [\App\Http\Controllers\AuthController::class, 'loginView2'])->name('loginView2');
    Route::get('/registrations', [\App\Http\Controllers\RegistrationController::class, 'registration'])->name('registrations');
    Route::post('/registrations/vehicle', [\App\Http\Controllers\RegistrationController::class, 'registerVehicle'])->name('registrations.vehicle');
    Route::post('/registrations/visitor', [\App\Http\Controllers\RegistrationController::class, 'registerVisitor'])->name('registrations.visitor');

    Route::get('/addnewresident/{property_code}', [\App\Http\Controllers\RegistrationController::class, 'newresidet'])->name('addnewresident');    
    Route::post('/residentes/new', [\App\Http\Controllers\RegistrationController::class, 'store'])->name('registerResidentNew');
    
    Route::get('/check-email/{email}', [\App\Http\Controllers\RegistrationController::class, 'checkEmail'])->name('checkEmail');
   


    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'registerView'])->name('registerView');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::get('errorregister', function () {
        return view('errorregister');
    })->name('errorregister');

    Route::post('/validate-property-code', [SearchController::class, 'validatePropertyCode'])->name('validate-property-code');

    /**
     * ==============================
     *       @Router - ForgotPassword
     * ==============================
     */
// Mostrar formulario de olvidó su contraseña
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Enviar correo con enlace de restablecimiento
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Mostrar formulario para restablecer contraseña
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Actualizar contraseña
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

    /**
     * ==============================
     *       @Router -  visitors
     * ==============================
     */
    Route::get('/visitors/{property_code}', [VisitorsController::class, 'index'])->name('visitors');
    Route::post('/visitors/addvisitors', [VisitorsController::class, 'addVisitors'])->name('visitors.addvisitors');
    //Route::get('/visitors', [VisitorsController::class, 'index'])->name('visitors.index');

    Route::post('/visitors/register-visitor-pass', [VisitorsController::class, 'registerVisitorPass'])->name('visitors.registerVisitorPass');
    Route::post('/register-vehicle', [VehiclesController::class, 'registerVehicle'])->name('visitors.registerResidentVehicle');

});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::get('/', [HomeController::class, 'dashboardsCrmAnalytics'])->name('index');
    Route::get('/dashboards/crm-analytics', [HomeController::class, 'dashboardsCrmAnalytics'])->name('dashboards/crm-analytics');
    Route::get('/dashboards/orders', [HomeController::class, 'dashboardsOrders'])->name('dashboards/orders');
    Route::get('/dashboards/orders', [HomeController::class, 'dashboardsOrders'])->name('dashboards/orders');
    Route::get('/dashboards/crypto-2', [HomeController::class, 'dashboardsCrypto2'])->name('dashboards/crypto-2');
    Route::get('/dashboards/crypto-1', [HomeController::class, 'dashboardsCrypto1'])->name('dashboards/crypto-1');
    Route::get('/dashboards/banking-1', [HomeController::class, 'dashboardsBanking1'])->name('dashboards/banking-1');
    Route::get('/dashboards/banking-2', [HomeController::class, 'dashboardsBanking2'])->name('dashboards/banking-2');
    Route::get('/dashboards/personal', [HomeController::class, 'dashboardsPersonal'])->name('dashboards/personal');
    Route::get('/dashboards/cms-analytics', [HomeController::class, 'dashboardsCmsAnalytics'])->name('dashboards/cms-analytics');
    Route::get('/dashboards/influencer', [HomeController::class, 'dashboardsInfluencer'])->name('dashboards/influencer');
    Route::get('/dashboards/travel', [HomeController::class, 'dashboardsTravel'])->name('dashboards/travel');
    Route::get('/dashboards/teacher', [HomeController::class, 'dashboardsTeacher'])->name('dashboards/teacher');
    Route::get('/dashboards/education', [HomeController::class, 'dashboardsEducation'])->name('dashboards/education');
    Route::get('/dashboards/authors', [HomeController::class, 'dashboardsAuthors'])->name('dashboards/authors');
    Route::get('/dashboards/doctor', [HomeController::class, 'dashboardsDoctor'])->name('dashboards/doctor');
    Route::get('/dashboards/employees', [HomeController::class, 'dashboardsEmployees'])->name('dashboards/employees');
    Route::get('/dashboards/workspaces', [HomeController::class, 'dashboardsWorkspaces'])->name('dashboards/workspaces');
    Route::get('/dashboards/meetings', [HomeController::class, 'dashboardsMeetings'])->name('dashboards/meetings');
    Route::get('/dashboards/project-boards', [HomeController::class, 'dashboardsProjectBoards'])->name('dashboards/project-boards');
    Route::get('/dashboards/widget-ui', [HomeController::class, 'dashboardsWidgetUi'])->name('dashboards/widget-ui');
    Route::get('/dashboards/widget-contacts', [HomeController::class, 'dashboardsWidgetContacts'])->name('dashboards/widget-contacts');

    Route::get('/apps/chat', [HomeController::class, 'appsChat'])->name('apps/chat');
    Route::get('/apps/filemanager', [HomeController::class, 'appsFilemanager'])->name('apps/filemanager');
    Route::get('/apps/kanban', [HomeController::class, 'appsKanban'])->name('apps/kanban');
    Route::get('/apps/list', [HomeController::class, 'appsList'])->name('apps/list');
    Route::get('/apps/mail', [HomeController::class, 'appsMail'])->name('apps/mail');
    Route::get('/apps/nft-1', [HomeController::class, 'appsNft1'])->name('apps/nft1');
    Route::get('/apps/nft-2', [HomeController::class, 'appsNft2'])->name('apps/nft2');
    Route::get('/apps/pos', [HomeController::class, 'appsPos'])->name('apps/pos');
    Route::get('/apps/todo', [HomeController::class, 'appsTodo'])->name('apps/todo');
    Route::get('/apps/travel', [HomeController::class, 'appsTravel'])->name('apps/travel');
    /**
     * ==============================
     *       @Router - properties/
     * ==============================
     */

    Route::get('/properties', [PropertyController::class, 'index'])->name('properties');
    Route::post('properties/store', [PropertyController::class, 'storeProperty'])->name('properties.store');
    Route::get('/addproperty', [PropertyController::class, 'create'])->name('addproperty');
    Route::get('/properties/list', [PropertyController::class, 'getDatos'])->name('properties.list');
    Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::get('/properties/excel', [PropertyController::class, 'utiles_excel'])->name('utiles_excel');
    Route::get('properties/vehicles/{property_code}', [PropertyController::class, 'vehicles'])->name('properties.vehicles');
    Route::get('properties/users/{property_code}', [PropertyController::class, 'users'])->name('properties.users');
    Route::put('/properties/{id}/update-permit-status', [PropertyController::class, 'updatePermitStatus'])->name('updatePermitStatus');
    Route::get('/properties/user/{property_code}', [PropertyController::class, 'adduser'])
        ->name('propertiesUser');
    Route::get('/search-residents', [PropertyController::class, 'searchResidents'])->name('search.residents');

    /**
     * ==============================
     *       @Router - users/
     * ==============================
     */
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/users/adduser', [UsersController::class, 'create'])->name('adduser');
    Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
    Route::get('/user/edit/{property}', [UsersController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::get('/verificar-correo', [UsersController::class, 'verificarCorreo'])->name('verificar-correo');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('user.destroy');
    Route::get('/users/excel/{property_code}', [UsersController::class, 'list_users'])->name('list_users');
    Route::get('/users/excelusers', [UsersController::class, 'excel_users'])->name('excel_users');
    Route::get('/users/{user}', [UsersController::class, 'resetPassword'])->name('user.resetPassword');
    Route::put('/users/{user}/ban', [UsersController::class, 'banUser'])->name('user.ban');
    Route::put('/users/{user}/toggleban', [UsersController::class, 'toggleBan'])->name('user.toggleBan');

    /**
     * ==============================
     *       @Router - Recidents/
     * ==============================
     */
    Route::get('/recidents', [RecidentsController::class, 'index'])->name('recidents');
    Route::get('/recidents/approve/{id}', [RecidentsController::class, 'approve'])->name('residents.approve');
    Route::get('/recidents/decline/{id}', [RecidentsController::class, 'decline'])->name('residents.decline');
    Route::get('/residents/addresident', [RecidentsController::class, 'addResident'])->name('resident.addresident');
    Route::post('/residents/addresident', [RecidentsController::class, 'Residentstore'])->name('resident.store');
    Route::get('/residents/{resident}/edit', [RecidentsController::class, 'edit'])->name('residents.edit');
    Route::post('/residents/{resident}/update', [RecidentsController::class, 'update'])->name('residents.update');
    Route::get('/residents/{resident}/print', [RecidentsController::class, 'print'])->name('residents.print');
    Route::get('/residents/{user}', [RecidentsController::class, 'resetPassword'])->name('residents.resetPassword');
    Route::post('/residents/{resident}/delete', [RecidentsController::class, 'destroy'])->name('residents.destroy');
    Route::post('import-csv', [RecidentsController::class, 'importCSV'])->name('importCSV');
    Route::get('/addresident', [RecidentsController::class, 'addResident'])->name('addresident');
    Route::get('/recidents/import', [RecidentsController::class, 'import'])->name('residents.import');
    Route::get('/recidents/import/uploaded', [RecidentsController::class, 'import_uploaded'])->name('residents.import.uploaded');
    Route::get('/recidents/import/uploaded-files/{upload_id}', [RecidentsController::class, 'import_uploaded_files'])->name('residents.import.uploaded.files');
    Route::get('/recidents/import/uploaded-files/{upload_id}/{file_id}', [RecidentsController::class, 'import_uploaded_files_id'])->name('residents.import.uploaded.files.id');
    Route::post('/recidents/import/upload', [RecidentsController::class, 'import_upload'])->name('residents.import.upload');
    Route::post('/update-reserved-space/{departmentId}', [RecidentsController::class, 'updateReservedSpace'])->name('update_reserved_space');
    Route::get('/download-terms-pdf/{resident}', [RecidentsController::class, 'downloadTermsPDF'])->name('download.terms.pdf');
    Route::post('/update_reserved_space_visitors/{departmentId}', [RecidentsController::class, 'updateReservedSpaceVisitors'])->name('update_reserved_space_visitors');

    Route::get('/vehiclesadd/{user_id}', [RecidentsController::class, 'addResidentvehicles'])->name('addResidentvehicles');
    Route::post('/residents/storeResidentVehicle', [RecidentsController::class, 'storeResidentVehicle'])->name('storeResidentVehicle');
    Route::post('/visitors/store', [RecidentsController::class, 'storeVisitor'])->name('store.visitor');
    Route::get('/visitores/{user_id}', [RecidentsController::class, 'showAddVisitorForm'])->name('add.visitor');

    Route::get('residents/{residentId}/cars', [RecidentsController::class, 'showCars'])->name('show_resident_cars');
    Route::post('/update-vehicle', [RecidentsController::class, 'updateVehicle'])->name('update.vehicle');
    Route::get('/addvehicle/{vehicleId}', [RecidentsController::class, 'addVehicle'])->name('addvehicleresident');
    Route::get('/send-suspended-email/{vehicleId}', [RecidentsController::class, 'sendSuspendedEmail'])
        ->name('send.suspended.email');

    Route::get('/residents/edit-vehicle/{id}', [RecidentsController::class, 'editResidentVehicle'])->name('editResidentVehicle');
    Route::put('/residents/update-vehicle/{id}', [RecidentsController::class, 'updateResidentVehicle'])->name('updateResidentVehicle');
    Route::delete('/residents/delete-vehicle/{id}', [RecidentsController::class, 'deleteResidentVehicle'])->name('deleteResidentVehicle');

    Route::get('/visitors/addnewresident', function () {
        return view('addnewresident');
    });
    Route::get('/visitors/addnewresident/{id}', [RecidentsController::class, 'addVisitorForm'])->name('addnewresident');


    /**
     * ==============================
     *       @Router - vehicles/
     * ==============================
     */
    Route::get('/vehicles', [VehiclesController::class, 'index'])->name('vehicles');
    Route::get('/addvehicle/{user_id}', [VehiclesController::class, 'create'])->name('addvehicle');

    Route::post('/vehicles.store', [VehiclesController::class, 'store'])->name('vehicles.store');
    Route::get('/vehicles/{id}/edit/{property_code}', [VehiclesController::class, 'edit'])->name('edit.vehicle');
    Route::put('/update/{id}', [VehiclesController::class, 'update'])->name('vehicles.update');

    Route::delete('/vehicles/{vehicle}/properties/{property_code}', [VehiclesController::class, 'destroy'])->name('vehicles.destroy');
    Route::get('/vehicles/excel/{property_code}', [VehiclesController::class, 'listvehicles_excel'])->name('listvehicles_excel');
    Route::get('/vehicles/{vehicle}/show', [VehiclesController::class, 'show'])->name('vehicles.show');
    Route::get('/vehicles/excelvehicles', [VehiclesController::class, 'excel_vehicles'])->name('excel_vehicles');
    Route::post('/suspend-vehicle/{id}', [VehiclesController::class, 'suspendVehicle'])->name('vehicles.suspend');

    /**
     * ==============================
     *       @Router - visitors_pass/
     * ==============================
     */
    Route::get('/visitors_pass', [VisitorsController::class, 'show'])->name('visitors_pass');
    Route::get('/list-visitors/{property_code}', [VisitorsController::class, 'listVisitors'])->name('list.visitors');
    Route::get('/list-visitors/addtemporary/{property_code}', [VisitorsController::class, 'addTemporary'])->name('temporary.visitors.pass');
    Route::post('/visitors/add', [VisitorsController::class, 'storeTemporary'])->name('visitors.add');
    Route::get('/excelvisitors', [VisitorsController::class, 'excel_visitorspases'])->name('excel_visitorspases');
    Route::get('/excelvisitorsid/{property_code}', [VisitorsController::class, 'excel_visitorforid'])->name('excel_visitorforid');
    Route::delete('/visitor/{id}', [VisitorsController::class, 'delete'])->name('delete-visitor');

    /**

     * ==============================

     *       @Router - documents/

     * ==============================

     */
    //Route::resource('/documents', 'DocumentController');
    //Route::get('/documents/property', [DocumentController::class, 'property'])->name('documents.property');

    Route::get('documents/formats', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('documents/addfile', [DocumentController::class, 'create'])->name('documents.create');
    Route::get('documents/{id}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::get('documents/property', [DocumentController::class, 'property'])->name('documents.property');
    Route::post('documents/store', [DocumentController::class, 'store'])->name('documents.store');
    Route::put('documents/update/{id}', [DocumentController::class, 'update'])->name('documents.update');
    Route::delete('documents/delete/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    Route::get('documents/property', [DocumentController::class, 'property'])->name('documents.property');

    /*Route::get('/documents', [DocumentsController::class, 'index'])->name('documents');
    Route::get('/documents/addfile', [DocumentsController::class, 'addFile'])->name('documents.addfile');
    Route::post('/documents', [DocumentsController::class, 'store'])->name('documents.store');
    // Ruta para mostrar el formulario de edición
    Route::get('/documents/{id}/edit', [DocumentsController::class, 'edit'])->name('documents.edit');
    // Ruta para enviar los datos del formulario y actualizar el documento
    Route::put('/documents/{id}', [DocumentsController::class, 'update'])->name('documents.update');
    Route::delete('/documents/{id}', [DocumentsController::class, 'destroy'])->name('documents.destroy');

    Route::get('/documents/addfile', [DocumentsController::class, 'addFile'])->name('documents.addfile');

    Route::post('/documents', [DocumentsController::class, 'store'])->name('documents.store');

    // Ruta para mostrar el formulario de edición

    Route::get('/documents/{id}/edit', [DocumentsController::class, 'edit'])->name('documents.edit');

    // Ruta para enviar los datos del formulario y actualizar el documento

    Route::put('/documents/{id}', [DocumentsController::class, 'update'])->name('documents.update');

    Route::delete('/documents/{id}', [DocumentsController::class, 'destroy'])->name('documents.destroy');*/

    /**
     * ==============================
     *       @Router - settings/
     * ==============================
     */
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/settings/admin/permit/{property}', [SettingsController::class, 'permit'])->name('settings.permit');
    Route::get('/settings/admin/permit/type/{property}', [SettingsController::class, 'permit_type'])->name('settings.permit.type');
    Route::get('/settings/admin/visitors/{property}', [SettingsController::class, 'visitor'])->name('settings.permit.visitor');
    Route::get('/settings/admin/pre-registration/{property}', [SettingsController::class, 'registration'])->name('settings.permit.registration');
    Route::post('/settings/languages', [SettingsController::class, 'language'])->name('settings.language');
    Route::post('/settings/languages/store', [SettingsController::class, 'store'])->name('settings.language.store');
    Route::post('/settings/visitors/store', [SettingsController::class, 'visitorSettingStore'])->name('settings.visitor.store');
    Route::post('/settings/registration/store', [SettingsController::class, 'registrationSettingStore'])->name('settings.registration.store');
    Route::post('/settings/permit/types', [SettingsController::class, 'permitTypeSettingStore'])->name('settings.permit.type.store');
    Route::post('/settings/permit/margin', [SettingsController::class, 'permitMarginSettingStore'])->name('settings.permit.margin.store');
    Route::post('/settings/permit/print', [SettingsController::class, 'permitPrintSettingStore'])->name('settings.permit.print.store');

    /**
     * ==============================
     *       @Router - roles/
     * ==============================
     */
    //Route::resource('/roles', [RoleController::class]);
    Route::resource('/roles', RoleController::class);

    /**
     * ==============================
     *       @Router - profile/
     * ==============================
     */

    // Ruta para cargar el formulario modal de edición del perfil
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    /**
     * ==============================
     *       @Router - Docusign
     * ==============================
     */
    Route::get('docusign', [DocusignController::class, 'index'])->name('docusign');
    Route::get('connect-docusign', [DocusignController::class, 'connectDocusign'])->name('connect.docusign');
    Route::get('docusign/callback', [DocusignController::class, 'callback'])->name('docusign.callback');
    Route::get('sign-document', [DocusignController::class, 'signDocument'])->name('docusign.sign');

});

/**
 * ==============================
 *       @Router - semails/
 * ==============================
 */

Route::get('/send-email/{id}/{property_code}/{email}', [EmailController::class, 'sendEmail'])->name('send.email');
Route::post('/send_mass_email', [EmailController::class, 'sendMassEmail'])->name('send_mass_email');
Route::get('/send-email-expiredEmail/{id}', [EmailController::class, 'sendExpiredEmail'])->name('send-email-expiredemail');
Route::get('/send-email-activate/{id}', [EmailController::class, 'sendActivateEmail'])->name('send-email-activate');
Route::get('/send-email-suspend/{id}', [EmailController::class, 'sendSuspendEmail'])->name('send-email-suspend');

Route::get('/terms-and-conditions-english/{token}/{language}', [TermsAndConditionsController::class, 'openTermsAndConditions'])
    ->name('terms-and-conditions-english');

Route::get('/terms-and-conditions-spanish/{token}/{language}', [TermsAndConditionsController::class, 'openTermsAndConditions'])
    ->name('terms-and-conditions-spanish');

Route::get('/show-terms/{token}', [TermsAndConditionsController::class, 'showTermsAndConditions'])
    ->name('show-terms');

Route::post('/accept-terms/{token}', [TermsAndConditionsController::class, 'acceptTermsAndConditions'])
    ->name('accept-terms');

Route::get('/error', function () {
    return view('error')->with('message', 'Invalid token'); // Puedes personalizar el mensaje de acuerdo a tus necesidades
})->name('error-route');


// rutas para los emails de los settings 
Route::get('/email/edit/{property_code}', [EmailController::class, 'edit'])->name('email.edit');
Route::post('/email/update', [EmailController::class, 'update'])->name('email.update');



/**

 * ==============================

 *       @Router - Docusign

 * ==============================

 */

Route::get('docusign', [DocusignController::class, 'index'])->name('docusign');

Route::get('connect-docusign', [DocusignController::class, 'connectDocusign'])->name('connect.docusign');

Route::get('docusign/callback', [DocusignController::class, 'callback'])->name('docusign.callback');

Route::get('sign-document', [DocusignController::class, 'signDocument'])->name('docusign.sign');
