<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once('includes/login.php');
   $pageTitle = "Assign User to Project";  
   require_once("PHPMAILER/Config.php");
   require_once("Header.php");
   $status='';
                $paper = new Paper();
                $list = $paper->SubmitedPapersByMember($_SESSION['myUserId']);
                $totalPapers = $list->num_rows;
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
                    <h3 class="text-left price-headline" style="color:#000000;">My Paper Submissions (<?php echo $totalPapers; ?>)</h3>
                </div>
            </div>
                  <!-- row 1 //-->
                  <hr>
              <div class="row" >
                  <div class="col-xs-4">
                        <strong><big>Project</big></strong>
                  </div>
                  <div class="col-xs-4">
                        <strong><big>Paper Title</big></strong>
                  </div>
                  <div class="col-xs-4">
                      <strong><big>File</big></strong>
                  </div>
              </div>
              <br/>
              <?php
                  
                  foreach($list as $row)
                  {
                    $datesubmitted = new DateTime($row['datesubmitted']);
                    $datesubmitted = $datesubmitted->format('l jS F, Y');

                    $assign = '';
                    if ($row['status']=='s' || $row['status']=='r')
                    {
                       $assign="<a href='AssignReviewer.php?pid=".$row['id']."'><strong>Assign reviewer</strong></a>";
                    }
                    
              ?>
              <div class="row" >
                  <div class="col-xs-4">
                        <?php 
                            echo "<i class='fa fa-folder-o'></i> <a href='ManageProject.php'>" .$row['name']."</a><br/>";
                            echo "<small>Submitted on ".$datesubmitted."</small>";
                        ?>
                  </div>
                  <div class="col-xs-4">
                        <?php  
                            echo "<i class='fa fa-comment-o'></i> <a href='PapierInfo.php?pid=".$row['id']."'>".$row['title']."</a><br/>";
                        ?>
                  </div>
                  <div class="col-xs-4">
                      <?php
                            echo "<i class='fa fa-file-o'></i> <a target='_blank' href='uploads/".$row['file']."'>".$row['file']."</a>";              
                      ?>
                  </div>

              </div>
              <hr>
              <?php
                  }
              ?>
    </div><!-- end of container //-->
<?php
   require_once("Footer.php");

?>
