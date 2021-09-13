<?php 
//Database Connection
include('dbconnection.php');

if(isset($_POST['submit']))
  {
    $eid=$_GET['editid'];
    $name=$_POST['name'];
    $payment_amount=$_POST['payment_amount'];
    $total_payable_amount=$_POST['total_payable_amount'];

    //Query for data updation
     $query=mysqli_query($con, "update  tblusers set name='$name',payment_amount='$payment_amount', total_payable_amount='$total_payable_amount' where id='$eid'");
     
    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
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
                <?php
                    $eid=$_GET['editid'];
                    $ret=mysqli_query($con,"select * from tblusers where id='$eid'");
                    while ($row=mysqli_fetch_array($ret)) {
                ?>
                <h2>Update </h2>
                <p class="hint-text">Update your info.</p>
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="<?php  echo $row['name'];?>" required="true">  
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="payment_amount" value="<?php  echo $row['payment_amount'];?>" required="true">
                </div>
                 <div class="form-group">
                    <input type="text" class="form-control" name="gst" id="gst" value="<?php  echo $row['gst'];?>" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="withoutgst" id="withoutgst" value="<?php  echo $row['withoutgst'];?>" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="total_payable_amount" value="<?php  echo $row['total_payable_amount'];?>" required="true">
                </div>
                
                <?php } ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
                </div>
            </form>
        </div>

    </body>
</html>