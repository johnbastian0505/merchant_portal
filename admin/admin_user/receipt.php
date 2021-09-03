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
		                  $total_receipt_price = $Shipping_Fee + 7;

		                  ?>
		                  <!DOCTYPE html>
		                  <html>
		                  <head>
		                  	<meta charset="utf-8">
		                  	<title>PO Download</title>
		                  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
							<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
							<link rel="stylesheet" type="text/css" href="style_receipt.css">


		                  </head>

		                  <body>
		                  	<div class="buttons_PO">
		                  		<button onclick="window.print();">PRINT</button>
		                  		<a href="admin.php">BACK</a>
		                  	</div>
		                  	
		                  	<section id="to_print" class="PO_Section">
		                  		<div class="container">
		                  			<div class="row">
		                  				<div class="col-lg-12">
		                  					<div class="Print_section">
		                  						<div class="PO_Image">
		                  							<img src="cropped-divionl-logo.png">
		                  						</div>
		                  					</div>
		                  					<div class="divi_address">
		                  						<p>Unit 505 5F P&S Building 717 Aurora Blvd., Brgy. Mariana Quezon City, Metro Manila, 1112</p>
		                  					</div>
		                  					<div class="PO_Order_Shipping_Address">
		                  						<p><b>VENDOR:</b> <span><?php echo $Merchant_Name; ?></span></p>
		                  						<p><b>Shipper Address:</b> <span><?php echo $Merchant_address ?></span></p>
		                  					</div>
		                  				</div>
		                  				
		                  			</div>
		                  			<div class="row">
		                  				<div class="col-lg-6">
		                  						<div class="table_PO">
				                  					<div class="table_orders">
														<table class="table table-striped table_shipp">
																<tr>
																	<th>Shipping Method</th>
																	<th>Shipping Terms</th>
																	<th>Shipping Fee</th>
																</tr>
																<tr>
																	<td>LAND</td>
																	<td><?php echo $Shipping_Name; ?></td>
																	<td><?php echo $Shipping_Fee;	 ?></td>
																</tr>
														</table>
														<table class="table table-striped table_info">
																<tr>
																	<th>Quantity</th>
																	<th>Order#</th>
																	<th>Product Name</th>
																	<th>Unit Price</th>
																	<th>Total Price</th>
																</tr>
																<tr>
																	<td><?php echo $Quantity; ?></td>
																	<td><?php echo  $order_number; ?></td>
																	<td><?php echo $Product_order; ?></td>
																	<td><?php echo $Product_Price; ?></td>
																	<td><?php echo $Product_Price + $Shipping_Fee; ?></td>
																</tr>

														</table>
														<table class="table-striped footer_table">
															<tr>
																<td class="total_price">TOTAL PRICE:</td>
																<td><?php echo $Product_Price + $Shipping_Fee; ?></td>
															</tr>
														</table>
												</div>
				                  			</div>
		                  				</div>
		                  				<div class="col-lg-6">
		                  					<div class="Print_section">
		                  						<div class="PO_HEADER">
		                  							<h2>PURCHASE ORDER</h2>
		                  						</div>
		                  						<div class="divi_address">
			                  						<p>Date: <span><?php echo $date_format; ?></span></p>
			                  						<p>Customer ID: <span><?php echo $Customer_ID; ?></span></p>
		                  						</div>
		                  						<div class="PO_Order_Shipping_Address add_ress">
			                  						<p><b>Customer:</b> <span><?php echo $Customer_Name; ?></span></p>
			                  						<p><b>Shipping Address:</b> <span><?php echo $Shipping_address ?></span></p>
		                  						</div>
		                  					</div>
		                  				</div>
		                  				
		                  			</div>
		                  			
		                  		</div>

		                  	</section>

		                  </body>
		                  </html>

		                  <?php


	}



?>