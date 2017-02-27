<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <ul>

        <h1>Users:</h1>

        @foreach ($users as $user)

            <li> {{ $user->FirstName }} </li>

            <li> {{ $user->LastName }} </li>

            <li> {{ $user->Email }} </li>

        @endforeach

    </ul>

    <div>
        <a href=/post>Submit New User</a>
    </div>

    <div>
        <a href=/register>Register New User</a>
    </div>

    <div>
        <a href=/login>Log In</a>
    </div>

</body>
</html>