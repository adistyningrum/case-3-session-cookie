<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Cookie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="index.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<?php include('header.php'); ?>
<h1>Login</h1>
<form id="loginForm" method="post" action="Profil.php" enctype="multipart/form-data">
    <div class="container">
        <!-- NAMA -->
        <div class="login-group2302">
            <img src="asset/user2.png" alt="Ellipse18145"/>
        </div>
        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input id="email" class="form-control" type="text" placeholder="ex : user@example.com" name="Email" aria-label="default input example">
            <span id="emailError" style="color: red; display: none;">Email harus mengandung '@' dan '.'</span>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
            <input id="password" class="form-control" type="password" placeholder="Enter your password" name="Password" id="Password">
            <span id="passwordError" style="color: red; display: none;">Password harus memiliki panjang minimal 8 karakter dan mengandung alfabet, angka, serta simbol.</span>
            <!-- Tambahkan ikon mata -->
            <i class="fas fa-eye" id="togglePassword"></i>
        </div>
        </form>

        <form id="loginForm" method="post" action="validate_login.php" enctype="multipart/form-data">
        
        <input type="checkbox" id="myCheckbox" name="rememberMe" checked>
        <label for="myCheckbox">Ingat Saya</label>
        </form>

        <!-- BUTTON -->
        <div class="button">
            <button class="btn btn-outline-primary" type="submit" name="hasil">Log in</button>
        </div>
    </div>

<?php include('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>