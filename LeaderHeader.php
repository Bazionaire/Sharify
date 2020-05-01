<?php
    require_once("includes/avatar.php");
    
    
?>
<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#db93b1;color:white;">
      <div class="navbar-header">
        <a class="navbar-brand" href="BrowsePapers.php" style='font-size:30px;color:#ffffff;'>Sharify&nbsp;</div></a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-menu" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      </div>

      

      <div id="nav-menu" class="collapse navbar-collapse navbar-right" >
          <ul class="nav navbar-nav">
            <li><a style='color:#ffffff;' href="BrowsePapers.php"><span class="fa fa-search" ></span><strong> Browse Papers</strong></a></li>
              <ul class="nav navbar-nav">
                  <li><a style='color:#ffffff;' href="SubmitPaper.php"><span class="fa fa-folder-open" ></span><strong> Submit Paper</strong></a></li>
            <li class="dropdown">
              <a style='color:#ffffff;' class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="#">
                  <span class="fa fa-user-o"></span><strong> Users </strong><b class="caret"></b>
              </a>
                <ul class="dropdown-menu">
                    <li><a style="padding-top:8px;padding-bottom:8px;color:#000000;" href="AssignUserProject.php">Assign User</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a style='color:#ffffff;' class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="#">
                  <span class="fa fa-calendar"></span><strong> Papers </strong><b class="caret"></b>
              </a>
                  <ul class="dropdown-menu">
                      <li><a style="padding-top:8px;padding-bottom:8px;color:#000000;" href="Submission.php">Submissions</a>
                      <li><a style="padding-top:8px;padding-bottom:8px;color:#000000;" href="PapersInReview.php"> In Review</a></li>
                  </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="BrowsePapers.php">
                  <img src="<?php echo $myPhoto; ?>" class="img-circle" width="30px" height="30px" hspace="2px" align="left" > <b class="caret"></b>
              </a>
                <ul class="dropdown-menu">
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#000000;" href="Sign_OUT.php">Log out</a></li>
                </ul>
            </li>
          </ul>
      </div>
    </nav>