<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <ul>
        @foreach ($users as $user)

            <li> {{ $user->FirstName }} </li>

            <li> {{ $user->LastName }} </li>

            <li> {{ $user->Email }} </li>

        @endforeach

    </ul>
</body>
</html>