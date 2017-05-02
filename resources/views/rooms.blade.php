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
</body>
</html>