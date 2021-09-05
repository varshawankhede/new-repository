<?php 
//Database Connection
include('dbconnection.php');

if(isset($_POST['submit']))
  {
    $eid = $_GET['editid'];

    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $life_expectancy = $_POST['life_expectancy'];


    
    if(isset($_FILES["image"]["name"]) && $_FILES["image"]["name"]!=''){
       
        $targetDir = "uploads/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
    }
    else
    {
        $select = mysqli_query($con,"select image from animal_details where id='$eid'");
        $fileName = mysqli_fetch_array($select);
        $fileName = $fileName['image'];
    }
    
    
    //Query for data updation
     $query=mysqli_query($con, "update  animal_details set name='$name',category='$category', image='$fileName', description='$description', life_expectancy='$life_expectancy' where id='$eid'");
     
    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='animals.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}

$category_array = array(
                            'herbivores'=>'herbivores',
                            'omnivores'=>'omnivores',
                            'carnivores'=>'carnivores'

                        );

$life_expectancy = array(

                        '0-1years'=>'0-1years',
                        '1-5years'=>'1-5years',
                        '5-10years'=>'5-10years',
                        '10+year'=>'10+year'

                    );

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Edit Animal Information</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #fff;
    background: #63738a;
    font-family: 'Roboto', sans-serif;
}
.form-control {
    height: 40px;
    box-shadow: none;
    color: #969fa4;
}
.form-control:focus {
    border-color: #5cb85c;
}
.form-control, .btn {        
    border-radius: 3px;
}
.signup-form {
    width: 450px;
    margin: 0 auto;
    padding: 30px 0;
    font-size: 15px;
}
.signup-form h2 {
    color: #636363;
    margin: 0 0 15px;
    position: relative;
    text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
    content: "";
    height: 2px;
    width: 30%;
    background: #d4d4d4;
    position: absolute;
    top: 50%;
    z-index: 2;
}   
.signup-form h2:before {
    left: 0;
}
.signup-form h2:after {
    right: 0;
}
.signup-form .hint-text {
    color: #999;
    margin-bottom: 30px;
    text-align: center;
}
.signup-form form {
    color: #999;
    border-radius: 3px;
    margin-bottom: 15px;
    background: #f2f3f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.signup-form .form-group {
    margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
    margin-top: 3px;
}
.signup-form .btn {        
    font-size: 16px;
    font-weight: bold;      
    min-width: 140px;
    outline: none !important;
}
.signup-form .row div:first-child {
    padding-right: 10px;
}
.signup-form .row div:last-child {
    padding-left: 10px;
}       
.signup-form a {
    color: #fff;
    text-decoration: underline;
}
.signup-form a:hover {
    text-decoration: none;
}
.signup-form form a {
    color: #5cb85c;
    text-decoration: none;
}   
.signup-form form a:hover {
    text-decoration: underline;
}  
</style>
</head>
    <body>
        <div class="signup-form">
            <form  method="POST" enctype="multipart/form-data">
                <?php
                    $eid=$_GET['editid'];
                    $ret=mysqli_query($con,"select * from animal_details where id='$eid'");
                    while ($row=mysqli_fetch_array($ret)) {
                ?>
                <h2>Update </h2>
                <p class="hint-text">Edit Animals information.</p>
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Enter Animal Name" required="true" value="<?php echo $row['name'];?>">
                </div>
                <div class="form-group">
                    <select type="text" class="form-control" name="category" required="true">
                        <option>---- Select Category ----</option>
                        <?php foreach ($category_array as $key => $value) {?>
                            <option value="<?php echo $key?>"<?php echo $key == $row['category'] ? 'selected':'';?>><?php echo $value ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="col">
                            <img src="http://localhost/animal/uploads/<?php echo $row['image']?>"  alt="image" style="height:50px;width:50px">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="description" placeholder="Enter your description" required="true"><?php echo $row['description'];?></textarea> 
                </div>
                <div class="form-group">
                    <select class="form-control" name="life_expectancy" required="true">
                        <option>-- Select Life Expectancy --</option>
                        <?php foreach($life_expectancy as $key =>$value){?>
                            <option value="<?php echo $key ?>"<?php echo $key == $row['life_expectancy'] ? 'selected':'';?>><?php echo $value ?></option>
                        <?php }?>
                    </select>
                 </div>
                <?php } ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
                </div>
            </form>
            <div class="text-center">View Aready Inserted Data!!<a href="animals.php">View</a></div>
        </div>
    </body>
</html>