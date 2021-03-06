<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login.php");
   $pageTitle = "Show Users";
   require_once("PHPMAILER/Config.php");
   require_once("Header.php");
?><br/>
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
                    <h3 class="text-left price-headline" style="color:#000000;">Current Users</h3>
                </div>
            </div>
            <hr>
            <div class="row ">
                <?php
                    $user = new User();
                    $allUsers = $user->getAllUsers();
                    foreach($allUsers as $row)
                    {
                      $id = $row['id'];
                      $name = $row['lastname'].' '.$row['firstname'];
                      $email = $row['email'];
                      $location = $row['location'];
                      $address = $row['address'];
                      $country = $row['country'];
                      $pwd = $row['password'];
                      $role = $row['role'];
                      $datecreated = new DateTime($row['datecreated']);
                      $datecreated = $datecreated->format('l jS F, Y');
                      if ($role=='')
                      {
                        $role = 'member';
                      }
                      $memberLink = "<a href='#".$id."#'>".$name."</a>"
                ?>  
                      <div class="row -align-center">
                          <div class="col-xs-3">
                              <?php
                                  echo " &nbsp; <strong><i class='fa fa-user-o'></i> ".$memberLink."</strong>";
                              ?>
                          </div>
                          <div class="col-xs-3">
                              <?php
                                  echo "<i class='fa fa-envelope-o'></i> ".$email;
                              ?>
                          </div>
                          <div class='col-xs-2'>
                              <?php
                                  echo "<i class='fa fa-tasks'></i> ".$role;
                              ?>
                          </div>
                          <div class="col-xs-4">
                              <?php
                                  echo "<small><i class='fa fa-calendar-o'></i> ".$datecreated."</small>";
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
