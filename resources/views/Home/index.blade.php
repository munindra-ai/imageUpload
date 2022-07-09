<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url ('upload')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label >Enter Name:</label>
        <input type="text" name="std_name" ><br>
        @error('std_name')
        <span style="color:red;">{{$message}}</span>
        @enderror
        <br>
        <label>select Image: </label>
        <br>
        <input type="file" name="std_image" >
        <br>
        @error('std_image')
        <span style="color:red;">{{$message}}</span>
        @enderror
        <br>
        <input type="submit" value="Upload">
    </form>

    @if(session('status'))
    {{--<!-- <h4 style="color: green;">{{session('status')}}</h4> -->--}}
    <img src="{{session('status')}}" height="150" width="150" alt="">
    @endif
</body>
</html>