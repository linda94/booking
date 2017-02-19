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

    <a href=/post>Submit new user</button>
</body>
</html>