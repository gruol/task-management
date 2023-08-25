<!DOCTYPE html>
<html lang="en">
<head>
  <title>Task Managment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{route('tasks.index')}}">Task Management</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{route('tasks.index')}}">All Tasks</a></li>
        <li ><a href="{{route('tasks.create')}}">Add Task</a></li>

      </ul>
    </div>
  </nav>
  
    <div class="container">
  <div class="panel panel-default">
    <div class="panel-body">
     @yield('content')
   </div>
   </div>
 </div>


 <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript" charset="utf-8" ></script>
 <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8" ></script>
 @yield('js')
</body>
</html>
