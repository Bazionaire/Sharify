<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login.php");
   $pageTitle = "Papers assigned awaiting review";  
   require_once("PHPMAILER/Config.php");
   require_once("Header.php");
   $status='';
   $paper = new Paper();
   $reviews = $paper->MemberAssignedPapersInReview($_SESSION['myUserId']);
   $numInReview = $reviews->num_rows;

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
                    <h3 class="text-left price-headline" style="color:#000000;">Assigned Papers Awaiting Review (<?php echo $numInReview;  ?>)</h3>
                </div>                
              </div>
              <hr>
              <div class="row">
                        <div class="col-xs-4">
                              <strong><big>Project Group</big></strong>
                        </div>
                        <div class="col-xs-5">
                                <strong><big>Paper</big></strong>
                        </div>
              </div>
              <br/>
              <?php
                    foreach($reviews as $res)
                    {

                        $paperid = $res['id'];

              ?>
                    <div class="row">
                        <div class="col-xs-4">
                              <i class='fa fa-folder-o'></i>
                              <?php echo "<a href='#'>".$res['name']."</a>";  ?>
                        </div>
                        <div class="col-xs-5">
                                <i class='fa fa-file-o'></i>
                                <?php echo "<a href='PapierInfo.php?pid=".$res['id']."'>".$res['title']."</a>";
                                ?>
                        </div>
                        <div class="col-xs-3">
                                <?php
                                   echo "<strong><big>
                                            <a href='reviewpaper.php?pid=".$res['id']."'>Review this Paper</a>
                                         </big></strong>";
                                ?>
                        </div>
                        <div class="col-xs-12">
                                  <h5><strong>Assigned Reviewers</strong></h5>
                                  <ol>
                                      <?php
                                          $selReviewers = $paper->getReviewersToPaper($paperid);

                                          foreach($selReviewers as $row)
                                          {
                                              $dateassigned = new DateTime($row['dateassigned']);
                                              $dateassigned = $dateassigned->format('l jS F, Y');
                                              echo "<li>".$row['lastname'].' '.$row['firstname']."  - <small>assigned on ".$dateassigned." &nbsp;&nbsp;&nbsp;<strong>(Duration: ".$row['duration']." days)</strong></small></li>";
                                          }
                                    ?>
                                  </ol>
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
