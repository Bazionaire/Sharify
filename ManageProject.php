<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login.php");
   $pageTitle = "Manage Project";  
   require_once("PHPMAILER/Config.php");
   require_once("Header.php");
   
   
   

    

?>
        <br/>
        <div class="container-fluid">
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
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="text-left price-headline" style="color:#000000;">Manage Project</h3>
                </div>
            </div>
            <hr>
            <div class="row">
                <?php
                    $project = new Project();
                    $allProjects = $project->getAllProject();
                    foreach($allProjects as $row)
                    {
                      $id = $row['id'];
                      $name = $row['name'];
                      $code = $row['code'];
                      $datecreated = new DateTime($row['datecreated']);
                      $datecreated = $datecreated->format('l jS F, Y');

                      $editUrl="<a href='ProjectEdit.php?id=".$id."'>Edit</a>";
                      $deleteUrl = "<a href='DeleteProject.php?id=".$id."'>Delete</a>";
                ?>  
                      <div class="row">
                          <div class="col-md-6">
                              <?php
                                echo "  &nbsp; <strong>   <i class='fa fa-folder-o'></i> ".$name."</strong> <br/><br/> &nbsp;&nbsp;&nbsp; <i class='fa fa-edit'></i> ".$editUrl." &nbsp;&nbsp; | &nbsp;&nbsp; <i class='fa fa-trash-o'></i> ".$deleteUrl."</small>";
                              ?>
                          </div>
                      </div>
                      <hr>
                <?php
                    }
                ?>
            </div>
    </div><!-- end of container //-->
<?php
   require_once("Footer.php");

?>
