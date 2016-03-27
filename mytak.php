<!DOCTYPE html >
<!--
Nilai kudu A, mun teu by 1 mid pudge ty !!!!
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="page" class="container">
	<div id="header">
		<div id="logo">
			<img src="images/templar1.jpg" alt="" />
			<h1><a href="#">Your Name</a></h1>
			<span>NIM <a href="https://www.facebook.com/chiellmy.skyline" rel="nofollow">6706144066</a></span>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.php" accesskey="1" title="">Home</a></li>
				<li><a href="hunting.php" accesskey="2" title="">Hunting</a></li>
				<li class="current_page_item"><a href="mytak.php" accesskey="3" title="">My TAK</a></li>
				<li><a href="event.php" accesskey="4" title="">Event</a></li>
				<li><a href="contactus.php" accesskey="5" title="">Contact Us</a></li>
				<li><a href="coba1.php" accesskey="6" title="">Logout</a></li>
			</ul>
		</div>
	</div>
	<div id="main">
		<div id="banner">
			<h1>TAK List</a>
		</div>
		<div id="welcome">
			<div class="title">
				<span class="byline"></span>
			</div>
			<p> <strong> </strong> </p>
			<p> </p><ul class="actions">
				<li><a href="index1.php" class="button">Home</a></li>
			</ul>
		</div>
		<div id="featured">
			<div class="title">
				<span class="byline"> </span>
			</div>
			<ul class="style1">
				<div style="position:relative;z-index:2;">
				<div id="leaderboard_status" style="height:60px">Last Updated: 2/16/2016, 5:00:00 AM<br>Next Update: 2/17/2016, 5:00:00 AM</div>
				<table style="position:relative;z-index:2;margin:0 auto;" border="2" bordercolor="#3b3a38" cellspacing="0" cellpadding="2">
					<thead>
					<tr>
						<th align="center">
							&nbsp;&nbsp;Nomor&nbsp;&nbsp;<br>						</th>
						<th valign="middle" width="400" align="left">
							&nbsp;&nbsp;Event Name						</th>
						<th valign="middle">
							&nbsp;&nbsp;TAK&nbsp;&nbsp;
						</th>
					</tr>
					</thead>
					<tbody id="leaderboard_body">
					<?php
					include "config/koneksi.php";
					?>
					<?php
					include "config/koneksi.php";
					
					$query=$con->query("select * from listtak");
					$no=1;
					while($row = $query->fetch_assoc()){
						
						echo "<tr><td>".$no."</td><td>".$row['Nama']."</td><td>".$row['TAK']."</td></tr>";			
						$no++;
					}
					
					?>
			</div>
			</ul>
		</div>
		<div id="copyright">
			<span>TAK Hunter&copy; 2016. I-gracias&copy;2013.<a href="http://is.telkomuniversity.ac.id/">Direktorat Sistem Informasi</a></span>
			<span><a href="http://www.telkomuniversity.ac.id/" rel="nofollow">Telkom University</a>.</span>
		</div>
	</div>
</div>
</body>
</html>
