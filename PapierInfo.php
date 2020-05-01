<?php

if (!isset($_GET['pid']) || $_GET['pid']=='')
{
  header("location: Submission.php");
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login.php");
   $pageTitle = "Assign User to Project";  
   require_once("PHPMAILER/Config.php");
   require_once("Header.php");
   $status='';
   $paperid = $_GET['pid'];
   $pageLink = "AssignReviewer.php?pid=".$paperid;
   $paper = new Paper();
   $paperInfo  = $paper->getPaperById($paperid);
   foreach($paperInfo as $result)
   {
      $paperTitle = $result["title"];
      $paperProject = $result['name'];
      $paperDesc = $result['description'];
      $paperFile = $result['file'];
      $paperUserId = $result['userid'];
      $paperSubmitedby = $result['lastname'].' '.$result['firstname'];
      $paperDate = new DateTime($result['datesubmitted']);
      $paperDate = $paperDate->format('l jS F, Y');
   }

   if (isset($_POST['submitForm']))
   {
        $userid = $_POST['user'];
        $duration = $_POST['duration'];
        if ($paperid=='' || $userid=='' || $duration=='' )
        {
           $status='warning';
           $msg = "All fields are required to be filled before continuing.";
        }else
        {
            $dataArray = array("paperid"=>$paperid,"userid"=>$userid,"duration"=>$duration);
            $paper = new Paper();            
            $result = $paper->AssignReviewer($dataArray);
            $status = $result["status"];
            $msg = $result["msg"];
        }
   }
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
                    <h3 class="text-left price-headline" style="color:#000000;">Paper Detailed Information</h3><br/>(Paper Title: <?php echo $paperTitle; ?>)
                </div>
            </div>
                  <hr>
            <?php
                  require_once("AlertFunction/Alert.php");

            ?>
              <div class="row">
                  <div class="col-xs-12">
                    <h4 class="text-left price-headline" style="color:#000000;font-weight:bold;">Paper Details</h4>
                </div>
              </div>
              <br/>
              <div class="row" >
                  <div class="col-xs-12">
                      <strong>Project Group</strong>
                        <?php 
                            echo "<br/><i class='fa fa-folder-o'></i> <a href='ManageProject.php'>" .$paperProject."</a><br/></br>";
                           
                        ?>
                  </div>
                  <div class="col-xs-12">
                      <strong>Paper Title</strong>
                        <?php 
                            echo "<br/><i class='fa fa-file-o'></i> <a href='Submission.php'>" .$paperTitle."</a><br/><br/>";
                        ?>
                  </div>
                  <div class="col-xs-12">
                        <strong>Description</strong>
                        <?php  
                            echo "<br/><i class='fa fa-comment-o'></i> ".$paperDesc."<br/><br/>";
                        ?>
                  </div>
                  <div class="col-xs-12">
                      <Strong>File</Strong>
                      <?php
                            echo "<br/><i class='fa fa-file-o'></i> <a target='_blank' href='uploads/".$paperFile."'>".$paperFile."</a><br/><br/>";              
                      ?>
                  </div>

                  <div class="col-xs-12">
                      <Strong>Submitted By</Strong>
                      <?php
                          $code1= "oDdpnVaWwgdsjhMFiyIeLjJjSUCThpJUxfUVwTGnNSGeMLToTq";
                          $code2 = "FoltjKlLKnBdPvQfPQi!oLU!lStPXzTyZomFgktMQluhRbCDHe";
                            echo "<br/><i class='fa fa-user-o'></i> <a target='_blank' href='#".$code1.'-'.$paperUserId.'-'.$code2."'>".$paperSubmitedby."</a><br/><br/>";
                      ?>
                  </div>

                  <div class="col-xs-12">
                      <Strong>Date Submitted</Strong>
                      <?php
                            echo "<br/><i class='fa fa-calendar-o'></i> ".$paperDate."</a>";              
                      ?>
                  </div>
              </div>
              <hr>
              <div class="row">
                  <div class="col-xs-12">
                    <h4 class="text-left price-headline" style="color:#000000;font-weight:bold;">Assigned Reviewers</h4>
                </div>
                  <ol>
                <?php
                    $selReviewers = $paper->getReviewersToPaper($paperid);

                    foreach($selReviewers as $row)
                    {
                        $removeAssign = '';
                        if ($_SESSION['myRole']=='teamleader')
                        {
                           $removeAssign = "<a href='#'>Remove</a>";
                        }
                        $dateassigned = new DateTime($row['dateassigned']);
                        $dateassigned = $dateassigned->format('l jS F, Y');
                        echo "<li><a target='_blank' href='#".$code1.'-'.$row['userid'].'-'.$code2."'>".$row['lastname'].' '.$row['firstname']."</a>  - <small>assigned on ".$dateassigned." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$removeAssign."</small></li>";
                    }
                ?>
                  </ol>
              </div>
              <br/>
              <hr>
    </div><!-- end of container //-->
<?php
   require_once("Footer.php");

?>
