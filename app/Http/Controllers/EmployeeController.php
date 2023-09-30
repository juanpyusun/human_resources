<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Job;
use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller{
        //aqui van los metodos del crud y otros adicionales
        public function index(){
            //Read all
            //regresa el listado de todos los empleados
            //Para manipular la base de datos se usa el ORM , en laravel es ELOQUENT
            if(Auth::check()){
                //Guardando en una variable todos los registros
                $employees = Employee::all(); // Similar a Select * from employees;
        
                //par debuggear parecido a var_dump(), tenemos Dump and Die:
                //dd($employees);
        
                return view('employees.index')->with([//el punto indica que dentro de la carpeta employees esta index
                    'employees' => $employees //se manda junto a la vista un arreglo llamado 'employees' que manda todos los valores de la variable $employees
                ]); 
            }
            return redirect()->route('login');
        }
        
        public function create(){
            //muestra el formulario para almacenar, y este formulario apunta al metodo store
            //$categorias = Category::where('id','=','')->get(); // get cada que se usa where, el segundo parametro si es igual, se puede omitir, puede ser < > <= >=
            $jobs = Job::all();
            $departments = Department::all();
            
            return view('employees.create')->with([
                'jobs' => $jobs,
                'departments'=> $departments 
            ]);
        }
    
        public function store(Request $request){
            //create
            //almacena un nuevo producto en la base de datos
            $inputs = $request->all();
            //FORMA # 1 es buena para hacer validaciones o modificaciones a los datos
            //se crea un objeto del modelo en donde se desea guardar
            $employee = new Employee;

            //este metodo es rustico pero funcional
            $employee->first_name = $inputs['first_name'];
            $employee->last_name = $inputs['last_name'];
            $employee->email = $inputs['email'];
            $employee->phone_number = $inputs['phone_number'];
            $employee->hire_date = $inputs['hire_date'];
            $employee->job_id = $inputs['job_id'];
            $employee->salary = $inputs['salary'];
            $employee->commission_pct = $inputs['commission_pct'];
            $employee->department_id = $inputs['department_id'];
            $employee->observation = $inputs['observation'];
            //para la imagen
            if(isset($inputs['photo'])){
                $file = $request->file('photo');
                $filename = date('Ymd').'-'.time().$file->getClientOriginalName();
                $file->move(public_path('img/employees'), $filename); //move recibe 2 parametros a donde va y que se desea mover... se usa la funcion public_path
                $employee->photo = 'img/employees/'.$filename;
            }
            //para mandar a la base de datos
            $employee->save();
            
            //FORMA # 2 es buena si no contiene archivos y se necesita enviar todo directamente, el formulario debe contener todos los campos del modelo
            //Employee::create($inputs)
            return redirect()->route('employees.index')->with('success', 'Employee saved successfully'); //para mandar un mensaje de success seria al final ->
        }
   
        public function edit($id){
            //muestra los datos para poder editar
            $employee = Employee::find($id); //en vez de where se usa find si ya se conoce 
            $jobs = Job::all();
            $departments = Department::all();
            return view('employees.edit')->with([
                'employee' => $employee,
                'jobs'=>$jobs,
                'departments' => $departments
            ]);
        }
    
        public function update(Request $request, $id){
            $inputs = $request->all();
            //se llama al objeto asociado a la id
            $employee = Employee::find($id);

            $employee->first_name = $inputs['first_name'];
            $employee->last_name = $inputs['last_name'];
            $employee->email = $inputs['email'];
            $employee->phone_number = $inputs['phone_number'];
            $employee->hire_date = $inputs['hire_date'];
            $employee->job_id = $inputs['job_id'];
            $employee->salary = $inputs['salary'];
            $employee->commission_pct = $inputs['commission_pct'];
            $employee->department_id = $inputs['department_id'];
            $employee->observation = $inputs['observation'];

            if(isset($inputs['photo'])){
                //agregar funcion para borrar imagen con unlink()
                $file = $request->file('photo');
                $filename = date('Ymd').'-'.time().$file->getClientOriginalName();
                $file->move(public_path('img/employees'), $filename);
                $employee->photo = 'img/employees/'.$filename;
            }
            else{
                //si no se ha cargado una nueva foto dejar la misma que tenia anteriormente
                $employee->photo = $employee->photo;               
            }
            //para mandar a la base de datos es igual a store
            $employee->save();
    
            return redirect()->route('employees.index')->with('success', 'Employee updated successfully');      
        }
        //FALTA ESTE METODO***************************************************************************************************************************
        public function show($id){
            //muestra el detalle de un employee
    
            return 'detalle del empleado -> '.$id;
        }
    
        public function delete($id){
            // Buscar el empleado que des
            //agregar funcion para borrar imagen con unlink()eas eliminar por su ID
            $employee = Employee::find($id);

            //es recomendable no eliminar datos de la BD; mejor generar un campo adicional de estados y aqui en el delete() inactivar el dato
            if ($employee){
                // Eliminar el registro del empleado
                $employee->delete();
                //¿COMO BORRAR LA IMAGEN???????????******************************************************************************************************
            }    
            return redirect()->route('employees.index')->with('success', 'Employee deleted successfully'); 
        }
}
