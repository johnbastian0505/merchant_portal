<?php
	session_start();
	require_once('../conn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
				 
				// Check connection
				if($con === false){
				    die("ERROR: Could not connect. " . mysqli_connect_error());
				}
				 
				// Attempt insert query execution
				$sql = "UPDATE merchant_portal_orders SET Status = 'PENDING' WHERE id = '".$_GET['id']."' ";
				if(mysqli_query($con, $sql)){

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

		                  $Province = explode(" ", $Merchant_address);

		                  $date_format = date("m/d/Y", strtotime($date) );
				   	}
		/////////////////////// LBC Start ///////////////////////////////

	if ($Shipping_Name == 'LBC') {

						$sql3  = mysqli_query($con, "SELECT * FROM merchant_portal_orders WHERE id = '".$_GET['id']."' ");
		                while($row = mysqli_fetch_array($sql3) ){
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
		                  $order_tracking_no = $row['tracking_no'];

		                  $Province = explode(" ", $Merchant_address);
		                  $shipper_address_explode = explode(" ", $Shipping_address); 

		                  $date_format = date("m/d/Y", strtotime($date) );


		        		}

		        $sql3 = mysqli_query($con, "SELECT * FROM tracking_no");
		        while($row3 = mysqli_fetch_array($sql3) ){
		                $tracking_no = 1000000000000;
		                $tracking_no_series = $tracking_no + 1;
		        }


		        		  //The XML string that you want to send.
		  $xml = '<?xml version="1.0" encoding="utf-8"?>
		<PickupRequestEntity xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
		  <ShipmentMode>1</ShipmentMode>
		  <Origin>SLA</Origin>
		  <TrackingNo>'.$tracking_no_series.'</TrackingNo>

		  <TransactionDate>06/16/2021 22:06:36</TransactionDate>
		  <ShipperAccountNo>2015062300003</ShipperAccountNo>

		  <Shipper>'.$Merchant_Name.'</Shipper>
		  <ShipperStBldg>'.$Province[2].'</ShipperStBldg>
		  <ShipperBrgy>'.$Province[2].'</ShipperBrgy>
		  <ShipperCityMuncipality>'.$Province[1].'</ShipperCityMuncipality>
		  <ShipperProvince>'.$Province[0].'</ShipperProvince>
		  <ShipperContactNumber>0285110742</ShipperContactNumber>
		  <ShipperSendSMS>0</ShipperSendSMS>
		  <ShipperMobileNumber>0285110742</ShipperMobileNumber>

		  <ProductLine>2</ProductLine>
		  <ServiceMode>8</ServiceMode>
		  <CODAmount>0</CODAmount>

		  <PreferredDate>09/11/2021 16:51:34</PreferredDate>

		  <Consignee>'.$Customer_Name.'</Consignee>
		  <ConsigneeStBldg>'.$shipper_address_explode[2].'</ConsigneeStBldg>
		  <ConsigneeBrgy>'.$shipper_address_explode[3].'</ConsigneeBrgy>
		  <ConsigneeCityMuncipality>'.$shipper_address_explode[1].'</ConsigneeCityMuncipality>
		  <ConsigneeProvince>'.$shipper_address_explode[0].'</ConsigneeProvince>
		  <ConsigneeContactNumber>'.$Shipping_Phone.'</ConsigneeContactNumber>
		  <ConsigneeSendSMS>1</ConsigneeSendSMS>
		  <ConsigneeMobileNumber>'.$Shipping_Phone.'</ConsigneeMobileNumber>

		  <Quantity>'.$Quantity.'</Quantity>
		  <PKG>16</PKG>
		  <ACTWTkgs>0</ACTWTkgs>
		  <LengthCM>0</LengthCM>
		  <WidthCM>0</WidthCM>
		  <HeightCM>0</HeightCM>
		  <DeclaredValue>'.$Shipping_Fee.'</DeclaredValue>

		  <AttachmentNameOne>ORDERNUMBER</AttachmentNameOne>
		  <ReferenceNoOne>7619072</ReferenceNoOne>

		  <AttachmentNameTwo>NONE</AttachmentNameTwo>
		  <ReferenceNoTwo>REGULAR</ReferenceNoTwo>

		  <AttachmentNameThree>NONE</AttachmentNameThree>
		  <ReferenceNoThree>NONE</ReferenceNoThree>

		  <AttachmentNameFour>STATUS</AttachmentNameFour>
		  <ReferenceNoFour>1</ReferenceNoFour>

		  <DestinationCode>METRO-MANILA</DestinationCode>
		  <Client>DIVI.ONL</Client>
		</PickupRequestEntity>';

		//The URL that you want to send your XML to.
		$url = 'https://lbcapigateway.lbcapps.com/lbcpickuprequest/v1/api/DirectInjection/InsertPickupRequest';

		//Initiate cURL
		$curl = curl_init($url);

		//Set the Content-Type to text/xml.
		$headers = array(
		    'Content-type: application/xml',
		    'Content-type: application/xml',
		    'Ocp-Apim-Subscription-Key:5266f94907dd4951ad4439161ddfa375',
		);

		curl_setopt ($curl, CURLOPT_HTTPHEADER, $headers);

		//Set CURLOPT_POST to true to send a POST request.
		curl_setopt($curl, CURLOPT_POST, true);

		//Attach the XML string to the body of our request.
		curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);

		//Tell cURL that we want the response to be returned as
		//a string instead of being dumped to the output.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		//Execute the POST request and send our XML.
		$result = curl_exec($curl);

		$message = json_decode($result, true);

		//Do some basic error checking.
		if(curl_errno($curl)){
		    throw new Exception(curl_error($curl));
		}
		//Close the cURL handle.
		curl_close($curl);

		//Print out the response output.

		$tracking_result = $message['MessageList'];

		foreach ($tracking_result as $entry) {
			if ($entry['Code'] == '106') {
				echo $entry['Message'];
			}
		   if ($entry['Code'] == '100') {

		   	 $sql_account = mysqli_query($con, "SELECT * FROM merchant_accounts WHERE Merchant_slug = '".$Merchant_Merchant_slug."' ");
		        while($row_account = mysqli_fetch_array($sql_account) ){
							$username =  $row_account['username'];
							$password =  $row_account['password'];
							$Merchant_Name =  $row_account['Merchant_Name'];
							$Merchant_slug =  $row_account['Merchant_slug'];
							$Merchant_Status =  $row_account['Merchant_Status'];

							$product =  $row_account['products'];
							$product_type =  $row_account['product_type'];
							$product_type_code =  $row_account['product_type_code'];
							$product_metric_unit =  $row_account['product_metric_unit'];
							$product_dimension =  $row_account['product_dimension'];
		        }

		   		?>

				   <!DOCTYPE html>
		                  <html>
		                  <head>
		                  	<meta charset="utf-8">
		                  	<title>PO Download</title>
		                  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
							<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

									<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
		<script type="text/javascript" src="customBarcodeGenerate.js"></script>

		                  </head>

		                  <body>
		                  	<div class="buttons_PO">
		                  		<button onclick="window.print()" >Print this page</button>
		                  		<a href="dashboard_user.php">BACK</a>
		                  	</div>
		                  	
		                  	<section id="Way_Bill_LBC">
		                  		<div class="container">
		                  			<div class="row">
		                  				<div class="col-lg-6">
		                  					
		                  				</div>
		                  			</div>
		                  			<div class="row">
		                  				<div class="col-lg-6">
		<input type="text" name="barcodeValue" id="barcodeValue" class="form-control" value=<?php echo $tracking_no_series;?> >									
		<input type="button" id="generateBarcode" name="generateBarcode" class="btn btn-success form-control" value="Generate">
		<svg id="barcode"></svg>
		<h2 class="COD"><b>COD</b> ₱0</h2>
		                  				</div>
		                  				<div class="col-lg-6">
		                  					<div class="POD_required">
		                  						<h2>LBC EXPRESS INC.</h2>
		                  					</div>
		                  					<div class="POD_required">
		                  						<h2>ORDER DETAILS</h2>
		                  					</div>
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
		                  						<p><b>Item Description:</b> <?php echo $Product_order; ?><br><b>Product Price:</b> ₱<?php echo $Product_Price; ?></p>
		                  					</div>
		                  				</div>
		                  				<div class="col-lg-6">
		                  					<div class="consignee_container">
			                  					<div class="consignee_address">
			                  						<p><b>CARGO (BOX)</b></p>
			                  						<p><b>Transaction Date:</b> <?php echo $date_format; ?> </p>
			                  						<p><b>Origin:</b> METRO-MANILA</p>
			                  						<p><b>Destination:</b> <?php echo $Province[0]; ?></p>
			                  						<p><b>No of Items:</b> <?php echo $Quantity .$product_metric_unit; ?></p>
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
		                  			<div class="row">
		                  				<div class="col-lg-12">
		                  					
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
			
		   		if($con === false){
						    die("ERROR: Could not connect. " . mysqli_connect_error());
						}
						 
						// Attempt insert query execution
						$sqlinsert = "INSERT INTO tracking_no (Tracking_no) VALUES ('".$entry['TrackingNo']."')";
						if(mysqli_query($con, $sqlinsert)){
						   
						} else{
						    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
						}

						$sqlinsertorder = "UPDATE merchant_portal_orders SET tracking_no = '".$tracking_no_series."' WHERE id = '".$_GET['id']."' ";
						if(mysqli_query($con, $sqlinsertorder)){
						   
						} else{
						    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
						}

		   }
		      
		 }

	}

		//////////////////////// LBC ENDING///////////////////////////////

