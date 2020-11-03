<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>  -->
<?php
include("header.php");
if(isset($_SESSION['user_data']['user_name'])!='')
{
    header('location:index.php');
}
include("db.php");
if(isset($_POST['btnlogin']))
{
    $txtusername=$_POST['txtusername'];
    $txtpwd=$_POST['txtpwd'];
    echo $q="select * from tbl_user where `user_email`='$txtusername' and `user_password`='$txtpwd'";
    $q1=mysqli_query($con,$q);
    //print_r($q1);
    $nor=mysqli_num_rows($q1);
    
    if($nor==1)
    {
        $q2=mysqli_fetch_array($q1);
        $_SESSION['user_data']=$q2;
        header('location:index.php');
    }
    else
    {
        $msg= "Invalid EmailId or Password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="b1">
    
	<div id="d2">
    <form method="post" id="loginfrm" enctype="multipart/form-data">
    <fieldset id="field">
        <legend><img src="img.png" class="imgs"></legend>
        <div id="d1">
            <?php if(isset($msg)){ ?> 
                <div id="d4"> <?php echo $msg; ?> </div>
            <?php } ?>
    	    <input type="text" id="tnm" name="txtusername" placeholder="Enter Email id"><br/>
    	    <input type="password" id="tpwd" name="txtpwd" placeholder="Enter password"><br/>
    	    <button name="btnlogin" type="submit" id="btnlgn">Login Now!!</button><br/><br/>
    	    <div id="d3"><input type="checkbox" checked="checked"> Remember me </div><br/>
    	    <hr/>
            <button  name="btncancel" class="cancelbtn"> Cancel</button> 
            <span class="psw"><a href="#"> Forgot password? </a></span>
        </div>
    </fieldset>
    </form>
    </div>
    

<script>
$(document).ready(function()
{

    $("#loginfrm").validate({
    rules:{
        txtusername: {
            required: true,
            email: true
        },
        txtpwd:{
            required: true,
            minlength: 8
        }
    },
    messages:{
        txtusername:{ 
            required:"<div style='color:red;padding-top:10px;padding-left:50px;'>This field cannot be empty</div>",
            email:"<div style='color:red;padding-top:10px;padding-left:50px;'>email not valid</div>"
        },
        txtpwd:{
        required:"<div style='color:red;padding-top:10px;padding-left:50px;'>specify password",
        minlength: "<div style='color:red;padding-top:10px;padding-left:50px;'>Password must be at least 8 characters long"
        }
    }
  });
 });
</script>
</body>

</html>
