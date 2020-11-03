<?php ob_start();
      include('header.php');
      include("db.php");
      if(isset($_POST['submit']))
      {
         $spass=$_SESSION['user_data']['user_password'];
         $pass=$_POST['password'];
         $npass=$_POST['npass'];
         $cpass=$_POST['cpass'];
       if($spass == $pass)
       {
        if($pass != $npass)
        {
          if($npass == $cpass)
          {
            $id=$_SESSION['user_data']['user_id'];
            $qu="update tbl_user set `user_password`='$npass' where `user_id`='$id'";
            $qu1=mysqli_query($con,$qu);
            if($qu1)
            {
              header("location:logout.php");
            }

          }
          else
          {
            $msg="New and confirm password must be same...";
          }
        }
        else
        {
          $msg="old and new password should be differant...Try again";
        }
       }
       else
       {
           $msg="Exsisting and old password must be same...";

       }

      }

?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

       
        <?php if(isset($msg)) { ?>
            <div class="alert alert-warning"><?php echo $msg; ?></div>
        <?php } ?>
       <div id="c2">
       <form method="post" enctype="multipart/form-data">
        <div id="field1">
        <h3>CHANGE PASSWORD</h3>
        <div id="c1">
            <?php if(isset($msg)){ ?> 
                <div id="c4"> <?php echo $msg; ?> </div>
            <?php } ?>
          <input type="text" id="opwd" name="password" placeholder="Enter Old id"><br/>
          <input type="password" id="npwd" name="npwd" placeholder="Enter password"><br/>
          <input type="password" id="cpwd" name="cpwd" placeholder="Enter password"><br/>
          <button name="submit" type="submit" id="btnchange">Submit!!</button><br/><br/>
        </div>
    </div>
    </form>
    </div>
        <!-- /row -->
        <!-- INLINE FORM ELELEMNTS -->
        
        <!-- /row -->
        <!-- INPUT MESSAGES -->
       
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <?php include('footer.php');?>
   