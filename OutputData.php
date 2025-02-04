<?php
// Memulai session
session_start();

// Inisialisasi variabel email
$email = "";

// Memeriksa apakah email ada dalam session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Output Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include('header.php'); ?>

    <?php
    if (!isset($_SESSION['email'])) {
        header("Location: InputData.php");
        exit();
    }
    
    ?>

    <h1>Anda Berhasil Login! </h1>
    <div class="container-output">
        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
        <div class="output">
            <?php echo $email !== "" ? $email : "Email tidak tersedia"; ?>
        </div>
    </div>
<div class="button">
        <form action="LogOut.php" method="post">
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
    <?php include('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
