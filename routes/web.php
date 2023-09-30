<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CustomAuthController;

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

rutas fijas:  https://blablablabla/e  
../enlace.php (salirse una carpeta)
../../enlace.php (salirse dos carpetas)
./enlace.php (en la raiz de donde esta trabajando, misma capeta)

url('/productos') usando la ruta relativa
route('products.index') usando name de la ruta

*/

/*
Route::get('/', function () {
    return view('index');
})->name('index');
*/
Route::get('users/{id}', function ($id) {
    
});

Route::get('/',[CustomAuthController::class, 'index'])->name('login');
Route::post('/authenticate',[CustomAuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout',[CustomAuthController::class, 'logout'])->name('logout');

Route::controller(EmployeeController::class)->group(function(){
    Route::get('/employees', 'index')->name('employees.index'); //en name, por conveccion se pone: modelo.metodo
    Route::get('/employees/create', 'create')->name('employees.create'); //esta tiene que ir encima de la ruta employees.show si no genera error y confunde la palabra "create" con el id
    Route::get('/employees/{id}', 'show')->name('employees.show');
    Route::get('/employees/{id}/edit', 'edit')->name('employees.edit');
    
    Route::post('/employees', 'store')->name('employees.store'); //solo va a acceder a esto por algun formulario cuyo metodo es post (no usara la primera ruta de este grupo), es necesario un token para que laraverl permita acceder desde formularios, se puede omitir agregando la ruta como excepcion en el archivo VerifyCrsfToken.ph
    Route::put('/employees/{id}', 'update')->name('employees.update');
    Route::delete('/employees/{id}', 'delete')->name('employees.delete');
});

Route::controller(JobController::class)->group(function(){
    Route::get('/jobs', 'index')->name('jobs.index');
});

Route::controller(DepartmentController::class)->group(function(){
    Route::get('/departments', 'index')->name('departments.index');
});

Route::controller(LocationController::class)->group(function(){
    Route::get('/locations', 'index')->name('locations.index');
});

Route::controller(CountryController::class)->group(function(){
    Route::get('/countries', 'index')->name('countries.index');
});

Route::controller(RegionController::class)->group(function(){
    Route::get('/regions', 'index')->name('regions.index');
});
