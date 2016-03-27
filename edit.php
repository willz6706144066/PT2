<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

//menginclude database
include 'koneksi.php';

$action = isset($_POST['action']) ? $_POST['action'] : "";

if($action == "edit") {
	try {

		//membuat query 
		$query = "UPDATE biodata SET nama = :nama, kelas = :kelas, alamat = :alamat, agama = :agama, hobi = :hobi WHERE id = :id";
		
		//mempersiapkan query untuk dieksekusi
		$stmt = $koneksi->prepare($query);

		//mengikat parameter
		$stmt -> bindParam(':nama', $_POST['nama']);
		$stmt -> bindParam(':kelas', $_POST['kelas']);
		$stmt -> bindParam(':alamat', $_POST['alamat']);
		$stmt -> bindParam(':agama', $_POST['agama']);
		$stmt -> bindParam(':hobi', $_POST['hobi']);
		$stmt -> bindParam(':id', $_POST['id']);

		//mengeksekusi query 
		if($stmt -> execute()) {
			echo "<script language = 'javascript'>
			alert('Berhasil Update Data');
			window.location = 'tampil.php';
			</script>
			";
		} else {
			echo "<script language = 'javascript'>
			alert('Gagal Update Data');
			window.location = 'tampil.php';
			</script>
			";
		}
	}

	catch(PDOException $exception) {
		echo "Error :" .$exception -> getMessage();
	}
}

	try {

		//Membuat query untuk menampilkan data
		$query = "SELECT * FROM biodata WHERE id = :id LIMIT 0,1";

		//mempersiapkan query untuk dieksekusi
		$stmt = $koneksi -> prepare($query);

		//mengikat parameter 
		$stmt -> bindParam(':id', $_REQUEST['id']);

		//mengeksekusi query
		$stmt -> execute();

		//mengambil baris
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		//nilai untuk mengisi form
		$id = $row['id'];
		$nama = $row['nama'];
		$kelas = $row['kelas'];
		$alamat = $row['alamat'];
		$agama = $row['agama'];
		$hobi = $row['hobi'];
	}
	catch(PDOException $exception) {
		echo "Error :" .$exception -> getMessage();
	}

?>
<!--- Form Input -->
<form action="#" method="post" />
	<table>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="<?php echo $nama; ?>" /></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td><input type="text" name="kelas" value="<?php echo $kelas; ?>" /></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="text" name="alamat" value="<?php echo $alamat; ?>" /></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td><input type="text" name="agama" value="<?php echo $agama; ?>" /></td>
		</tr>
		<tr>
			<td>Hobi</td>
			<td><input type="text" name="hobi" value="<?php echo $hobi; ?>" /></td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="id"  value="<?php echo $id ?> /">
				<input type="hidden" name="action" value="edit" />
				<input type="submit" value="Update" />
				<input type="reset" value="Reset" />
			</td>
		</tr>
		
	</table>
</form>


</body>
</html>