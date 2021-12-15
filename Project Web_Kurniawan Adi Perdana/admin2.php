<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("location: login.php");
	exit;
}

require 'function.php';

if (isset($_POST["submit"])) {

	if (tambah($_POST) > 0) {
		echo
			'<script>
				alert("Data Berhasil ditambahkan")
			</script>';
	} else {
		echo
			'<script>
				alert("Data Gagal ditambahkan")
			</script>';
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link rel="stylesheet" href="CSS/admin.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
	<title>Website Admin</title>
</head>

<body>
	<div id="mySidebar" class="sidebar">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<div class="sub-slide">
			<div>
				<i class="fas fa-tachometer-alt"></i><a href="#">Dashboard</a>
			</div>
			<div>
				<i class="fas fa-eye"></i><a href="admin1.php">Lihat Data</a>
			</div>
			<div class="icon">
				<i class="fas fa-plus-square"></i><a href="admin2.php">Tambah Data</a>
			</div>
			<div class="icon">
				<i class="fas fa-sign-out-alt"></i><a href="logout.php">Logout</a>
			</div>
		</div>
	</div>

	<div id="main">
		<button class="openbtn" onclick="openNav()">&#9776; Open Sidebar</button>
	</div>


	<div class="col-group row ml-4 mr-4">
		<div class="col-sm-2">

		</div>
		<div class="col-sm-12">
			<form action="" method="post" enctype="multipart/form-data">
				<h2 class="h2 text-muted">Tambah Data Beasiswa</h2>
				<div class="form-group row">
					<label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
					<div class="col-sm-10">
						<input type="file" name="gambar" id="gambar">
					</div>
				</div>
				<div class="form-group row">
					<label for="nama_beasiswa" class="col-sm-2">Nama Beasiswa</label>
					<div class="col-sm-10">
						<input type="text" name="nama_beasiswa" class="form-control" id="nama_beasiswa" required="">
					</div>
				</div>
				<div class="form-group row">
					<label for="tanggal" class="col-sm-2">Deadline</label>
					<div class="col-sm-10">
						<input type="date" name="tanggal" class="form-control" id="tanggal" required="">
					</div>
				</div>
				<div class="form-group row">
					<label for="deskripsi" class="col-sm-2">Deskripsi</label>
					<div class="col-sm-10">
						<textarea type="text" name="deskripsi" class="form-control" id="deskripsi" required="" rows="10"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="link" class="col-sm-2">Link</label>
					<div class="col-sm-10">
						<input type="text" name="link" id="lin" class="form-control" required="">
					</div>
				</div>
				<div class="from-group row">
					<div class="col-sm-2">
					</div>
					<div class="col-sm-10">
						<button type="submit" name="submit" class="btn btn-primary" id="btn">Tambah Data</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script>
		function openNav() {
			document.getElementById("mySidebar").style.width = "250px";
			document.getElementById("main").style.marginLeft = "250px";
		}

		/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
		function closeNav() {
			document.getElementById("mySidebar").style.width = "0";
			document.getElementById("main").style.marginLeft = "0";
		}
	</script>
</body>


</html>