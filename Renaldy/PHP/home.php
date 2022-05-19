<?php  
include "header.php";
session_start();
 ?>

<html>
	<body>
		<table border="1" height="40%" width="50%" align="center">
			<td>Selamat datang <?php echo $_SESSION['username'] ?> di peduli diri</td>
		</table>
	</body>

</html>