<?php
	$pictures = array('tire.jpg','oil.jpg','spark_plug.jpg',
						'door.jpg','steering_wheel.jpg',
						'thermostat.jpg','wiper_blade.jpg',
						'gasket.jpg','brake_pad.jpg');
	shuffle($pictures);
?>
<html>
<head>
	<title>Wayne's Auto Parts</title>
</head>
<body>
	<h1>Wayne's Auto Parts</h1>
	<div align="center">
		<table width="100%">
			<ty>
			<?php
				for ($i = 0; $i < 3; $i ++){
					echo "<td align=\"center\"><img src=\"front_page_pic/";
					echo $pictures[$i];
					echo "\"/></td>";
				}
			?>
			</ty>
		</table>
	</div>
</body>
</html>