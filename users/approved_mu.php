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
				$sql = "UPDATE merchant_portal_orders SET Status = 'APPROVED' WHERE id = '".$_GET['id']."' ";
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

		                  $date_format = date("m/d/Y", strtotime($date) );
		        		}

		        $sql3 = mysqli_query($con, "SELECT * FROM tracking_no");
		        while($row3 = mysqli_fetch_array($sql3) ){

		                $tracking_no = $row3['Tracking_no'];
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
		  <ShipperStBldg>'.$Merchant_address.'</ShipperStBldg>
		  <ShipperBrgy>'.$Merchant_address.'</ShipperBrgy>
		  <ShipperCityMuncipality>'.$Merchant_address.'</ShipperCityMuncipality>
		  <ShipperProvince>'.$Province[0].'</ShipperProvince>
		  <ShipperContactNumber>0285110742</ShipperContactNumber>
		  <ShipperSendSMS>0</ShipperSendSMS>
		  <ShipperMobileNumber>0285110742</ShipperMobileNumber>

		  <ProductLine>2</ProductLine>
		  <ServiceMode>8</ServiceMode>
		  <CODAmount>0</CODAmount>

		  <PreferredDate>'.$date_format.' 13:06:44</PreferredDate>

		  <Consignee>'.$Customer_Name.'</Consignee>
		  <ConsigneeStBldg>'.$Shipping_address.'</ConsigneeStBldg>
		  <ConsigneeBrgy>ANYWHERE</ConsigneeBrgy>
		  <ConsigneeCityMuncipality>'.$Shipping_address.'</ConsigneeCityMuncipality>
		  <ConsigneeProvince>'.$Shipping_address.'</ConsigneeProvince>
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

		  <AttachmentNameTwo>MODE</AttachmentNameTwo>
		  <ReferenceNoTwo>REGULAR</ReferenceNoTwo>

		  <AttachmentNameThree>NONE</AttachmentNameThree>
		  <ReferenceNoThree>NONE</ReferenceNoThree>

		  <AttachmentNameFour>STATUS</AttachmentNameFour>
		  <ReferenceNoFour>1</ReferenceNoFour>

		  <DestinationCode>NCR</DestinationCode>
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
   if ($entry['Code'] == '100') {
   		?>
		   <section id="Message_container">
		   		<div class="APPROVED_MEssage">
						<h1>Order IS ALREAdy approved</h1>
						<h3>Tracking Number of <?php echo $Customer_Name . ":". "<br>" . $entry['TrackingNo']; ?></h3>
					<div class="logout">
						<a href="dashboard_user.php">Back</a>
					</div>
				</div>
		   </section>
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

 ?>
 	

 <?php 


}

	//End of LBC//

if ($Shipping_Name == 'LALAMOVE') {
	echo "HEY";
}

}
				 
		// Close connection;
		mysqli_close($con);


	?>
	


</body>
</html>
	