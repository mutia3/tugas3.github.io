<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/borobudur.png">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Aplikasi Wisata Budaya Virtual</title>
	<style>
		.color {
		  background-color: darkgrey;
		}
	</style>
</head>
<body>
<!-- Header -->
<header class="bg-warning p-5 mb-4">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="col-md-15">
            <h2 class="text-left text-white"><b>WISATA BUDAYA VIRTUAL NUSANTARA</b></h2>
        </div>
		<p class="text-white">
            <svg  xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M16 9a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-2 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0" /><path d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1M3 12c0 2.09.713 4.014 1.908 5.542A8.986 8.986 0 0 1 12.065 14a8.984 8.984 0 0 1 7.092 3.458A9 9 0 1 0 3 12m9 9a8.963 8.963 0 0 1-5.672-2.012A6.992 6.992 0 0 1 12.065 16a6.991 6.991 0 0 1 5.689 2.92A8.964 8.964 0 0 1 12 21" /></g></svg>
			<a class="text-white" href="beranda_login.php"><b>Username</b></a> 
		</p>	
    </div>
</header>
<!-- End Header -->

<!-- Nav -->
<nav class="navbar navbar-expand-md p-3">
	<div class="container-fluid">
	<button class="navbar-toggler bg-warning text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<b><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 256 256"><path fill="currentColor" d="M224 120v16a8 8 0 0 1-8 8H40a8 8 0 0 1-8-8v-16a8 8 0 0 1 8-8h176a8 8 0 0 1 8 8m-8 56H40a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h176a8 8 0 0 0 8-8v-16a8 8 0 0 0-8-8m0-128H40a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h176a8 8 0 0 0 8-8V56a8 8 0 0 0-8-8"/></svg></b> 
	</button>
	  <div class="collapse navbar-collapse md-2" id="navbarTogglerDemo01">
		<a href="index.php" class="text-dark me-3 text-center">
			<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19h3v-6h6v6h3v-9l-6-4.5L6 10v9Zm-2 2V9l8-6l8 6v12h-7v-6h-2v6H4Zm8-8.75Z"/>Home</svg>
			<br><b>Home</b>
		</a><br>

		<a class="text-dark me-3 text-center" href="content.php" alt="Home">
			<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M3 6.25A3.25 3.25 0 0 1 6.25 3h11.5A3.25 3.25 0 0 1 21 6.25v11.5A3.25 3.25 0 0 1 17.75 21H6.25A3.25 3.25 0 0 1 3 17.75V6.25ZM6.25 4.5A1.75 1.75 0 0 0 4.5 6.25v11.5c0 .966.784 1.75 1.75 1.75h11.5a1.75 1.75 0 0 0 1.75-1.75V6.25a1.75 1.75 0 0 0-1.75-1.75H6.25ZM6 8.25c0-.966.784-1.75 1.75-1.75h8.5c.966 0 1.75.784 1.75 1.75v1.5a1.75 1.75 0 0 1-1.75 1.75h-8.5A1.75 1.75 0 0 1 6 9.75v-1.5ZM7.75 8a.25.25 0 0 0-.25.25v1.5c0 .138.112.25.25.25h8.5a.25.25 0 0 0 .25-.25v-1.5a.25.25 0 0 0-.25-.25h-8.5Zm-1 5a.75.75 0 0 0 0 1.5h4.5a.75.75 0 0 0 0-1.5h-4.5ZM6 16.75a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75ZM15.25 13a1.75 1.75 0 0 0-1.75 1.75v1c0 .966.784 1.75 1.75 1.75h1A1.75 1.75 0 0 0 18 15.75v-1A1.75 1.75 0 0 0 16.25 13h-1ZM15 14.75a.25.25 0 0 1 .25-.25h1a.25.25 0 0 1 .25.25v1a.25.25 0 0 1-.25.25h-1a.25.25 0 0 1-.25-.25v-1Z"/></svg>
			<br><b>Content</b>
		</a><br>

		<a class="text-dark me-3 text-center" href="payment.php">
			<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4"><rect width="30" height="36" x="9" y="8" rx="2"/><path stroke-linecap="round" d="M18 4v6m12-6v6m-14 9h16m-16 8h12m-12 8h8"/></g></svg>
			<br><b>Transaksi</b>
		</a>

		<ul class="navbar-nav me-auto">
		  <li class="nav-item">
			</a>
		  </li>
		  <li class="nav-item">
		  </li>
		</ul>
		<form class="d-flex" role="search">
		  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
		  <button class="btn btn-dark" type="submit">Search</button>
		</form>
	  </div>
	</div>
