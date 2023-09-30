<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model{
    use HasFactory;
    /*
        en caso que este modelo se conecte a otra base de datos se agrega:
        protected $connection = 'connection-name';.
        los modelos tienen una clase, por ejemplo Product, y buscara automaticamente la tabla en la base de datos llamada products, si no se llama asi, la proxima linea es obligatoria
        protected $table = 'products';

        en caso que la primary key no se llame id, se debe agregar
        protected $primaryKey = 'nombre_del_campo';

        en caso que no sea autoincrementable
        public $incrementing = false

        en caso que no sea entero la llave primaria
        protected $keyType = 'string';
    */
    protected $primaryKey = 'employee_id';

    protected $fillable = [
        //'id', no es necesario porque laravel supone que existe, en este caso se llama 'employee_id' la cual es autoincrementable
        'photo',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'job_id',
        'salary',
        'commission_pct',
        'department_id',
        'observation'
        //'created_at',
        //'updated_at'  no son necesarios ponerlos dado que laravel supone que existen        
    ];
    /*
        si las tablas no tienen created_at o updated_at del tipo timestamp poner esto:
        public $timestamps = false;
        en caso que tengan otro nombre, referenciarlos de esta manera
        const CREATED_AT = 'creation_date';
        const UPDATED_AT = 'last_update';
    */
    
    //se crea una funcion por cada foreign key
    public function job(){
        return $this->belongsTo(Job::class, 'job_id'); //asocia con el modelo Job, a traves del campo job_id, la funcion puede o no llamarse igual que el modelo
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id'); //asocia con el modelo Department, a traves del campo department_id, la funcion puede o no llamarse igual que el modelo        
    }
}