//////////////// Transportify Start /////////////////////////
	if($Shipping_Name == 'TRANSPORTIFY'){
		$url = 'https://api.deliveree.com/public_api/v1/deliveries/';
            $data = array(
                        'vehicle_type_id' => 34,
                        'note' => 'Product :' . $Quantity . $Product_order ,
                        'time_type' => 'now',
                         'locations' => array(
                                [
                                  'address' => $Merchant_address,
                                  'latitude' => $Merchant_address_lat,
                                  'longitude' => $Merchant_address_lng,
                                  'recipient_name' => $Merchant_Name,
                                   "recipient_phone"=> '09989926086',
                                  'note' => 'Product to pickup :' . '("'.$Quantity.'")' . $Product_order ,
                               ],
                               [
                                'address' => $Shipping_address,
                                'latitude' => $Shipping_address_lat,
                                'longitude' => $Shipping_address_lng,
                                'recipient_name' => $Customer_Name,
                                'recipient_phone'=> $Shipping_Phone,
                                'note' => 'Product to received :' . '("'.$Quantity.'")' . $Product_order ,
                               ]
                          )
                     );
            $options = array(
                'http' => array(
                'method' => 'POST',
                'header' => "Authorization:njJxAwiL_4KJE7iLkNtq\r\n".
                    "Content-Type: application/json\r\n" ,
                    "Accept-Language:en",
                    'content' => json_encode($data)
                )
            );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        if ($response === FALSE) { echo "Please Double check the fields"; }else{
          $json_array=json_decode($response,true); 
          $tracking_id = $json_array['id'];
          $tracking_url = $json_array['tracking_url'];
          $total_fee_tpy = $json_array['total_fees'];
        }

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
		                  	
		                  	<section id="to_print" class="PO_Section">
		                  		<div class="container">
		                  			<div class="row">
		                  				<div class="col-lg-12">
		                  					<div class="Print_section">
		                  						<div class="PO_Image">
		                  							<img src="../images/cropped-divionl-logo.png">
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
		                  				<div class="col-lg-12">
		                  					
		                  				</div>
		                  			</div>
		                  			<div class="row">
		                  				<div class="col-lg-12">
		                  						<div class="table_PO">
				                  					<div class="table_orders">
														<table class="table table-striped table_shipp">
																<tr>
																	<th>Shipping Method</th>
																	<th>Shipping Terms</th>
																	<th>Shipping ID</th>
																	<th>Tracking URL</th>
																	<th>Shipping Fee</th>
																	<th>Shipping Delivery Date</th>
																</tr>
															
															<tr>
																<td>LAND</td>
																<td><?php echo $Shipping_Name; ?></td>
																<td><?php echo $tracking_id; ?></td>
																<td><?php echo $tracking_url; ?></td>
																<td><?php echo $Shipping_Fee; ?></td>
																<td>__________________</td>
															</tr>
														</table>
														<table class="table table-striped table_info">
																<tr>
																	<th>Quantity</th>
																	<th>Product Name</th>
																	<th>Unit Price</th>
																	<th>Total Price</th>
																</tr>
																<tr>
																	<td><?php echo $Quantity; ?></td>
																	<td class="Product_neme"><?php echo $Product_order; ?></td>
																	<td><?php echo $Product_Price; ?></td>
																	<td><?php echo $Product_Price; ?></td>
																</tr>

														</table>
														<table class="table-striped footer_table">
															<tr>
																<td class="total_price">TOTAL PRICE:</td>
																<td><?php echo $Product_Price; ?></td>
															</tr>
														</table>
												</div>
				                  			</div>
		                  				</div>
		                  				<div class="col-lg-12">
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

        $sqlinsertorder = "UPDATE merchant_portal_orders SET tracking_no = '".$tracking_id."' WHERE id = '".$_GET['id']."' ";
				if(mysqli_query($con, $sqlinsertorder)){
						   
				} else{
					echo "ERROR: Could  notable to execute $sql. " . mysqli_error($link);
			}


	}


	////////// Transportify Ending ///////////////

	}
				 
		// Close connection;
		mysqli_close($con);


	?>
	


</body>
</html>
	