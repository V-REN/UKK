<?php 
	include "header.php";
	session_start();
	$user = $_SESSION['username'] ;
	$datauser = "catatan/$user.txt";

	if (!file_exists($datauser)) {
		die('<script>alert("kamu belum punya data")</script>');
	}else{
		$file = fopen($datauser, "r");
	}
 ?>

 <html>
	<body>
		<table border="1" width="50%" align="center">
			<td>
				<p> urutkan berdasarkan 
				<select id="urut" onclick="urutkan(this)">
					<option value="0">tanggal</option>
					<option value="1">waktu</option>
					<option value="2">lokasi</option>
					<option value="3">suhu</option>
				</select>
				<input type="submit" value="urutkan" name="">
			</p>
			</td>
		</table>
		<br>
		<table border="1" height="40%" width="50%" align="center">
			<td>
				<table align="center" border="1" width="80%" id="myTable">
					<tr>
						<th>tanggal</th>
						<th>jam</th>
						<th>lokasi yang di tuju</th>
						<th>suhu tubuh</th>
					</tr>
					<?php 
					while (($row = fgets($file)) !=false) {
						$col = explode(',', $row);
						foreach($col as $data)
							echo "<td>". trim($data). "</td>";
					}
					 ?>
				</table>
			</td>
		</table>
		<script type="text/javascript" src="../JS/main.js"></script>
	</body>

</html>