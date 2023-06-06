<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RecidentsController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\VisitorsPassController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SearchController;
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
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'registerView'])->name('registerView');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::post('/validate-property-code', [SearchController::class, 'validatePropertyCode'])->name('validate-property-code');
       /**
 * ==============================
 *       @Router -  visitors
 * ==============================
 */
    Route::get('/visitors/{property_code}', [VisitorsController::class, 'index'])->name('visitors');
    //Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/visitors/addvisitors', [VisitorsController::class, 'addVisitors'])->name('visitors.addvisitors');
    Route::post('/visitors/register-visitor-pass', [VisitorsController::class, 'registerVisitorPass'])->name('visitors.registerVisitorPass');
    Route::post('/register-vehicle', [VehiclesController::class, 'registerVehicle'])->name('visitors.registerResidentVehicle');

});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    /**
     * ==============================
     *       @Router - dashboards/
     * ==============================
     */
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
    Route::get('/adduser', [PropertyController::class, 'create'])->name('adduser');
    Route::get('/properties/list', [PropertyController::class, 'getDatos'])->name('properties.list');
    Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::delete('/properties/export', [PropertyController::class, 'expor'])->name('properties.export');

    

        /**
     * ==============================
     *       @Router - users/
     * ==============================
     */
    Route::get('/users', [UsersController::class, 'index'])->name('users');


        /**
     * ==============================
     *       @Router - Recidents/
     * ==============================
     */
    Route::get('/recidents', [RecidentsController::class, 'index'])->name('recidents');

        /**
     * ==============================
     *       @Router - vehicles/
     * ==============================
     */
    Route::get('/vehicles', [VehiclesController::class, 'index'])->name('vehicles');

       /**
     * ==============================
     *       @Router - visitors_pass/
     * ==============================
     */
    Route::get('/visitors_pass', [VisitorsPasstroller::class, 'index'])->name('visitors_pass');

       /**
     * ==============================
     *       @Router - documents/
     * ==============================
     */
    Route::get('/documents', [DocumentsPasstroller::class, 'index'])->name('documents');

     /**
     * ==============================
     *       @Router - settings/
     * ==============================
     */
    Route::get('/settings', [DocumentsPasstroller::class, 'index'])->name('settings');


   });

   