<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editing Employee</title>
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('employees.index') }}">RETURN</a>
    </nav>

    <h1>EDITION FORM</h1>
    <form action="{{ route('employees.update',$employee->employee_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        
        <label for="photo">Photo</label>
        <img src="{{ asset($employee->photo)}}">
        <input type="file" name="photo">

        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="{{$employee->first_name}}">

        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="{{$employee->last_name}}">

        <label for="email">Email</label>
        <input type="email" name="email" value="{{$employee->email}}">

        <label for="phone_number">Phone Number</label>
        <input type="number" name="phone_number" value="{{$employee->phone_number}}">

        <label for="hire_date">Hire Date</label>
        <input type="date" name="hire_date" value="{{$employee->hire_date}}">

        <label for="job_id">Job</label>
        <select name="job_id">
            <option value="" selected disabled> Select a Job</option>
            @foreach ($jobs as $job)
                <option value="{{$job->job_id}}" {{ ($employee->job_id == $job->job_id)? 'selected': ''}}>{{$job->job_title}}</option>                
            @endforeach
        </select>

        <label for="salary">Salary</label>
        <input type="number" name="salary" value="{{$employee->salary}}">

        <label for="commission_pct">Commission Percentage</label>
        <input type="text" name="commission_pct" value="{{$employee->commission_pct}}">

        <label for="department_id">Department</label>
        <select name="department_id">
            <option value="" selected disabled> Select a Department</option>
            @foreach ($departments as $department)
                <option value="{{$department->department_id}}" {{ ($employee->department_id == $department->department_id)? 'selected': ''}}>{{$department->department_name}}</option>                
            @endforeach
        </select>

        <label for="observation"></label>
        <textarea name="observation">{{$employee->observation}}</textarea>    

        <button type="submit">Edit</button>
    </form>
    
</body>
</html>