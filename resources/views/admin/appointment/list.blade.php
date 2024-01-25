<!DOCTYPE html>
<html lang="en">
<head>
  <title>listappointment</title>
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
        <th>gurdianName</th>
        <th>gurdianEmail</th>
        <th>childName</th>
        <th>childAge</th>
        <th>show</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
     @foreach( $data as $k)   
      <tr>
        <td>{{$k->gurdianName}}</td>
        <td>{{$k->gurdianEmail}}</td>
        <td>{{$k->childName}}</td>
        <td>{{$k->childAge}}</td>
        <td><a href="{{ route('admin.appointment.show',[$k->id]) }}">show</a></td>
        <td><a href="{{ route('admin.appointment.delete',[$k->id]) }}"onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>