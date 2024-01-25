<!DOCTYPE html>
<html lang="en">
<head>
    <title>Appointment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('admin.includes.nav');
    <div class="container mt-3">
        <h2>Appointment with {{ $data->gurdianName }}</h2>
        <table class="table table-borderless">
            <tbody>
            <tr>
                <td>Guardian Name</td>
                <td>{{ $data->gurdianName }}</td>
            </tr>
            <tr>
                <td>Guardian Email</td>
                <td>{{ $data->gurdianEmail }}</td>
            </tr>
            <tr>
                <td>Child Name</td>
                <td>{{ $data->childName }}</td>
            </tr>
            <tr>
                <td>Child Age</td>
                <td>{{ $data->childAge }}</td>
            </tr>
            <tr>
                <td>Message</td>
                <td style="word-break:break-all;">{{ $data->message }}</td>
            </tr>
            <tr>
                <td>Created at</td>
                <td>{{ $data->created_at }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</body>
</html>