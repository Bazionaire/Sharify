<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login.php");
   $pageTitle = "Create Project";  
   require_once("PHPMAILER/Config.php");
   require_once("Header.php");
   require_once("AdminHeader.php");

   $status='';

   if (isset($_POST['submitForm']))
   {
        $longname = $_POST['longname'];
        $shortname = $_POST['shortname'];

        if ($longname=='' || $shortname=='')
        {
           $status='warning';
           $msg = "All fields are required to be filled before continuing.";
        }else
        {
            $project = new Project();
            $result = $project->createproject($longname,$shortname);
            $status = $result["status"];
            $msg = $result["msg"];
        }
   }
?>
        <br/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 text-right">
                  <?php
                           $userRole = '';
                           if ($_SESSION['myRole']=='admin')
                           {
                              $userRole = 'Administrator';
                           }
                           else if ($_SESSION['myRole']=='teamleader')
                           {
                              $userRole = 'Team Leader';
                           }else if ($_SESSION['myRole']=='member' || $_SESSION['myRole']=='')
                           {
                              $userRole = 'Member';
                           }
                           echo "<strong>Welcome ".$_SESSION['myLastname'].' '.$_SESSION['myFirstname']."</strong>,<br>";
                           echo $userRole;
                    ?>
                </div>
                <div class="col-xs-12">
                    <h3 class="text-left price-headline" style="color:#000000;">Create Project</h3>
                </div>
            </div>
                  <hr>
            <?php
                  require_once("AlertFunction/Alert.php");
            ?>
             <form name="create_project" action="CreateProject.php" method="post">
              <div class="form-group row">
                   <label for="Project Name" class="col-xs-12 col-sm-2 col-form-label text-right">Project Name</label>
                    <div class="col-xs-12 col-sm-6">
                            <input class="form-control" type="text" name="longname"/>                     
                    </div>
              </div>
              <div class="form-group row">
                  <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-right">Project Short Name</label>
                  <div class="col-xs-12 col-sm-6">
                      <input class="form-control" type="text" name="shortname"/>
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-xs-12 col-sm-2"></div>
                  <div class="col-xs-12 col-sm-10">
                      <input  class="btn btn-primary "  type="submit" name="submitForm" value="Create"/>
                  </div>
              </div>
              </form>
    </div><!-- end of container //-->
<?php
   require_once("Footer.php");

?>
