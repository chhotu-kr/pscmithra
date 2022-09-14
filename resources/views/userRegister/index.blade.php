<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a href="" class="navbar-brand">User Dashboard</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="{{route('logout')}}" class="nav-link text-white fw-bold">LogOut</a></li>
        </ul>
    </div>
  </nav>
<h1 class="text-center text-theme mt-4">You are loggedIn</h1>
</body>
</html>