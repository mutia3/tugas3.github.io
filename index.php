<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aplikasi Wisata Budaya Virtual</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale-1">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<style>
		.color {
		  background-color: darkgrey;
		}

	  </style>
</head>
<body>
<!-- Header -->
<header class="bg-primary p-4 mb-4">
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
<nav class="navbar navbar-expand-lg p-3">
	<div class="container-fluid">
	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse md-2" id="navbarTogglerDemo01">
		<a href="index.html" class="text-dark me-3">
			<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19h3v-6h6v6h3v-9l-6-4.5L6 10v9Zm-2 2V9l8-6l8 6v12h-7v-6h-2v6H4Zm8-8.75Z"/>Home</svg>
			<br><b>Home</b>
		</a>
		<ul class="navbar-nav me-auto">
		  <li class="nav-item text-center">
			<a class="text-dark me-3" href="content.html" alt="Home">
				<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M3 6.25A3.25 3.25 0 0 1 6.25 3h11.5A3.25 3.25 0 0 1 21 6.25v11.5A3.25 3.25 0 0 1 17.75 21H6.25A3.25 3.25 0 0 1 3 17.75V6.25ZM6.25 4.5A1.75 1.75 0 0 0 4.5 6.25v11.5c0 .966.784 1.75 1.75 1.75h11.5a1.75 1.75 0 0 0 1.75-1.75V6.25a1.75 1.75 0 0 0-1.75-1.75H6.25ZM6 8.25c0-.966.784-1.75 1.75-1.75h8.5c.966 0 1.75.784 1.75 1.75v1.5a1.75 1.75 0 0 1-1.75 1.75h-8.5A1.75 1.75 0 0 1 6 9.75v-1.5ZM7.75 8a.25.25 0 0 0-.25.25v1.5c0 .138.112.25.25.25h8.5a.25.25 0 0 0 .25-.25v-1.5a.25.25 0 0 0-.25-.25h-8.5Zm-1 5a.75.75 0 0 0 0 1.5h4.5a.75.75 0 0 0 0-1.5h-4.5ZM6 16.75a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75ZM15.25 13a1.75 1.75 0 0 0-1.75 1.75v1c0 .966.784 1.75 1.75 1.75h1A1.75 1.75 0 0 0 18 15.75v-1A1.75 1.75 0 0 0 16.25 13h-1ZM15 14.75a.25.25 0 0 1 .25-.25h1a.25.25 0 0 1 .25.25v1a.25.25 0 0 1-.25.25h-1a.25.25 0 0 1-.25-.25v-1Z"/></svg>
				<br><b>Content</b>
			</a>
		  </li>
		  <li class="nav-item text-center">
			<a class="text-dark me-3" href="payment.html">
				<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4"><rect width="30" height="36" x="9" y="8" rx="2"/><path stroke-linecap="round" d="M18 4v6m12-6v6m-14 9h16m-16 8h12m-12 8h8"/></g></svg>
				<br><b>Transaksi</b>
			</a>
		  </li>
		  <li class="nav-item">
			<a class="text-dark me-3" href="profil.html">
				<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1Z"/></svg>
				<br><b>Profil</b>
			</a>
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

<!-- Jumbotron -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-indicators">
	  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
	  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
	  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
	</div>
	<div class="carousel-inner">
	  <div class="carousel-item active">
		<img src="img/kawahijen.png" class="d-block mx-auto" alt="">
		<div class="carousel-caption d-none d-md-block">
		  <h5>Kawah Ijen</h5>
		  <pre>Kawah Ijen adalah sebuah wisata alam berupa danau asam yang warnanya hijau kebiruan
		  dengan diameter sekitar 700 meter dan luas mencapai 5.466 hektar.</pre>
		</div>
	  </div>
	  <div class="carousel-item">
		<img src="img/bedugul.png" class="d-block mx-auto" alt="">
		<div class="carousel-caption d-none d-md-block">
		  <h5>Pure Bedugul</h5>
		  <p>Some representative placeholder content for the second slide.</p>
		</div>
	  </div>
	  <div class="carousel-item">
		<img src="img/nusapenida.png" class="d-block mx-auto" alt="">
		<div class="carousel-caption d-none d-md-block">
		  <h5>Nusa Penida</h5>
		  <p>Some representative placeholder content for the third slide.</p>
		</div>
	  </div>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
	  <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
	  <span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
	  <span class="carousel-control-next-icon bg-primary aria-hidden="true"></span>
	  <span class="visually-hidden">Next</span>
	</button>
  </div><br>
<!-- End Jumbotron -->

	<div class="bg-primary p-2 col-sm-6">
		<h2>Recomendation For Your Destination</h2>

	</div><br>

