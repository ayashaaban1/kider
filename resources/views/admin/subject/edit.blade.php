<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Subject</title>
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
        <form action="{{ route('admin.subject.update', $subject->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $subject->name }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" class="form-control" id="age" placeholder="Enter age" name="age" value="{{ $subject->age }}">
                @error('age')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="text" class="form-control" id="time" placeholder="Enter time" name="time" value="{{ $subject->time }}">
                @error('time')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="cost">Cost:</label>
                <input type="number" class="form-control" id="cost" placeholder="Enter cost" name="cost" value="{{ $subject->cost }}">
                @error('cost')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="teacher_id">Teacher:</label>
                <div class="form-group">
                    <select name="teacher_id">
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @selected($subject->teacher_id == $teacher->id)>{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('teacher_id')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                <br>
                <img src="{{ asset('admin/images/'.$subject->image) }}" alt="" style="width:200px;">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="published" @checked($subject->published)> Published</label>    
                </div>
            </div>
            <button type="submit" class="btn btn-default">update</button>
        </form>
    </div>
</body>
</html>