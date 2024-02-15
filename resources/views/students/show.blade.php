<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>details</h3>
    <img src={{ asset("storage/".$data->image) }} alt="">
<p>name:{{$data->name}}</p>
<p>phone:{{$data->phone}}</p>
<p>email:{{$data->mail}}</p>
<p>section:{{ $data->section }}</p>


<p></p>
</body>
</html>
