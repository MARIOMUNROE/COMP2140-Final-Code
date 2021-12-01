<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "projects");


if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["cart"][$keys]);
				echo '<script>alert("Succesfully Removed Item from Cart")</script>';
				echo '<script>window.location="carts.php"</script>';
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Baby and Mommy | Online Shopping</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
			<div style="clear:both"></div>
			<br />
			<h3>Order Invoice</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Name of Item</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["cart"]))
					{
						$total = 0;
						foreach($_SESSION["cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="carts.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-     danger">Remove Item</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Final Price</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>


			<div class="panel-body">

<!-------Post Method used as confidential information will be stored in DB!-->
<form action="orders.php" method="post">
  <div class="form-group">
	<label for="firstName">First Name</label>
	<input
	  type="text"
	  class="form-control"
	  id="firstName"
	  name="firstName"
	/>
  </div>
  <div class="form-group">
	<label for="lastName">Last Name</label>
	<input
	  type="text"
	  class="form-control"
	  id="lastName"
	  name="lastName"
	/>
  </div>
  <!----Section to Order From Individuals-->


  <div class="form-group">
	<label for="orderdesc">Order Description</label>
	<textarea id= "orderdesc" class="form-control" type="text" name="orderdesc" placeholder="Write order here.." style="height:200px"></textarea>
  </div>

  <!---Button that sends data to the DB-->
  <input type="submit" class="btn btn-primary" />
</form>
</div>

			</body>
</html>