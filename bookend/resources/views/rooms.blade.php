<!DOCTYPE html>
<html>
<head>
    <title>Møterom</title>
</head>
<body>
        <h1>Rooms:</h1>
    <ul>

        <?php foreach ($rooms as $room) { ?>
            <li>
                <a href="/rooms/{{ $room->id }}"> 
                <?php echo $room->name; ?>
                </a>
            </li>
        <?php } ?>
    </ul>

        <h1>Options:</h1>
    <div>
        <a href=/newroom>Submit New room</a>
    </div>

    <div>
        <a href=/editroom>Edit room</a>
    </div>
    <div>
        <a href=/home>Back</a>
    </div>


</body>
</html>