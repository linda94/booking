<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1> {{$room->name}} </h1>

<form method="PATCH" action="/rooms{room}">

	{{ csrf_field() }} 

  <div class="form-group">
    <label for="1">New Room name</label>
    <input type="text" class="form-control" id="1" name="NewRoomName">
  </div>

    <div class="form-group">
    <label for="2">New Capacity</label>
    <input type="number" class="form-control" id="2" name="NewCapacity" required>
  </div>

    <div class="form-group">
    <label for="3">Equipment</label>
    <input type="text" class="form-control" id="3" name="equipment" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>