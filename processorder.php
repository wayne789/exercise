<?php
	//create short variable names
	$tireqty = $_POST['tireqty'];
	$oilqty = $_POST['oilqty'];
	$sparkqty = $_POST['sparkqty'];
	$address = $_POST['address'];
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	$find = $_POST['find'];
	$date = date('H:i, JS F Y');
?>
<html>
<head>
	<title>Wayne's Auto Parts - Order Results</title>
</head>
<body>
<h1>Wayne's Auto Parts</h1>
<h2>Order Results</h2>
<?php
	switch ($find) {
		case 'a':
			echo 'Welcome, regular customer!<br/>';
			break;
		case 'b':
		case 'c':
		case 'd':
			echo 'Welcome, new customer!<br/>';
			break;
		default:
			echo 'Welcome, customer!<br/>';
			break;
	}

	$totalqty = 0;
	$totalqty = $tireqty + $oilqty + $sparkqty;

	if($totalqty == 0){
		echo 'You didn\'t order anything on the previous page!<br />';
	} 
	else{
		echo 'Your order is as follows: <br/>';
		if($tireqty > 0){
			echo $tireqty.' tires<br/>';
		}
		if($oilqty > 0){
			echo $oilqty.' oilqty<br/>'; 
		}
		if($sparkqty > 0){
			echo $sparkqty.' sparkqty<br/>';
		}	
		
		define('TIREPRICE', 100);
		define('OILPRICE', 10);
		define('SPARKPRICE', 4);
		define('TAXRATE',0.10);		
		
		$totalamount = 0.00;

		echo '<br/>Items ordered:'.$totalqty.'<br/>';
		$totalamount = $tireqty*TIREPRICE + $oilqty*OILPRICE + $sparkqty*SPARKPRICE;
		echo 'Subtotal: $'.number_format($totalamount,2).'<br/>';
		$totalamount = $totalamount*(1 + TAXRATE);
		echo 'Total include tax: $'.number_format($totalamount,2).'<br/>';

		echo '<p>Address to ship to is '.$address.'</p>';
		
		echo '<p>order processed at '.$date.'</p>';

		$outputstring = $date."\t".$tireqty." tires\t".$oilqty." oil\t".$sparkqty." sparks plugs\t\$".$totalamount."\t".$address."\t\n";

		$document_path = $DOCUMENT_ROOT."/orders/orders.txt";

		$fp = fopen("$document_path","ab");

		flock($fp, LOCK_EX);

		if(!$fp){
			echo "<p><strong>Your order could not be processed at this time. Please try again later.</strong></p></body></html>";
			exit;
		}

		fwrite($fp, $outputstring, strlen($outputstring));
		flock($fp, LOCK_UN);
		fclose($fp);

		echo '<p>Order written.</p>';
	}
?>
</body>
</html>