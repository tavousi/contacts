<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<title>دفتر تلفن</title>
	<link rel="stylesheet" href="style1.css">
</head>

<body>
	<?php
	require_once( 'config.php' );

	$sql = "SELECT fname, lname, phone FROM data";
	mysqli_query( $conn, 'set names "utf8"' );
	$result = mysqli_query( $conn, $sql );
	?>

	<table align="center" style="width:50%" border="1">
		<tr>
			<th>نام</th>
			<th>نام خانوادگی</th>
			<th>شماره تلفن</th>
			<th>حذف</th>
		</tr>
		<?php
		if ( mysqli_num_rows( $result ) > 0 ) {
			// output data of each row
			while ( $row = mysqli_fetch_assoc( $result ) ) {
				echo "<tr>";
				echo "<td align='center'>" . $row[ "fname" ] . "</td>";
				echo "<td align='center'>" . $row[ "lname" ] . "</td>";
				echo "<td align='center'>" . $row[ "phone" ] . "</td>";
				echo "<td class='rem' align='center'><button>حذف</button></td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		mysqli_close( $conn );
		?>

		<form action="delete.php" method="POST" id="my_form">
			<input type='hidden' name='phone' form='my_form' value="<?php $row[ " phone " ] ?>"/>
			<p align="center"><input type="submit" value="ثبت تغییرات"/></p>
		</form>

		<p align="center"><input type="button" value="بازگشت" onclick="window.location.href='index.php'"/>
		</p>


		<script>
			$( ".rem" ).on( "click", function () {
				$( this ).parent().remove();
			} );
		</script>
</body>
</html>