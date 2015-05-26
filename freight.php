<html>
<body>
<table border="0" cellpadding="3">
	<tr>
		<td bgcolor="#cccccc" align="center">Distance</td>
		<td bgcolor="#cccccc" align="center">Cost</td>
	</tr>
	<?php
		$distance = 50;
		while ($distance <= 250) {
			echo '<tr>
					<td align="right">'.$distance.'</td>
					<td align="right">'.($distance/10).'</td>
				  </tr>';
			$distance += 50;
		}
	/*equal to
	<tr>
		<td align="right">50</td>
		<td align="right">5</td>
	</tr>
	<tr>
		<td align="right">100</td>
		<td align="right">10</td>
	</tr>
	<tr>
		<td align="right">150</td>
		<td align="right">15</td>
	</tr>
	<tr>
		<td align="right">200</td>
		<td align="right">20</td>
	</tr>
	<tr>
		<td align="right">250</td>
		<td align="right">25</td>
	</tr>*/
	?>
</table>
</body>
</html>