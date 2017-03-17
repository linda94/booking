<!DOCTYPE html>
<html>
<head>
    <title>Møterom</title>
</head>
<body>
    <ul>
        <h1>Rooms:</h1>
        <li>
        
        <?php foreach ($rooms as $room) { ?>
            <li>
                <a href="/rooms/{{ $room->id }}"> 
                <?php echo $room->name; ?>
                </a>
            </li>
        <?php } ?>
        
        </li>
    </ul>

    <div>
        <a href=/newroom>Submit New room</a>
    </div>

    <div>
        <a href=/editroom>Edit room</a>
    </div>

</body>
</html>