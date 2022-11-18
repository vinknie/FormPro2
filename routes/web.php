<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFormationController;





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
Route::group(['namespace' => 'App\Http\Controllers'], function()
{  
    /* Route accueil */
    Route::get('/', 'PagesController@index')->name('pages.index');

    /* Route Admin */
    Route::get('/admin', 'PagesController@admin')->name('pages.admin');
    /* Route upload file */
    Route::post('admin/uploadfile','PagesController@uploadfile');

    /* Route Elearning */
    Route::get('/elearning','Pagescontroller@elearning')->name('pages.elearning');
    Route::get('/cours','Pagescontroller@cours')->name('pages.cours');
    /* Route de telechargement fichier */
    Route::get('/download/{file}','PagesController@download')->name('download');
    /* Route de vue du fichier */
    Route::get('/view/{id}','PagesController@view')->name('pages.viewfile');

    Route::get('/video','Pagescontroller@video')->name('pages.video');
    Route::get('/live','Pagescontroller@live')->name('pages.live');

    /* Route Register */
    Route::get('/register','PagesController@register')->name('pages.register');
    Route::post('/register','PagesController@register_action')->name('register.action');

    /* Route Login */
    Route::get('/login','PagesController@login')->name('pages.login');
    Route::post('/login','PagesController@login_action')->name('login.action');

    /* Route Logout */
    Route::get('/logout','PagesController@logout')->name('pages.logout');

    /* Route Profil */
    Route::get('/profil','Pagescontroller@profil')->name('pages.profil');

    /* Route Satisafaction */
    Route::get('/satisfaction','Pagescontroller@satisfaction')->name('pages.satisfaction');

     /* Route Login */
     Route::post('admin/createqcm','PagesController@create_qcm')->name('create_qcm');


    //   /* Route Formation */
      
    //   Route::post('admin/create_formation','PagesController@create_formation')->name('create_formation');

    //   /* Route Matiere */
      
    //   Route::post('admin/create_matiere','PagesController@create_matiere');

    //   /* Route All */
    //   Route::post('admin/create_all','PagesController@create_all');

    //   /* Route Edit formation */

    //   Route::get('admin/edit/{id_formation}', 'PagesController@edit')->name('pages.edit');

    //   /* Route update formation */

    //   Route::post('admin/update/{id_formation}', 'PagesController@update')->name('pages.update');

    //   /* Route delete formation */
      
    //   Route::delete('admin/delete/{id_formation}', 'PagesController@delete')->name('pages.delete');


    //    /* Route Matiere */
      
    //    Route::post('admin/create_chapitre','AdminChapitre@create_chapitre');

    /* ROUTE ADMIN BACKOFFICE 2 Formation */

    Route::get('/backoffice', 'AdminController@backoffice')->name('admin.backoffice');

    Route::get('/backoffice/formation', 'AdminFormationController@backOfficeFormation')->name('admin.formation');

    Route::post('/backoffice/formation/createFormationMatiere','AdminFormationController@createFormationMatiere');

    Route::get('/backoffice/formation/editformation/{id_formation}', 'AdminFormationController@editFormation')->name('admin.editformation');
    
    Route::post('backoffice/formation/update/{id_formation}', 'AdminFormationController@updateFormation')->name('admin.update');

    Route::delete('backoffice/formation/delete/{id_formation}', 'AdminFormationController@deleteFormation')->name('admin.delete');

    Route::get('backoffice/formation/editformation/delete/{id_matiere}', 'AdminFormationController@deleteMatiere')->name('admin.deleteMatiere');

    Route::get('/backoffice/formation/showMatiere/{id_formation}','AdminFormationController@showMatiere');

    /* ROUTE ADMIN BACKOFFICE 2 Chapitre */

    Route::get('/backoffice/chapitre', 'AdminChapitreController@chapitre')->name('admin.chapitre');

    Route::get('/backoffice/chapitre/getMatieres/{id_formation}','AdminChapitreController@getMatieres')->name('getMatieres');

    Route::post('/backoffice/chapitre/createChapitre','AdminChapitreController@createChapitre');

    Route::get('/backoffice/chapitre/filterMatiere','AdminChapitreController@filterMatiere')->name('filterMatiere');

    Route::get('/backoffice/chapitre/editchapitre/{id_matiere}', 'AdminChapitreController@editMatiere')->name('admin.editchapitre');

    Route::post('backoffice/chapitre/updateChapitre', 'AdminChapitreController@updateChapitre')->name('admin.updateChapitre');

    Route::get('backoffice/chapitre/editchapitre/delete/{id_chapitre}', 'AdminChapitreController@deleteChapitre')->name('admin.deleteChapitre');

    /* ROUTE ADMIN BACKOFFICE 2 Fichier */

    Route::get('/backoffice/fichier', 'AdminFichierController@fichierview')->name('admin.fichier');

    Route::get('/backoffice/fichier/getMatieres/{id_formation}','AdminFichierController@getMatieres')->name('getMatieresInFile');

    Route::get('/backoffice/fichier/filterMatiere','AdminFichierController@filterMatiereInFile')->name('filterMatiereInFile');

    Route::get('/backoffice/fichier/getChapitre/{id_matiere}','AdminFichierController@getChapitre')->name('getChapitreInFile');

    Route::get('/backoffice/fichier/filterChapitre','AdminFichierController@filterChapitre')->name('filterChapitreInFile');

    Route::post('/backoffice/fichier/createFichier','AdminFichierController@createFichier');
   

    /* Route Elearnling User */
    Route::get('/cours','ElearningUserController@cours')->name('pages.cours');

    Route::get('/cours/getMatieres/{id_formation}','ElearningUserController@getMatieres');

    Route::get('/cours/filterMatiere','ElearningUserController@filterMatiere');

    Route::get('/cours/getChapitre/{id_matiere}','ElearningUserController@getChapitre');

    Route::get('/cours/filterChapitre','ElearningUserController@filterChapitre');

    Route::get('/cours/downloadFile/{file}','ElearningUserController@downloadFile');

   
    
    


     
});
   


/*Route::get('/', function () {
    return view('pages.accueil');
});
*/