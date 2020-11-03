 <!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->
 <?php

include("db.php");
include("header.php");
      if(isset($_POST['signin']))
      {
        $fullname = $_POST['firstname']." ".$_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $birth_date=$_POST['birth_date'];
        $contact=$_POST['contact'];
        $gender=$_POST['gender'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $pincode = $_POST['pincode'];
        
       
     
           $qu = "insert into tbl_user(`user_name`,`user_email`,`user_password`,`user_birthdate`,`user_contactno`,`user_gender`,`user_address`,`user_city`,`user_state`,`user_pincode`,`user_country`)values('$fullname','$email','$password','$birth_date','$contact','$gender','$address','$city','$state','$pincode','$country')";
           $qu1=mysqli_query($con,$qu);
           
            if($qu1)
            {
               echo "Registered Successfully ...";
            }
            else
            {
              echo "Something Wrong!!";
            }        
        }
        //header('location:login.php');

        
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	  <meta charset="utf-8">
</head>
<body>
   
<div class="container"  style="border:5px groove;">
<h1 style="padding-top: 10px;text-align: center;font-weight: bold;color:white;background-color: brown;">Insert Your Detail</h1>
<hr style="border-color: black;height: 5px;">
    <div style="color:#000;">    
  	         
  	     	<form method="post" id="myform">

  	         <div class="form-row">
            <div class="form-group col-md-6">
            <label for="fn">First Name</label>
                <input type="text" class="form-control" id="fn" placeholder="Enter first name" name="firstname">
            </div>
            <div class="form-group col-md-6">
            <label for="ln">Last Name</label>
                <input type="text" class="form-control" id="ln" placeholder="Enter Last Name" name="lastname">
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
            <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group col-md-6">
            <label for="pwd">Password</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="password">
            </div>
            </div>
              <div class="form-group col-md-12">
            <label for="bd">Birth Date</label>
                <input type="date" class="form-control" id="bd"  name="birth_date">
            </div>
            <div class="form-group col-md-12">
            <label for="ct">Contact Number</label>
                <input type="text" class="form-control" id="ct"  name="contact" placeholder="Enter Contact Number">
            </div>
             <div class="form-group col-md-12">
                <label>Select Gender:</label><br/>
                <label><input type="radio"  id="ct" value="male" name="gender" checked>&nbsp;&nbsp;Male</label><br/>
                <label><input type="radio" id="ct"  value="female" name="gender">&nbsp;&nbsp;Female</label>
            </div>
            <div class="form-group col-md-12">
            <label for="em">Address</label>
                <input type="text" class="form-control" id="em"  name="address" placeholder="Enter Address">
            </div>
             <div class="form-row">
            <div class="form-group col-md-3">
            <label for="cty">City</label>
                <input type="text" class="form-control" id="cty" placeholder="Enter City" name="city">
            </div>
            <div class="form-group col-md-3">
                <?php
                    $state=array('Gujarat','Maharashtra','Panjab','Rajasthan','Madhypradesh','Tamilnadu');
                ?>
                <label for="inputState">State</label>
                <select id="inputState" class="form-control" name="state">
                    <option disabled="disabled" selected>--Select State--</option>
                    <?php 
                        foreach($state as $s) { ?>
                        <option><?php echo $s; ?></option>
                    <?php } ?>
                </select>
            </div>
             <div class="form-group col-md-3">
             	<?php
             	    $country=array('India','Canada','Australia','USA','England');
             	?>
            <label for="inputcountry">Country</label>
               <select id="inputcountry" class="form-control" name="country">
                    <option disabled="disabled" selected>--Select Country--</option>
                    <?php 
                        foreach($country as $c) { ?>
                        <option><?php echo $c; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-3">
            <label for="pin">Pincode</label>
                <input type="text" class="form-control" id="pin" placeholder="Enter Pincodede" name="pincode">
            </div>
            </div>
            <center><button type="submit" class="btn btn-success" name="signin">Sign in</button></center>
        </form>
        
    </div>
         
  
</div>
<script>

 
$( "#myform" ).validate({
  rules: {
  
               firstname: {
               required: true,
               minlength:3
            },
            lastname: {
               required: true,
               minlength:3
            },
                email: {
                required: true,
                email: true
            },
            contact:{
              required:true,
              number:true,
              minlength:10,
              maxlength:10
            },
            
            password: {
            required: true,
            minlength: 5
           }

  },
  messages:{
               firstname:{
               required:"<div style='color:red'>firstname should not blank</div>",
               minlength:  "<div style='color:red'>name must be more than 2 charatacters</div>"
             },
                lastname:{
               required:"<div style='color:red'>lastname should not blank</div>",
               minlength:  "<div style='color:red'>name must be more than 2 charatacters</div>"
             },

                email: {
                required:"<div style='color:red'>email not blank</div>",
                email:"<div style='color:red'>email not valid</div>"
            },
           
            contact:
            {
              required:"<div style='color:red'>phone number should not blank</div>",
              number:"<div style='color:red'>must be number</div>",
              minlength: "<div style='color:red'>This field must contain 10 digit... </div>",
               maxlength: "<div style='color:red'>This field must contain 10 digit...</div>"
            },
            password : {
                required : "<div style='color:red'>password not blank</div>",
              minlength : "<div style='color:red'> 5 or more required</div>"
            }
        
  }
});




</script>
</body>
</html>

<?php
      include("footer.php");
   ?>