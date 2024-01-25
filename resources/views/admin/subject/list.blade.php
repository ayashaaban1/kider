<!DOCTYPE html>
<html lang="en">
<head>
  <title>Subjects</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('admin.includes.nav')
<div class="container">
  <h2> list</h2>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Time</th>
        <th>Cost</th>
        <th>Teacher</th>
        <th>published</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
     @foreach( $subject as $k)   
      <tr>
        <td>{{$k->name}}</td>
        <td>{{$k->age}}</td>
        <td>{{$k->time}}</td>
        <td>{{$k->cost}}</td>
        <td>{{$k->teacher->name}}</td>
        <td>
            @if($k->published)
                Yes
            @else
                No
            @endif
        </td>
        <td><a href="{{ route('admin.subject.edit',[$k->id]) }}">Edit</a></td>
        <td><a href="{{ route('admin.subject.delete',[$k->id]) }}"onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- Pagination -->
  <div class="d-flex justify-content-center">
        {!!  $subject ->links() !!}
    </div>
</div>

</body>
</html>