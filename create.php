<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi CRUD dengan PDO</title>
</head>
<body>

<?php

$aksi = isset($_POST['aksi']) ? $_POST['aksi'] : "";

if($aksi == 'create') {
	//Include database
	include 'koneksi.php'; 

	try {
		//Menulis query
		$query = "INSERT INTO biodata SET nama = :nama, kelas = :kelas, alamat = :alamat, agama = :agama, hobi = :hobi";

		//mempersiapkan query untuk dieksekusi
		$stmt = $koneksi->prepare($query);

		//bindParam digunakan untuk mengikat parameter untuk variabel tertentu
		$stmt -> bindParam(':nama', $_POST['nama']);
		$stmt -> bindParam(':kelas', $_POST['kelas']);
		$stmt -> bindParam(':alamat', $_POST['alamat']);
		$stmt -> bindParam(':agama', $_POST['agama']);
		$stmt -> bindParam(':hobi', $_POST['hobi']);

		//Mengeksekusi pernyataan query
		if ($stmt->execute()) {
			echo "<script language = 'javascript'>
					alert('Berhasil Memasukkan data');
					window.location = 'create.php';
					</script>
			";
		} else {
			echo "<script language = 'javascript'>
					alert('Gagal Memasukkan data nama = :nama');
					window.location = 'create.php';
					</script>
			";
		}

	} 
	catch(PDOException $exception) {
		echo "Error : " .$exception->getMessage();
	}
}
	
?>


<!--- Form Input -->
<form action="#" method="post" />
	<table>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" /></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td><input type="text" name="kelas" /></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="text" name="alamat" /></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td><input type="text" name="agama" /></td>
		</tr>
		<tr>
			<td>Hobi</td>
			<td><input type="text" name="hobi" /></td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="aksi" value="create" />
				<input type="submit" value="Insert" />
				<input type="reset" value="Reset" />
			</td>
		</tr>
		
	</table>
</form>

</body>
</html>