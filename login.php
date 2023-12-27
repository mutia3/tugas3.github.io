<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Halaman Login User</title>
</head>
<body>
<!-- Header -->
<header class="bg-primary p-5 mb-4">
    <div class="container">
        <div class="col-md-15">
            <h2 class="text-left"><b><a href="index.php" role="button" class="text-white">WISATA BUDAYA VIRTUAL NUSANTARA</b></a></h2>
        </div>
    </div>
</header>
<!-- End Header -->

<!-- Form Login -->
<form class="col-md-4 mx-auto">
    <div class="text-center text-primary">
        <h2>Masuk</h2>
        <img src="img/login.jpg" alt="pict-login" width="150px" height="150px"><br>
    </div>
    <div class="mb-3 px-3">
        <label for="nama_pengguna" class="form-label"><b>Username</b></label>
        <input type="text" class="form-control" id="nama_pengguna">
    </div>
    <div class="mb-3 px-3">
        <label for="password" class="form-label"><b>Password</b></label>
        <input type="password" class="form-control" id="password">
    </div><br>
    <div class="text-center">
        <button type="submit" class="btn btn-primary"><a href="index.php" class="text-white">Login</a></button>
    </div>
    <p class="text-right px-3">
        Not a user? <a href="register.php">SignUp now</a>
    </p>
    <div class="text-center">
        <a href="https://accounts.google.com/v3/signin/identifier?authuser=0&continue=https%3A%2F%2Fmyaccount.google.com%2F%3Futm_source%3Dsign_in_no_continue%26pli%3D1&ec=GAlAwAE&hl=in&service=accountsettings&flowName=GlifWebSignIn&flowEntry=AddSession&dsh=S-1727915244%3A1702560650384015&theme=glif">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48"><path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917"/><path fill="#FF3D00" d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691"/><path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44"/><path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917"/></svg>
        </a>
        <a href="https://id-id.facebook.com/">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256"><path fill="#1877F2" d="M256 128C256 57.308 198.692 0 128 0C57.308 0 0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445"/><path fill="#FFF" d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A128.959 128.959 0 0 0 128 256a128.9 128.9 0 0 0 20-1.555V165z"/></svg>
        </a>
    </div>
</form>
  <!-- End Form Login -->
</body>
</html>