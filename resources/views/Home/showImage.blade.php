<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(session('status'))
        <h4 style="color: green;">{{session('status')}}</h4>
    @endif
    <table border="2">
        <tr>
            <th>Id</th>
            <th>student Name</th>
            <th>student Image</th>
        </tr>
        @foreach($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->student_name}}</td>
                <td><img src="{{asset($item->student_image)}}" height="150" width="150" alt=""></td>
            </tr>
        @endforeach

    </table>
</body>
</html>
