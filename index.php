<?php
  error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
session_destroy();
$pageTitle = "Home";
require_once("PHPMAILER/Config.php");
$msg = "";
$status = "";
$content = "";
//check if cookie is set
if (isset($_COOKIE['username']) && $_COOKIE['password'])
{
    loginFunction($_COOKIE['username'],$_COOKIE['password']);
}
//Login form functionality
if (isset($_POST['submitForm']))
{
    $username = SanitizeField::clean($_POST['username']);
    $password = SanitizeField::clean($_POST['epassword']);    
    
    if ($username!="" && $password!="")
    {
          if (!empty($_POST['remember_me']))
            {
               setcookie("username",$username,time()+3600);
               setcookie("password",$password, time()+3600);
               //echo "Cookie set successfully";
            }
            else{
              //echo "Remember me is not set";
              setcookie("username",'');
              setcookie("password",'');
            }
          loginFunction($username,$password);   
    }else
    {
       $status = "error";
       $msg = "Username and password is required to login.";
    }
}
//Login function
function loginFunction($username,$password)
{
        $member = new Member();
        $dataArray = array("username"=>$username,"password"=>$password);
        $result =  $member->login($dataArray);

        if ($result['status']=="success")
        {
            session_start();
            $_SESSION['memberLogin'] = 'Baz';
            $_SESSION['myUserId'] = $result["id"];
            $_SESSION['myLastname'] = $result["lastname"];
            $_SESSION['myFirstname'] = $result["firstname"];
            $_SESSION["myLocation"] = $result["location"];
            $_SESSION["myAddress"] = $result["address"];
            $_SESSION["myEmail"] = $result["email"];
            $_SESSION["myCountry"] = $result["country"];
            $_SESSION["myPhoto"] = $result["photo"];
            $_SESSION['myAboutme'] = $result['aboutme'];
            $_SESSION['myRole'] = $result['role'];

            header("location:BrowsePapers.php");
        }
        else
        {
            $status = $result["status"];
            $msg = $result["message"];
           $invgin = "Incorrect Login Credentials or Credentials do not match";
           echo $invgin;
        }
}//end of loginFunction
require_once("Header.php");
require_once("HomeHeader.php");
?>
<section>

      <div class="container-fluid">
            <div class="col-sm-3">
                <br/><br/><br/><br/><br/>
                <h1> Sign In</h1>

            <!-- Login form //-->
            <?php
                  require_once("AlertFunction/Alert.php");

            ?>
              <!-- Login form //-->
              <form id="signin" method="post" action="index.php">
                      <div class="form-group" >
                        <label class="col-xs-12 control-label no-padding-right text-left" for="Username"> Username  </label>
                        <div class=" input-group">
                          <div class="input-group-addon"><span class="fa fa-user-o"></span></div>
                          <input type="text" class="form-control" id="email" name="username" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group ">
                        <label class="col-xs-12 control-label no-padding-right text-left" for="Password"> Password  </label>
                        <div class="input-group">
                          <div class="input-group-addon"><span class="fa fa-key"></div>
                          <input type="password" class="form-control" name="epassword" id="epassword" placeholder="Password">
                        </div>
                      </div>
                      <div class="text-left">
                          <input type="checkbox" name="remember_me"> Remember me &nbsp;&nbsp;&nbsp;
                          <input type="submit" name="submitForm" class="btn btn-default" value="Login ">

                      </div>
                    </form>
            <!-- end of Login form //-->
            </div>
                  <div class="row">
                      <div class="col-xs-12 col-sm-7 hidden-xs">
                          <br/>
                          <h1><center>Welcome to my Project<center/><br/></h1>
                         <center><p1>MSc Information Technology and Business Intelligence</p1><br>
                          <p2>CMM007 Intranet Systems Development</p2><br>
                          <p3>Baz Khil</p3><br>
                          <p4>1709517</p4></center>

                         <center> <img src="Images/logo.png" alt="mylogo" style="width: 25%"/> </center>
<p>
                          <br/><br/>
                          <h2>Coursework 1</h2>
                          <h2>1.0 This Application</h2>
                          This application is the supply to the demand for a research paper sharing application. The research paper sharing application will have the ability to upload papers, allocate papers, store papers, review papers, monitor and track papers, and to share project papers among a group of people. Due to the demand for such an application, an application which satisfies the need will be delivered in this project.
                          The application will have 3 user roles:<br>
                          Administrator<br>
                          Team Leader<br>
                          Student<br>
                          In order to be one of the above users, the user must be registered first. Furthermore, the user must be logged in to perform actions that are mentioned above such as reviewing, uploading, monitoring etc.
                          Administrators will be able to set up projects and allocate students and giving one of the students the role of a team leader within a project. the Team Leader will be able to perform actions after an administrator has sent them a personalized link and Team Leaders are only able to allocate papers to students for review.
                          Moreover, students will only be able to upload research papers, see the papers that they have been allocated to and review them and also upload their reviews. Students will also be able to view all papers and reviews but only with a personalized link after the student has logged in.
                          </p>
                          <p>
                             <h2> 2.0 Constraint </h2>
                          2.1 The research paper application will be hosted on a webserver.
                          I.	The whole project will be hosted on the university’s webserver which is web-dev/ MYPHPADMIN.<br>
                              2.2 The project will also have an up to date code committed to GitHub.
                              I.	All of the code of this project will be made available on github.com/Bazionaire/ <br>
                              2.3 The application will have both front and back end code.
                              I.	Back End code of this project will exist of the logic and the data that performs the user’s requests. Whenever the user requests something, a query will run and respond to the user on the front end.
                              II.	Front end code will exist of the code that the user interacts with to execute tasks on the platform. The front end will be composed of beautiful and user-friendly design which will not be complex to execute. Front end features and design will be done by using HTML and CSS and to perform the functionalities, PHP and MySQL will be used.
</br>
                          2.4 The research paper application will have the following features:
                              I.	Login system which allows you to gain access and log out.
                              Security Mechanism which allows authorized users to log in and prevent un-authorized to log in. in order to achieve this function. HTML, CSS, PHP and MySQL will be used.
                              II.	More than one user role (Authorization measure and Identity Management)
                              (1)	Administrator will be able to assign students with the role of a team leader. Furthermore, Administrators will be able to set up projects and allocate students to the project.
                              (2)	The Team Leaders will be able to have the ability to allocate papers to students for review.
                              (3)	Students will be able to get access through a link that has been sent by a Team leader.

                              III.	File uploading system
                              This functionality will allow the users to upload and download research papers. This functionality will be achieved through using MySQL as a database which is then connected to PHP and HTML/CSS.
                              IV.	System to input data and then recall it from a database
                              MySQL will be used as a database which will store the user details such as their credentials for logging in and also the uploaded files. For recalling data from the database, PHP will be used.

                          </p>
                          <br/><br/>
                      </div>
        </div>
      </div><!-- container //-->
    </section>
<?php
   require_once("Footer.php");
?>
