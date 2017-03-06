<!DOCTYPE html>
<html>
<head>
	<title>Post</title>
</head>
<body>

	<h1>Post new room to database</h1>

<form method="POST" action="/newroom">

	{{ csrf_field() }} 

  <div class="form-group">
    <label for="1">Room name</label>
    <input type="text" class="form-control" id="1" name="name">
  </div>

    <div class="form-group">
    <label for="2">Capacity</label>
    <input type="number" class="form-control" id="2" name="capacity" required>
  </div>

    <div class="form-group">
    <label for="3">Equipment</label>
    <input type="text" class="form-control" id="3" name="equipment" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>