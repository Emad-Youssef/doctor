<?php
use App\Admin;
use App\Contact;
use App\News;
use App\Employee;
use App\User;
use App\Patient;
use App\Drug;
use App\Pocket;
use App\Rosheta;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::prefix('admin')->name('dashboard.')->group(function(){
            Route::group(['middleware' => 'auth'], function() {
                Route::get('/', function() {

                    $admins     = Admin::all()->count();
                    $messages   = Contact::all()->count();
                    $employees  = Employee::all()->count();
                    $patients   = Patient::all()->count();
                    $news       = News::all()->count();
                    $drugs      = Drug::all()->count();
                    $pockets    = Pocket::all()->count();
                    $roshetas   = Rosheta::all()->count();

                    $title = 'home';

                    return view('dashboard.home',compact('title', 'admins','messages','employees','news','drugs','pockets','roshetas','patients'));
                })->name('home');

                // resource route
                Route::resource('settings', 'SettingController');
                //admins
                Route::resource('admins', 'AdminController');
                Route::post('admin/destroyAll', 'AdminController@destroyAll')->name('destroyAdmins');
                Route::post('admin/profile/{id}', 'AdminController@profile')->name('profile');
                //workTime
                Route::resource('workTime', 'WorkController');
               
                //employee
                Route::resource('employee', 'EmployeeController');
                Route::post('employees/destroyAll', 'EmployeeController@destroyAll')->name('destroyEmployee');
                //salary
                Route::resource('salary', 'SalaryController');
                //pocket limit
                Route::resource('pocketlimit', 'PocketLimitController');
                //pockets
                Route::resource('pockets', 'PocketController');
                Route::post('updatepocket', 'PocketController@updateConfirm')->name('updateConfirm');
                Route::post('pocket/destroyAll', 'PocketController@destroyAll')->name('destroyPockets');
                //patient
                Route::resource('patient', 'PatientController');
                //rosheta
                Route::resource('rosheta', 'RoshetaController');
                Route::post('rosheta/destroyAll', 'RoshetaController@destroyAll')->name('destroyRosheta');

                Route::resource('drug', 'DrugController');
                Route::post('drug/destroyAll', 'DrugController@destroyAll')->name('destroyDrug');

                Route::resource('service', 'ServiceController');
                Route::resource('numberFact', 'NumberAndFactController');


                Route::resource('contact', 'ContactController');
                Route::post('contact/destroyAll', 'ContactController@destroyAll')->name('destroyContact');

                Route::resource('news', 'Newcontroller');
                Route::post('news/destroyAll', 'Newcontroller@destroyAll')->name('destroyNews');

                Route::resource('media', 'Mediacontroller');

                Route::post('media/destroyAll', 'Mediacontroller@destroyAll')->name('destroyMedia');

            });

        });




});
