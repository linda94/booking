<!DOCTYPE html>
<html>
<head>
	<title>Post</title>
</head>
<body>

	<h1>Post user to DB</h1>

<form method="POST" action="/post">

	{{ csrf_field() }} 

  <div class="form-group">
    <label for="exampleInputPassword1">UserID</label>
    <input type="number" class="form-control" id="1" name="userid">
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1">First Name</label>
    <input type="text" class="form-control" id="2" name="fName">
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input type="text" class="form-control" id="3" name="lName">
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Company</label>
    <input type="text" class="form-control" id="4" name="company">
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="number" class="form-control" id="5" name="phone">
  </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="6" name="email">
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="7" name="password">
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" class="form-control" id="8" name="desc">
  </div>  

  <div class="form-group">
    <label for="exampleInputEmail1">Access Level</label>
    <input type="number" class="form-control" id="9" name="access">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>