<?php
include "config/config.php";
$nim    	=$_POST['NIM'];
$password =$_POST['password'];
//yang di session id ya
$sql = "SELECT id FROM member where nim='$nim' and password='$password' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      session_start();
      $_SESSION['id']=$row['id'];
      header("location:index.php");
    }
}else{
  echo "gagal login cek lagi";
}

$conn->close();


?>
