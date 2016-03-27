<?php

//menginclude database
include 'koneksi.php';

try {

	//delete query
	$query = "DELETE FROM biodata WHERE id = :id";

	//mempersiapkan query yang akan dieksekusi
	$stmt = $koneksi->prepare($query);

	//mengikat parameter
	$stmt -> bindParam(':id', $_GET['id']);

	//Mengeksekusi pernyataan query
	if($result = $stmt->execute()) {
		header('location: tampil.php?action=hapus');
	} else {
		echo "<script language = 'javascript'>
		alert('Gagal Hapus Data');
		window.location = 'tampil.php';
		</script>
		";
	}
}

catch(PDOException $exception) {
	echo "Error :" .$exceptio->getMessage();
}


?>