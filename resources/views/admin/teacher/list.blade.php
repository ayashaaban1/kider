<!DOCTYPE html>
<html lang="en">
<head>
  <title>listTeacher</title>
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
        <th>Title</th>
        <th>Facebook</th>
        <th>Twitter</th>
        <th>Insta</th>
        <th>published</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
     @foreach( $teacher as $k)   
      <tr>
        <td>{{$k->name}}</td>
        <td>{{$k->title}}</td>
        <td>{{$k->fb}}</td>
        <td>{{$k->twitter}}</td>
        <td>{{$k->insta}}</td>
        <td>
            @if($k->published)
                Yes
            @else
                No
            @endif
        </td>
        <td><a href="{{ route('admin.teacher.edit',[$k->id]) }}">Edit</a></td>
        <td><a href="{{ route('admin.teacher.delete',[$k->id]) }}"onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @if (Session("Error"))
    <div class=" alert alert-success">{{Session("Error")}}</div>
    @endif
  
</div>

</body>
</html>