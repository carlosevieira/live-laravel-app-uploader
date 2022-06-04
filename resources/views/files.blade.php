<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method="POST" enctype="multipart/form-data" action="/upload">
    @csrf
    <input type="file" name="file">
    <button type="submit">Fazer upload</button>
</form>

@foreach ($files as $file)
    <br>
    <a href="https://cdn.worksn.com.br/{{$file->name}}" target="_blank">{{$file->real_name}}</a>
    <br>
@endforeach
</body>
</html>
