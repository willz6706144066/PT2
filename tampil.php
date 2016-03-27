<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi CRUD dengan PDO</title>
</head>
<body>

<?php

$action = isset($_GET['action']) ? $_GET['action'] : "";

//jika dialihkan dari delete.php
if($action == 'hapus') {
	echo "<script language = 'javascript'>
	alert('Berhasil Hapus Data');
	window.location = 'tampil.php';
	</script>
	";
}

//menginclude database
include 'koneksi.php';


//memilih semua field
$query = "SELECT * FROM biodata";

//mempersiapkan query untuk di eksekusi
$stmt = $koneksi->prepare($query);

//mengeksekusi pernyataan query
$stmt -> execute();

//untuk mendapatkan jumlah baris
$num = $stmt->rowCount();

if ($num > 0) {
	echo "<table border = '1'>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Alamat</th>
				<th>Agama</th>
				<th>Hobi</th>
				<th colspan = '2'>Aksi</th>
			</tr>
	";

	$no = 0;

	//mengambil isi tabel
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

		//ekstrak baris
		extract($row);
		$no++;
		echo "<tr>
				<td>$no</td>
				<td>{$nama}</td>
				<td>{$kelas}</td>
				<td>{$alamat}</td>
				<td>{$agama}</td>
				<td>{$hobi}</td>
				<td>
					<a href='edit.php?id={$id}'>Edit</a>
					<a href='#' onclick='hapus_data({$id})'>Hapus</a>
				</td>
			</tr>
		";
	}
	echo "</table>";
} else {
	echo "Tidak ada Data ditemukan";
}
?>

<script type="text/javascript">
	function hapus_data(id) {
		var answer = confirm('Apakah Anda Yakin.?')
		if(answer) {
			window.location = 'delete.php?id=' +id;
		}
	}
</script>

</body>
</html>