<!DOCTYPE html>
<html lang="en">
<head>
  <title>editTestimonial</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('admin.includes.nav')
<div class="container">
  <h2>Update data</h2>
  <form action="{{ route('admin.testimonial.update',$testimonial->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{$testimonial->name}}" name="name">
      @error('name')
       <div class="alert alert-danger">{{ $message}}</div>
       @enderror
    </div>
    <div class="form-group">
      <label for="job">job:</label>
      <input type="text" class="form-control" id="job" placeholder="Enter job" name="job"  value="{{$testimonial->job}}">
      @error('job')
      <div class="alert alert-danger">{{ $message}}</div></div>
       @enderror
    </div>
    <div class="form-group">
      <label for="comment">comment:</label>
      <textarea class="form-control" name="comment" id="" cols="60" rows="3">{{$testimonial->comment}}</textarea>
      @error('comment')
       <div class="alert alert-danger">{{ $message}}</div>
       @enderror 
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image">
      <br>
      <img src="{{ asset('admin/images/'.$testimonial->image) }}" alt="" style="width:200px;">
      @error('image')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>
        <div class="checkbox">
        <label><input type="checkbox" name="published" @checked($testimonial->published)> Published me</label>
         </div>
        <button type="submit" class="btn btn-default">update</button>
  </form>
</div>
</body>
</html>