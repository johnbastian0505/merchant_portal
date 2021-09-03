<?php
	session_start();
	require_once('../conn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN DIVIONL PORTAL</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<?php
	$sql = mysqli_query($con, "SELECT * FROM merchant_accounts WHERE password = '".$_SESSION['password']."' ");


	while($row = mysqli_fetch_array($sql) ){
		$username = $row['username'];
		$password = $row['password'];
		$Merchant_Name = $row['Merchant_Name'];
		$Merchant_Slug = $row['Merchant_slug'];
	}

	$sql2  = mysqli_query($con, "SELECT * FROM merchant_portal_orders ORDER BY id DESC ");
?>

<section id="section_orders">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 Merchant_Name">
				<h1>Welcome to Admin Portal</h1>
			</div>
			<div class="col-lg-6 logout">
				<?php
				if(isset($_SESSION['password']))
			    {
			        echo '<a href="../logout.php?logout">Logout</a>';
			    }
			    else
			    {
			        header("location:index.php");
			    } 
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 Approved_orders">
				<h1>ALL ORDERS</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="table_orders">
					<table class="table table-striped">
						<thead>
							<tr>
								<!---<th scope="col">Customer_ID</th>--->
								<th scope="col">Customer_Name</th>
								<th scope="col">Product_order</th>
								<th scope="col">Quantity</th>

								<th scope="col">Shipping Provider</th>
								<th scope="col">Customer Phone</th>
								<th scope="col">Customer Email</th>

								<th scope="col">Shipping_Fee</th>
								<th scope="col">Product_Price</th>
								<!---<th scope="col">Merchant_Name</th>--->
								<!---<th scope="col">Merchant_Merchant_slug</th>--->

								<th scope="col">Customer address</th>
								<!---<th scope="col">Shipping_address_lat</th>--->
								<!---<th scope="col">Shipping_address_lng</th>--->
								<th scope="col">Merchant_address</th>
								<!---<th scope="col">Merchant_address_lat</th>--->
								<!---<th scope="col">Merchant_address_lng</th>--->
								<th scope="col">Status</th>

								<th scope="col">DATE</th>
								<th scope="col">Tracking NO.</th>
								<th scope="col">Action</th>
					<?php	
					
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
						$order_tracking_no = $row['tracking_no'];
						
						?>
							<tr>
							<!---<td><?php echo $Customer_ID; ?></td>---->
							<td><?php echo $Customer_Name; ?></td>
							<td><?php echo $Product_order; ?></td>
							<td><?php echo $Quantity; ?></td>
							<td><?php echo $Shipping_Name; ?></td>

							<td><?php echo $Shipping_Phone; ?></td>
							<td><?php echo $Shipping_Email; ?></td>
							
							<td><?php echo $Shipping_Fee; ?></td>
							<td><?php echo $Product_Price; ?></td> 

							<!---<td><?php echo $Merchant_Name; ?></td>--->
							<!---<td><?php echo $Merchant_Merchant_slug; ?></td>--->

							<td><?php echo $Shipping_address; ?></td>
							<!---<td><?php echo $Shipping_address_lat; ?></td>--->
							<!---<td><?php echo $Shipping_address_lng; ?></td>--->
							<td><?php echo $Merchant_address; ?></td>
							<!---<td><?php echo $Merchant_address_lat; ?></td>--->
							<!---<td><?php echo $Merchant_address_lng; ?></td>--->
							
							<td><?php echo $Status; ?></td>
							<td><?php echo $date; ?></td>
							<td><?php echo $order_tracking_no; ?></td>
							<td>
								<button type="button" class="btn btn-success">
									<a href="receipt.php?id=<?php echo $row['id'] ?>" class="btn_action">VIEW RECEIPT</a>
								</button>
							</td>
						</tr>
						<?php 
						
					}

					?>

							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>


</body>
</html>
