<?php
include("header.php");

      $user_id=$_SESSION['user_data']['user_id'];
      if(isset($_POST['update']))
      {
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $birth_date=$_POST['birth_date'];
        $contact=$_POST['contact'];
        $gender=$_POST['gender'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $pincode = $_POST['pincode'];
        
        echo $qu = "UPDATE tbl_user SET `user_name`='$fullname',`user_email`='$email',`user_birthdate`='$birth_date',`user_contactno`='$contact',`user_gender`='$gender',`user_address`='$address',`user_city`='$city',`user_state`='$state',`user_pincode`='$pincode',`user_country`='$country' WHERE `user_id`='$user_id'";
        $qu1=mysqli_query($con,$qu);
      
           
        if($qu1)
        {
           header('location:edit_profile.php'); 
        }
        else
        {
          echo "Something Wrong!!";
        } 
        $q = "select * from tbl_user where `user_id`='$user_id'";
        $q1 = mysqli_query($con,$q);
        $q2 = mysqli_fetch_array($q1);
        $_SESSION['user_data'] = $q2;
               
      }
        

        
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	  <meta charset="utf-8">
</head>
<body>
   
<div class="container"  style="border:5px groove;">
<h1 style="padding-top: 10px;text-align: center;font-weight: bold;color:white;background-color: brown;">Edit Your Profile <?php echo $_SESSION['user_data']['user_name']; ?></h1>
<hr style="border-color: black;height: 5px;">
    <div style="color:#000;">    
  	         
  	     	<form method="post" id="myform">
            <div class="form-group col-md-12">
            <label for="fn">First Name</label>
                <input type="text" class="form-control" id="fn" placeholder="Enter first name" name="name" value="<?php echo $_SESSION['user_data']['user_name']; ?>">
            </div>
            <div class="form-group col-md-12">
            <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"value="<?php echo $_SESSION['user_data']['user_email']; ?>">
            </div>
            
              <div class="form-group col-md-12">
            <label for="bd">Birth Date</label>
                <input type="date" class="form-control" id="bd"  name="birth_date" value="<?php echo $_SESSION['user_data']['user_birthdate']; ?>">
            </div>
            <div class="form-group col-md-12">
            <label for="ct">Contact Number</label>
                <input type="text" class="form-control" id="ct"  name="contact" placeholder="Enter Contact Number" value="<?php echo $_SESSION['user_data']['user_contactno']; ?>">
            </div>
             <div class="form-group col-md-12">
                <label>Select Gender:</label><br/>
                <label><input type="radio"  id="ct" value="male" name="gender"
                 <?php if($_SESSION['user_data']['user_gender'] == 'male')
                  {
                   echo "checked"; 
                  }
                  ?>>&nbsp;&nbsp;Male
               </label><br/>
                 <label><input type="radio" id="ct"  value="female" name="gender"
                 <?php if($_SESSION['user_data']['user_gender'] == 'female')  
                  { 
                    echo "checked"; 
                  }
                  ?>>&nbsp;&nbsp;Female
                </label> 
            </div>
            <div class="form-group col-md-12">
            <label for="em">Address</label>
                <input type="text" class="form-control" id="em"  name="address" placeholder="Enter Address" value="<?php echo $_SESSION['user_data']['user_address']; ?>">
            </div>
             <div class="form-row">
            <div class="form-group col-md-3">
            <label for="cty">City</label>
                <input type="text" class="form-control" id="cty" placeholder="Enter City" name="city" value="<?php echo $_SESSION['user_data']['user_city']; ?>">
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
                        <option <?php if(@$_SESSION['user_data']['user_state']== $s){echo "selected";} ?>><?php echo $s; ?></option>
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
                        <option <?php if(@$_SESSION['user_data']['user_country']== $c){echo "selected";} ?>><?php echo $c; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-3">
            <label for="pin">Pincode</label>
                <input type="text" class="form-control" id="pin" placeholder="Enter Pincodede" name="pincode" value="<?php echo $_SESSION['user_data']['user_pincode']; ?>">
            </div>
            </div>
            <center><button type="submit" class="btn btn-success" name="update">Update</button></center>
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
            
            pincode: {
            required: true,
            minlength: 6,
            maxlength:6,
            number:true
           }

  },
  messages:{
               name:{
               required:"<div style='color:red'>firstname should not blank</div>",
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
            pincode : {
                required : "<div style='color:red'>pincode should not blank</div>",
              minlength : "<div style='color:red'>required 6 digit</div>",
              maxlength: "<div style='color:red'>This field must contain 6 digit...</div>",
              number:"<div style='color:red'>must be number</div>"
            }
        
  }
});




</script>
</body>
</html>

<?php
      include("footer.php");
   ?>