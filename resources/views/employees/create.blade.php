<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creating Employee</title>
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('employees.index') }}">RETURN</a>
    </nav>

    <h1>CREATION FORM</h1>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="photo">Photo</label>
        <input type="file" name="photo"> <!-- para mandar varias imagenes se modifica el name a photo[]-->

        <label for="first_name">First Name</label>
        <input type="text" name="first_name">

        <label for="last_name">Last Name</label>
        <input type="text" name="last_name">

        <label for="email">Email</label>
        <input type="email" name="email">

        <label for="phone_number">Phone Number</label>
        <input type="number" name="phone_number">

        <label for="hire_date">Hire Date</label>
        <input type="date" name="hire_date">

        <label for="job_id">Job</label>
        <select name="job_id">
            <option value="" selected disabled> Select a Job</option>
            @foreach ($jobs as $job)
                <option value="{{$job->job_id}}">{{$job->job_title}}</option>                
            @endforeach
        </select>

        <label for="salary">Salary</label>
        <input type="number" name="salary">

        <label for="commission_pct">Commission Percentage</label>
        <input type="text" name="commission_pct">

        <label for="department_id">Department</label>
        <select name="department_id">
            <option value="" selected disabled> Select a Department</option>
            @foreach ($departments as $department)
                <option value="{{$department->department_id}}">{{$department->department_name}}</option>                
            @endforeach
        </select>

        <label for="observation"></label>
        <textarea name="observation"></textarea>    

        <button type="submit">Send</button>
    </form>
    
</body>
</html>