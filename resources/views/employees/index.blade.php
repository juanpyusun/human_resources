@extends('layouts.base')
@section('title','Empleados')
@section('content')
    <nav>
        <a href="{{route('logout')}}">LOGOUT</a>
        <a href="{{route('employees.create')}}">TO ADD</a>
        <a href="">CONTACT US</a>
    </nav>
    <h1>{{Auth::user()->name}}</h1> <!-- con este metodo se pueden validar roles-->
    @if(session('success'))
        <div class="alert alert-success">
            <span>{{ session('success') }}</span>
            <button class="close-button">&times;</button>
        </div>
    @endif
    <h1>EMPLOYEES</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Actions</th>              
                <th>Photo</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Hire Date</th>
                <th>Job</th>
                <th>Salary</th>
                <th>Commission Percentage</th>
                <th>Department</th>
                <th>Observation</th>  
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->employee_id }}</td>
                    <td>
                        <a href="{{route('employees.edit',$employee->employee_id)}}">Update</a> <!-- el metodo route recibe el nombre(name) de la ruta y puede enviar un parametro, en este caso el respectivo id-->
                        <form action="{{route('employees.delete',$employee->employee_id)}}" method="POST" class="form-invisible" id="form-invisible-{{ $employee->employee_id }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="button-link" data-id="{{$employee->employee_id }}">Delete</button>
                        </form>
                        <a href="{{route('employees.show',$employee->employee_id)}}">Show</a>
                    </td>
                    <td><img src="{{ asset($employee->photo) }}"></td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone_number }}</td>
                    <td>{{ $employee->hire_date }}</td>
                    <td>{{ $employee->job->job_title }}</td> <!-- se esta llamando la funcion job del modelo Employee, de esta relacion se pide job_title-->
                    <td>{{ $employee->salary }}</td>
                    <td>{{ $employee->commission_pct }}</td>
                    <td>{{ $employee->department->department_name}}</td> <!-- se esta llamando la funcion department del modelo Employee, de esta relacion se pide department_name-->
                    <td>{{ $employee->observation}}</td>
                </tr>              
            @endforeach
        </tbody>
        <tfoot>
            <tr>
            <td colspan="13"><span>Total records:{{count($employees)}}</span></td>
        </tr>            
        </tfoot>
    </table>

@endsection