</nav><br>
<!-- End Nav -->

<!-- Card -->
<div class="bg-warning p-2 col-sm-6">
	<h2>Most Popular Destinations</h2>
</div><br>

<section id="card">
	<div class="container">
		<div class="row row-cols-1 row-cols-md-3 g-4">
			<div class="col mb-5">
				<div class="card h-100 bg-light">
					<img src="img/borobudur.png"
					class="card-img-top" alt="...">
					<div class="card-body text-dark">
						<h5 class="card-title">Paket Tour Popular 1</h5>
						<p class="card-text">Kunjungan Destinasi Wisata Ke : Tempat Candi Borobudur -> Candi Dieng -> Candi Mendut</p><br>
					</div class="text-center hx-4">
						<p><a class="btn btn-danger me-2" href="#">Rp. 375,000 
                                <a class="btn btn-warning" href="#" role="button">Pilih Paket Tour
                            </a>
                        </a>
                    </p>
				</div>
			</div>
            <div class="col mb-5">
				<div class="card h-100 bg-light">
					<img src="img/prambanan.png"
					class="card-img-top" alt="...">
					<div class="card-body text-dark">
						<h5 class="card-title">Paket Tour Popular 2</h5>
						<p class="card-text">Kunjungan Destinasi Wisata Ke : Tempat Candi Prambanan -> Candi Ratuboko -> Gunung Merapi</p><br>
					</div class="text-center">
						<p><a class="btn btn-danger me-2" href="#">Rp. 425,000 
                                <a class="btn btn-warning" href="#" role="button">Pilih Paket Tour
                            </a>
                        </a>
                    </p>
				</div>
			</div>
            <div class="col mb-5">
				<div class="card h-100 bg-light">
					<img src="img/bromo.png"
					class="card-img-top" alt="...">
					<div class="card-body text-dark">
						<h5 class="card-title">Paket Tour Popular 3</h5>
						<p class="card-text">Kunjungan Destinasi Wisata Ke : Tempat Gunung Bromo -> Kawah Ijen -> Taman Nasional Baluran</p><br>
					</div class="text-center">
						<p><a class="btn btn-danger me-2" href="#">Rp. 520,000 
                                <a class="btn btn-warning" href="#" role="button">Pilih Paket Tour
                            </a>
                        </a>
                    </p>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
</section>
<!--End card-->

<div class="bg-warning p-2 col-sm-6">
	<h2>Recomendation For Your Destination</h2>
</div><br>

