<!DOCTYPE html>
<html>
<head>
    <title>Møterom</title>
</head>
<body>
    <ul>

        <h1>Rooms:</h1>
        @foreach ($rooms as $room)
            <li> {{ $room->name }} </li>
        @endforeach        
    </ul>

    <div>
        <a href=/newroom>Submit New room</a>
    </div>

    <div>
        <a href=/editroom>Edit room</a>
    </div>

</body>
</html>