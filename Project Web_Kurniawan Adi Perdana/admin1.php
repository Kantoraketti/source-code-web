<?php
session_start();

if (!isset($_SESSION['login'])) {
	header("location: login.php");
	exit;
}
require 'function.php';
//ambil data 
$beau = query("SELECT * FROM informasi_beasiswa");

if (!isset($_POST[""]))

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

<body bg-light>
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

	<div class="col-group row">
		<div class="col-sm-2 bg-light">

		</div>
		<div class="col-sm-12 ml-4 mr-4 mt-4">
			<h1 class="mr-md-3">Daftar Beasiswa</h1><br>
			<table border="1" cellpadding="10" cellspacing="10">
				<tr>
					<th>No</th>
					<th>Aksi</th>
					<th>Gambar</th>
					<th>Nama Beasiswa</th>
					<th>Tanggal</th>
					<th>Deskripsi</th>
					<th>Link</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($beau as $beasiswa) : ?>
					<tr>
						<td><?= $i; ?></td>
						<td>
							<a href="#" class="text-info"><i class="fas fa-edit"></i>Edit</a> |
							<a href="hapus.php?id=<?= $beasiswa['id'] ?>" class="text-danger"" onclick=" return confirm('Apakah Anda Yakin Ingin Menhapusnya?');"><i class="fas fa-trash-alt"></i>Hapus</a>
						</td>
						<td><img src="img/<?= $beasiswa['gambar'] ?>" width="50px"></td>
						<td><?= $beasiswa['nama_beasiswa'] ?></td>
						<td><?= $beasiswa['tanggal'] ?></td>
						<td><?= $beasiswa['deskripsi'] ?></td>
						<td><?= $beasiswa['link'] ?></td>
					</tr>

					<?php $i++; ?>
				<?php endforeach; ?>
			</table>
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