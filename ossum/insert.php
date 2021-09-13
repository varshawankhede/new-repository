<?php 
//Databse Connection file
include('dbconnection.php');

if(isset($_POST['submit']))
  {
  	//getting the post values
    $name=$_POST['name'];
    $payment_amount=$_POST['payment_amount'];
    $total_payable_amount=$_POST['total_payable_amount'];
    $gst=$_POST['gst'];
    $withoutgst=$_POST['withoutgst'];
   
   
  // Query for data insertion
    $query=mysqli_query($con, "insert into tblusers(name,payment_amount, total_payable_amount, gst ,withoutgst) value('$name','$payment_amount', '$total_payable_amount','$gst','$withoutgst')");

    if ($query) {
    echo "<script>alert('You have successfully inserted the data');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" type="text/css"href="style.css">
<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
<div class="signup-form">
    <form  method="POST">
			<h2>Fill Data</h2>
			<p class="hint-text">Fill below form.</p>
			 Name:
      <div class="form-group">
				<input type="text" class="form-control" name="name" placeholder="Enter Full Name" required="true" >
      </div>
       Payment Amount:
      <div class="form-group">
        <input type="text" class="form-control" name="payment_amount" id="payment_amount" placeholder="Enter your Payment Amount" required="true">
      </div>
      18% of GST:
      <div class="form-group">
	      <input type="text"  class="form-control" name="gst" id="gst" placeholder=" 18% of GST">
	    </div>
	    Without GST:
	    <div class="form-group">
      	<input type="text" class="form-control" name="withoutgst" id="withoutgst" value="" placeholder=" Payment amount without GST">
      </div>
      Total Payable Amount:
      <div class="form-group">
        <input type="test" class="form-control" name="total_payable_amount" id="total_payable_amount" placeholder="Enter your total payable Amount"  required="true">
      </div>
			<div class="form-group">
          <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
      </div>
    </form>
	<div class="text-center">View Aready Inserted Data!!<a href="index.php">View</a></div>
</div>
<script>
   $(document).ready(function() {

            $('#payment_amount').keyup(function(ev) {
                var total = $('#payment_amount').val() * 1;
                var tot_price = total + (total * 0.18);
                var divobj = document.getElementById('total_payable_amount');
                var divobjone = document.getElementById('gst');
                var divobjtwo = document.getElementById('withoutgst');
                divobj.value = tot_price;
                divobjone.value = tot_price;
                divobjtwo.value = total;
            });
        });

    </script>
</body>
</html>