<section id="card">
	<div class="container">
		<div class="row row-cols-1 row-cols-md-3 g-4">
			<div class="col mb-5">
				<div class="card h-100 bg-light">
					<img src="img/batur.png"
					class="card-img-top" alt="...">
					<div class="card-body text-dark">
						<h5 class="card-title">Paket Tour 1</h5>
						<p class="card-text">Kunjungan Destinasi Wisata Ke : Tempat Danau Batur -> Danau Buyan -> Tanah Lot</p><br>
					</div class="text-center">
						<p><a class="btn btn-danger me-2" href="#">Rp. 685,000 
                                <a class="btn btn-warning" href="#" role="button">Pilih Paket Tour
                            </a>
                        </a>
                    </p>
				</div>
			</div>
            <div class="col mb-5">
				<div class="card h-100 bg-light">
					<img src="img/bedugul.png"
					class="card-img-top" alt="...">
					<div class="card-body text-dark">
						<h5 class="card-title">Paket Tour 2</h5>
						<p class="card-text">Kunjungan Destinasi Wisata Ke : Tempat Bedugul -> Danau Beratan Bedugul -> Kebun Raya Bedugul</p><br>
					</div class="text-center">
						<p><a class="btn btn-danger me-2" href="#">Rp. 650,000 
                                <a class="btn btn-warning" href="#" role="button">Pilih Paket Tour
                            </a>
                        </a>
                    </p>
				</div>
			</div>
            <div class="col mb-5">
				<div class="card h-100 bg-light">
					<img src="img/kawahijen.png"
					class="card-img-top" alt="...">
					<div class="card-body text-dark">
						<h5 class="card-title">Paket Tour 3</h5>
						<p class="card-text">Kunjungan Destinasi Wisata Ke : Tempat kawah ijen -> Telaga Dieng -> Taman Nasional Baluran</p><br>
					</div class="text-center">
						<p><a class="btn btn-danger me-2" href="#">Rp. 600,000 
                                <a class="btn btn-warning" href="#" role="button">Pilih Paket Tour
                            </a>
                        </a>
                    </p>
				</div>
			</div>
            <div class="col mb-5">
				<div class="card h-100 bg-light">
					<img src="img/merapi.png"
					class="card-img-top" alt="...">
					<div class="card-body text-dark">
						<h5 class="card-title">Paket Tour 4</h5>
						<p class="card-text">Kunjungan Destinasi Wisata Ke : Tempat Taman Wisata Gunung Merapi -> Telogo Putri -> Gardu Pandang </p><br>
					</div class="text-center">
						<p><a class="btn btn-danger me-2" href="#">Rp. 350,000 
                                <a class="btn btn-warning" href="#" role="button">Pilih Paket Tour
                            </a>
                        </a>
                    </p>
				</div>
			</div>
            <div class="col mb-5">
				<div class="card h-100 bg-light">
					<img src="img/nusapenida.png"
					class="card-img-top" alt="...">
					<div class="card-body text-dark">
						<h5 class="card-title">Paket Tour 5</h5>
						<p class="card-text">Kunjungan Destinasi Wisata Ke : Tempat Pantai Nusa Penida -> Pantai Nusa Dua -> Pantai Kuta</p><br>
					</div class="text-center">
						<p><a class="btn btn-danger me-2" href="#">Rp. 665,000 
                                <a class="btn btn-warning" href="#" role="button">Pilih Paket Tour
                            </a>
                        </a>
                    </p>
				</div>
			</div>
            <div class="col mb-5">
				<div class="card h-100 bg-light">
					<img src="img/telagadieng.png"
					class="card-img-top" alt="...">
					<div class="card-body text-dark">
						<h5 class="card-title">Paket Tour 6</h5>
						<p class="card-text">Kunjungan Destinasi Wisata Ke : Tempat Telaga Dieng -> Danau Batur -> Tanah Lot</p><br>
					</div class="text-center">
						<p><a class="btn btn-danger me-2" href="#">Rp. 425,000 
                                <a class="btn btn-warning" href="#" role="button">Pilih Paket Tour
                            </a>
                        </a>
                    </p>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
</section>
<!--End card-->

<!-- Footer -->
<footer class="color">
	<div class="container">
		<div class="row">
			<div class="col-md-15">			
			<center><div class="col-sm-4 col-xxl-4 mb-3">
				Portal Destination Center, Sunggingan Rt.02 Rw.11, Sendangrejo, Kec. Minggir, Kabupaten Sleman,
				Daerah Istimewa Yogyakarta
				55562
			</div></center>
	
			<center>
				<p><b>Hubungi Disini</b></p>
	
				<i class="material-icons btn btn-dark btn-md mb-2">phone</i>
				<a class="btn btn-light btn-md mb-2" href="#" role="button">WhatsApp</a>
			
				<i class="material-icons btn btn-dark btn-md mb-2">forum</i>
				<a class="btn btn-light btn-md mb-2" href="#" role="button">Instagram</a>
				
				<i class="material-icons btn btn-dark btn-md mb-2">map</i>
				<a class="btn btn-light btn-md mb-2" href="#" role="button">Google Maps</a>
			</center>
			</div>
		</div>
	</div>
		<div class="text-center text-white bg-dark">
			<b>© 2021 Copyright Portal Destination Center</b>
		</div>
	</footer>
<!-- End Footer -->
</body>
</html>