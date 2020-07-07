<?php

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


/*
 *
 * Portfolio Routes
 */

Route::get('/', function () {
    return view('hsite.index');
});

Route::get('/resume', function () {
    return response()->file('resume.pdf');
});

Route::post('mail/contactForm', 'MailController@contactForm');



/*
 *
 * PDF Export Routes
 */

Route::get('/projects/pdfexport', 'PdfExportController@index');
Route::post('/projects/pdfexport/adduser', 'PdfExportController@addUser');
Route::get('/projects/pdfexport/getusers', 'PdfExportController@getUsers');
Route::post('/projects/pdfexport/{form}', 'PdfExportController@exportPdf');


/*
 *
 * CMS MIPS Routes
 */

Route::get('/projects/providersearch', 'CmsPhysicianProviderRegistryController@index');
Route::match(['post'], '/projects/providersearch/search', 'CmsPhysicianProviderRegistryController@search');
Route::get('/projects/providersearch/zip/{zip}', 'CmsPhysicianProviderRegistryController@zip');
Route::get('/projects/providersearch/specialty/{specialty}', 'CmsPhysicianProviderRegistryController@specialty');
Route::get('/projects/providersearch/api/getspecialties', 'CmsPhysicianProviderRegistryController@getSpecialties');
Route::get('/projects/providersearch/api/gethospitals', 'CmsPhysicianProviderRegistryController@getHospitals');
Route::get('/projects/providersearch/api/getproviderfullnames', 'CmsPhysicianProviderRegistryController@getProviderFullNames');
Route::get('/projects/providersearch/api/getAffiliatedProviders/{pecosid}', 'CmsPhysicianProviderRegistryController@getAffiliatedProviders');
Route::get('/projects/providersearch/api/getAffiliatedHospitals/{hospital}', 'CmsPhysicianProviderRegistryController@getAffiliatedHospitals');
Route::get('/projects/providersearch/profile/{npi}', 'CmsPhysicianProviderRegistryController@profile');
