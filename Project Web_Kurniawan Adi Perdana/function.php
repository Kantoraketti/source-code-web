<?php
// connect db
$conn = mysqli_connect('localhost', 'root', '', 'epiz_27710187_beasiswa');


function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data)
{
	global $conn;

	//upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	$nama = htmlspecialchars($data["nama_beasiswa"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$desc = htmlspecialchars($data["deskripsi"]);
	$link = htmlspecialchars($data["link"]);

	$query = "INSERT INTO informasi_beasiswa
					VALUES
				('','$gambar','$nama','$tanggal','$desc','$link')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload()
{

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	//cek upload
	if ($error === 4) {
		echo 	"<script>
					alert('Pilih gambar terlebih dahulu');
				</script>";
		return false;
	}

	//cek gambar
	$ekstensiGambarValid  = ['jpg', 'jpeg', 'png', 'svg'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo 	"<script>
					alert('Format Gambar Tidak sesuai');
				</script>";
	}

	//cek ukuran
	if ($ukuranFile > 10000000) {
		echo 	"<script>
					alert('Ukuran gambar terlalu besar');
				</script>";
		return false;
	}

	// $namaFileBaru = uniqid();
	// $namaFileBaru .= '.';
	// $namaFileBaru = $ekstensiGambar;

	//upload
	move_uploaded_file($tmpName, 'img/' . $namaFile);

	return $namaFile;
}

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM informasi_beasiswa where id = $id");

	return mysqli_affected_rows($conn);
}
