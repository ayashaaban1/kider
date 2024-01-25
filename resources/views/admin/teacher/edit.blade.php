<!DOCTYPE html>
<html lang="en">
<head>
    <title>EditTeacher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('admin.includes.nav');
    <div class="container">
        <h2>Update data</h2>
        <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $teacher->name }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ $teacher->title }}">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="fb">Facebook:</label>
                <input type=text" class="form-control" id="fb" placeholder="Enter fb" name="fb" value="{{ $teacher->fb }}">
                @error('fb')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="twitter">Twitter:</label>
                <input type=text" class="form-control" id="twitter" placeholder="Enter twitter" name="twitter" value="{{ $teacher->twitter }}">
                @error('twitter')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="insta">Insta:</label>
                <input type=text" class="form-control" id="insta" placeholder="Enter insta" name="insta" value="{{ $teacher->insta }}">
                @error('insta')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                <br>
                <img src="{{ asset('admin/images/'.$teacher->image) }}" alt="" style="width:200px;">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="published" @checked($teacher->published)> Published</label>    
                </div>
            </div>
            <button type="submit" class="btn btn-default">update</button>
        </form>
    </div>
</body>
</html>