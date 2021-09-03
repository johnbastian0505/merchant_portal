<?php
	session_start();
	require_once('../conn.php');

	$sql2  = mysqli_query($con, "SELECT * FROM merchant_portal_orders WHERE id = '".$_GET['id']."' ");
	while($row = mysqli_fetch_array($sql2) ){

		$id = $row['id'];
		                  $Customer_ID =  $row['Customer_ID'];
		                  $Customer_Name =  $row['Customer_Name'];
		                  $Product_order =  $row['Product_order'];
		                  $Quantity =  $row['Quantity'];
		                  $Shipping_Name =  $row['Shipping_Name'];

		                  $Shipping_Phone =  $row['Shipper_Phone'];
		                  $Shipping_Email =  $row['Shipper_Email'];

		                  $Shipping_Fee =  $row['Shipping_Fee'];
		                  $Product_Price =  $row['Product_Price'];
		                  $Merchant_Name =  $row['Merchant_Name'];
		                  $Merchant_Merchant_slug =  $row['Merchant_Merchant_slug'];
		                  $Status =  $row['Status'];

		                  $Shipping_address =  $row['Shipping_address'];
		                  $Shipping_address_lat =  $row['Shipping_address_lat'];
		                  $Shipping_address_lng =  $row['Shipping_address_lng'];

		                  $Merchant_address =  $row['Merchant_address'];
		                  $Merchant_address_lat =  $row['Merchant_address_lat'];
		                  $Merchant_address_lng =  $row['Merchant_address_lng'];

		                  $date = $row['reg_date'];

		                  $order_number = $Customer_ID + 100;

		                  $Province = explode(" ", $Merchant_address);

		                  $date_format = date("m/d/Y", strtotime($date) );


		                  ?>
		                  <!DOCTYPE html>
		                  <html>
		                  <head>
		                  	<meta charset="utf-8">
		                  	<title>PO Download</title>
		                  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
							<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
							<link rel="stylesheet" type="text/css" href="style.css">


		                  </head>

		                  <body>
		                  	<div class="buttons_PO">
		                  		<button onclick="window.print();">PRINT</button>
		                  		<a href="dashboard_user.php">BACK</a>
		                  	</div>
		                  	
		                  	<section id="Way_Bill_LBC">
		                  		<div class="container">
		                  			<div class="row">
		                  				<div class="col-lg-6">
		                  					<div class="POD_required">
		                  						<h2>POD REQUIRED(DIVI.ONL)</h2>
		                  					</div>
		                  				</div>
		                  				<div class="col-lg-6">
		                  					<div class="POD_required">
		                  						<h2>POD REQUIRED(DIVI.ONL)</h2>
		                  					</div>
		                  				</div>
		                  			</div>
		                  			<div class="row">
		                  				<div class="col-lg-6">
		                  					<div class="POD_required">
		                  						<h2>LBC EXPRESS INC.</h2>
		                  					</div>
		                  				</div>
		                  				<div class="col-lg-6">
		                  					<div class="Tracking_type">
		                  						<h2>AIR</h2>
		                  					</div>
		                  				</div>
		                  			</div>
		                  			<div class="row">
		                  				<div class="col-lg-6">
		                  					<div class="consignee_container">
			                  					<div class="consignee">
			                  						<p><b>Consignee:</b> <?php echo $Customer_Name; ?> </p>
			                  					</div>
			                  					<div class="consignee_address">
			                  						<p><b>ADDRESS:</b></p>
			                  						<p class="bottom"><?php echo $Shipping_address; ?> </p>
			                  					</div>
		                  					</div>
		                  					<div class="shipper_container">
			                  					<div class="shipper">
			                  						<p><b>SHIPPER:</b> <?php echo $Merchant_Name; ?> </p>
			                  					</div>
			                  					<div class="shipper_address">
			                  						<p><b>ADDRESS:</b></p>
			                  						<p class="bottom"><?php echo $Merchant_address; ?> </p>
			                  					</div>
			                  					<div class="attachment">
			                  						<p><b>Attachment : 0</b></p>
			                  					</div>
		                  					</div>
		                  					<div class="item_desctiption">
		                  						<p><b>Item Description:</b> <?php echo $Product_order; ?><br><b>Product Price:</b> ₱<?php echo $Product_Price; ?>  <b>Shipping Fee:</b> ₱<?php echo $Shipping_Fee; ?> </p>
		                  					</div>
		                  				</div>
		                  				<div class="col-lg-6">
		                  					<div class="consignee_container">
			                  					<div class="consignee">
			                  						<p><b>Shipping Amount: ₱<?php echo $Shipping_Fee; ?></b></p>
			                  					</div>
			                  					<div class="consignee_address">
			                  						<p><b>FOOD (BOX)</b></p>
			                  						<p><b>Transaction Date:</b> <?php echo $date_format; ?> </p>
			                  						<p><b>Origin:</b>METRO-MANILA</p>
			                  						<p><b>Destination:</b> MIN</p>
			                  						<p><b>No of Items:</b> <?php echo $Quantity; ?></p>
			                  						<p><b>Vol. WT(Kgs):</b> 15</p>
			                  						<p><b>Declared Value:</b> ₱<?php echo $Product_Price; ?></p>
			                  					</div>
			                  					<div class="under">
			                  						<p><b>Instruction:</b> Note</p>
			                  						<p><b>Pay Mode:</b> Collect shipper</p>
			                  						<p><b>Service Mode:</b> DOOR TO DOOR</p>
			                  					</div>
		                  					</div>
		                  					
		                  				</div>
		                  			</div>
		                  			<div class="row signature_row">
		                  				<div class="col-lg-3">
		                  					<div class="signature">
		                  						<p>Receiver's Name & Signature</p>
		                  					</div>
		                  				</div>
		                  				<div class="col-lg-3">
		                  					<div class="signature">
		                  						<p>Relationship</p>
		                  					</div>
		                  				</div>
		                  				<div class="col-lg-3">
		                  					<div class="signature">
		                  						<p>Date:</p>
		                  					</div>
		                  				</div>
		                  				<div class="col-lg-3">
		                  					<div class="signature">
		                  						<p>Courier's Name & Signature</p>
		                  					</div>
		                  				</div>
		                  			</div>
		                  			<div class="row last_row">
		                  				<div class="col-lg-6">
		                  					<p><b>Printed by:</b> <?php echo $Merchant_Name; ?> </p>
		                  				</div>
		                  				<div class="col-lg-6 encode">
		                  					<p><b>Encode by:</b> DIVI.ONL</p>
		                  				</div>
		                  			</div>
		                  		</div>
		                  	</section>

		                  </body>
		                  </html>

		                  <?php


	}



?>