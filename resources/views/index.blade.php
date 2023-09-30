<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Human Resources</title>
</head>
<body>
    <h1>Welcome to Human Resources</h1>
    <ol>
        <li><a href="{{route('employees.index')}}">Employees</a></li>
        <li><a href="{{route('jobs.index')}}">Jobs</a></li>
        <li><a href="{{route('departments.index')}}">Departments</a></li>
        <li><a href="{{route('locations.index')}}">Locations</a></li>
        <li><a href="{{route('countries.index')}}">Countries</a></li>
        <li><a href="{{route('regions.index')}}">Regions</a></li>
    </ol>
    <img src="{{asset('img/esquema-hr.png')}}">
</body>
</html>