<!-- Card -->
<section id="card">
	<div class="container">
		<div class="row row-cols-1 row-cols-md-3 g-4">
			<div class="col mb-5">
				<div class="card h-100 text-center bg-light">
					<img src="img/borobudur.png"
					class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Candi Borobudur</h5>
							<p class="card-text text-dark">Borobudur dibangun dengan gaya Mandala yang mencerminkan alam semesta dalam kepercayaan Buddha. Struktur bangunan ini berbentuk kotak dengan empat pintu masuk dan titik pusat berbentuk lingkaran. </p>
							<p><a class="btn btn-danger btn-md" href="#" role="button">Selengkapnya</a>
						<br>
						</div>
							<div class="card-footer bg-dark btn btn-warning">
								<small class="text-white">Last updated 1 mins ago</small>
							</div>
						</div>
					</div>

					<div class="col mb-5">
						<div class="card h-100 text-center bg-light">
						<img src="img/ratuboko.png"
						class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Candi Ratu Boko</h5>
								<p class="card-text text-dark">Ratu Boko terletak sekitar 3 km ke arah selatan dari Candi Prambanan. Kawasan Ratu Boko yang berlokasi di atas sebuah bukit dengan ketinggian ± 195.97 m diatas permukaan laut.</p>
								<p><a class="btn btn-danger btn-md" href="#" role="button">Selengkapnya</a>
							<br>
							</div>
								<div class="card-footer bg-dark btn btn-warning">
									<small class="text-white">Last updated 2 mins ago</small>
								</div>
							</div>
					</div>

					<div class="col mb-5">
						<div class="card h-100 text-center bg-light">
						<img src="img/batur.png"
						class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Danau Batur</h5>
								<p class="card-text text-dark">Ratu Boko terletak sekitar 3 km ke arah selatan dari Candi Prambanan. Kawasan Ratu Boko yang berlokasi di atas sebuah bukit dengan ketinggian ± 195.97 m diatas permukaan laut.</p>
								<p><a class="btn btn-danger btn-md" href="#" role="button">Selengkapnya</a>
							<br>
							</div>
								<div class="card-footer bg-dark btn btn-warning">
									<small class="text-white">Last updated 3 mins ago</small>
								</div>
							</div>
					</div>

					<div class="col mb-5">
						<div class="card h-100 text-center bg-primary">
						<img src="img/bromo.png"
						class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Gunung Bromo</h5>
								<p class="card-text text-white">Ratu Boko terletak sekitar 3 km ke arah selatan dari Candi Prambanan. Kawasan Ratu Boko yang berlokasi di atas sebuah bukit dengan ketinggian ± 195.97 m diatas permukaan laut.</p>
								<p><a class="btn btn-danger btn-md" href="#" role="button">Selengkapnya</a>
							<br>
							</div>
								<div class="card-footer bg-dark btn btn-warning">
									<small class="text-white">Last updated 1 mins ago</small>
								</div>
							</div>
					</div>

					<div class="col mb-5">
						<div class="card h-100 text-center bg-primary">
						<img src="img/merapi.png"
						class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Gunung Merapi</h5>
								<p class="card-text text-white">Ratu Boko terletak sekitar 3 km ke arah selatan dari Candi Prambanan. Kawasan Ratu Boko yang berlokasi di atas sebuah bukit dengan ketinggian ± 195.97 m diatas permukaan laut.</p>
								<p><a class="btn btn-danger btn-md" href="#" role="button">Selengkapnya</a>
							<br>
							</div>
								<div class="card-footer bg-dark btn btn-warning">
									<small class="text-white">Last updated 3 mins ago</small>
								</div>
							</div>
					</div>

					<div class="col mb-5">
					<div class="card h-100 text-center bg-primary">
					<img src="img/prambanan.png"
					class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Candi Prambanan</h5>
							<p class="card-text text-white">Candi Prambanan merupakan candi Hindu terbesar di Indonesia. Sampai saat ini belum dipastikan kapan candi ini dibangun, namun kuat dugaan bahwa Candi Prambanan dibangun sekitar pertengahan abad ke-9.</p>
							<p><a class="btn btn-danger btn-md" href="#" role="button">Selengkapnya</a>
						<br>
					</div>
						<div class="card-footer bg-dark btn btn-warning">
							<small class="text-white">Last updated 2 mins ago</small>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>

<!-- Map -->

<!-- End Map -->

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
		<div class="text-center text-white p-0 bg-dark">
			<b>© 2021 Copyright Portal Destination Center</b>
		</div>
	</footer>
	<!-- End Footer -->
</body>
</html>