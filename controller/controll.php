<?php
// to include classes and start session
include "../head.inc.php";

/////////////////// define our variables for registration///////////////
$info = "";
$firstErr = $lastErr = $passErr = $repeatErr = $emailErr = $cpassErr = $levelErr = "";
 $mypass = $mycpass = $myemail = $myfirst = $mylast =  $mylevel = "";
$isvalidate = true;
 $_SESSION['mypasserror'] = $_SESSION['myfirsterror'] = $_SESSION['mylevelerror'] = $_SESSION['mylasterror'] = $_SESSION['mycpasserror'] = $_SESSION['myemailerror'] = $_SESSION['mycerror'] = $_SESSION['msg_error'] = "";
$_SESSION['error_stat'] = "1";

// create object of dbmanager to access functions
$DbMgr = new DbManager();
//$action="";
if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
}


//var_dump($_REQUEST);

// start action reading
if(!empty($action)){
switch ($action) {

    // add user
    case 'register':
        if (!empty($_POST['level']) || !empty($_POST['fname']) || !empty($_POST['lname']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['cpass'])){

             //validate access level
             if (!empty(($_POST["level"]))) {
                $mylevel = ($_POST["level"]);
                $isvalidate = true;
            } else {
                $levelErr = "choose the access level.";
                $_SESSION['mylevelerror'] = "choose the access level.";

                $isvalidate = false;
            }


            // validate first name

            if (!empty(trim($_POST["fname"]))) {
                if (ctype_alpha(trim($_POST["fname"]))) {
                    if (strlen(trim($_POST["fname"])) >= 2) {
                        $myfirst = trim($_POST["fname"]);
                        $isvalidate = true;
                    } else {
                        $firstErr = "your first name should be more than 2 character.";
                        $_SESSION['myfirsterror'] = "your first name should be more than 2 character.";

                        $isvalidate = false;
                    }
                } else {
                    $firstErr = "Enter only character.";
                    $_SESSION['myfirsterror'] = "Enter only character.";

                    $isvalidate = false;
                }
            } else {
                $firstErr = "Enter your first name.";
                $_SESSION['myfirsterror'] = "Enter your first name.";

                $isvalidate = false;
            }



            // validate last name

            if (!empty(trim($_POST["lname"]))) {
                if (ctype_alpha(trim($_POST["lname"]))) {
                    if (strlen(trim($_POST["lname"])) >= 2) {
                        $mylast = trim($_POST["lname"]);
                        $isvalidate = true;
                    } else {
                        $lastErr = "your last name should be more than 2 character.";
                        $_SESSION['mylasterror'] = "your last name should be more than 2 character.";

                        $isvalidate = false;
                    }
                } else {
                    $lastErr = "Enter only character.";
                    $_SESSION['mylasterror'] = "Enter only character.";

                    $isvalidate = false;
                }
            } else {
                $lastErr = "Enter your last name.";
                $_SESSION['mylasterror'] = "Enter your last name.";

                $isvalidate = false;
            }




             //email validation

             if (!empty($_POST["email"])) {
                //check the format of the email
                $email = trim($_POST['email']);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = 'enter valid email address';
                    $_SESSION['myemailerror'] = $emailErr;

                    $isvalidate = false;
                } else {
                    $myemail = trim($_POST['email']);
                    $isvalidate = true;
                }
            } else {
                $emailErr = 'enter your email address';
                $_SESSION['myemailerror'] = $emailErr;

                $isvalidate = false;
            }


            //validate password
            if (!empty($_POST["password"])) {
                // password strength validation

                $password = trim($_POST["password"]);

                // Validate password strength
                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number    = preg_match('@[0-9]@', $password);
                $specialChars = preg_match('@[^\w]@', $password);

                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {

                    $passErr = 'your password should consist of a capital letter,special character,a number and more than 6 letters.';
                    $_SESSION['mypasserror'] = $passErr;


                    $isvalidate = false;
                } else {
                    $isvalidate = true;
                    $mypass = trim($_POST["password"]);
                }
            } else {
                $passErr = 'enter Password .';
                $_SESSION['mypasserror'] = $passErr;


                $isvalidate = false;
            }


            //validate  confirm password
            if (!empty($_POST["cpass"])) {
                // password strength validation

                $cpassword = trim($_POST["cpass"]);

                // Validate password strength
                $uppercase = preg_match('@[A-Z]@', $cpassword);
                $lowercase = preg_match('@[a-z]@', $cpassword);
                $number    = preg_match('@[0-9]@', $cpassword);
                $specialChars = preg_match('@[^\w]@', $cpassword);

                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($cpassword) < 6) {

                    $cpassErr = 'your password should consist of a capital letter,special character,a number and more than 6 letters.';
                    $_SESSION['mycpasserror'] = $cpassErr;


                    $isvalidate = false;
                } else {
                    $isvalidate = true;
                    $mycpass = trim($_POST["cpass"]);
                }
            } else {
                $cpassErr = 'enter Password .';
                $_SESSION['mycpasserror'] = $cpassErr;


                $isvalidate = false;
            }


            //   check if confirm pass and pass are the same
            if (trim($_POST['password']) != trim($_POST['cpass'])) {
                $repeatErr = 'your password should be the same as your confirm.';

                $isvalidate = false;

                $_SESSION['mycerror'] = $repeatErr;
            }


            if ($isvalidate === true  &&  $repeatErr == "" && $emailErr == "" && $cpassErr == "" && $passErr == "" && $firstErr == "" && $lastErr == "" && $levelErr == "") {


                // check for email uniqueness
                $emailrow = $DbMgr->getUserByEmail($myemail);
                if (isset($emailrow)) {
                    echo "<script>alert('this user with this email already registered.Try with different email!');</script>";
                    echo "<script>window.location.href='../register.php';</script>";
                   
                } else {
                    //create user object
                    $user = new user($id, $myfirst, $mylast,  $myemail,  $mypass, $mylevel, $stat);
                    $adduser = $DbMgr->addUser($user);
                    if (isset($adduser)) {

                        echo "<script>alert('you registered successfully, log in now.');</script>";
                        echo "<script>window.location.href='../login.php';</script>";

                    }else{
                        echo "<script>alert('problem in registration.try again.');</script>";
                        echo "<script>window.location.href='../register.php';</script>";
                    }


                    

                    
                }




            }else{
                echo "<script>alert('fill out fields correctly based on errors!');</script>";
                    echo "<script>window.location.href='../register.php';</script>";
            }



        }else{
            echo "<script>alert('fill out  All fields correctly !');</script>";
                echo "<script>window.location.href='../register.php';</script>";
        }

    break;

   //log in
    case 'loginuser':
        if (!empty($_POST['useremail']) && !empty($_POST['userpass'])) {

            //do the query in db
            $resultsearch = $DbMgr->getUserByEmail(trim($_POST['useremail']));
            //var_dump($resultsearch);

            if(isset($resultsearch) ){

               

                $_SESSION["accesor_name"]=$resultsearch->getFirstName();
                $_SESSION["accesor_lname"]=$resultsearch->getLastName();
                $_SESSION["accesor_pass"]=$resultsearch->getPassWord();
                $_SESSION["accesor_level"]=$resultsearch->getLevel();
                $_SESSION["accesor_stat"]=$resultsearch->getStat();

               
                if($resultsearch->getPassWord() == trim($_POST['userpass'])){

                    if($resultsearch->getStat() == 1){

                        $_SESSION["login-access"]="1";

                        echo "<script>alert('Welcome on board!');</script>";
                        echo "<script>window.location.href='../index.php';</script>";

                    }else{

                        echo "<script>alert('you are not an active user !');</script>";
                        echo "<script>window.location.href='../login.php';</script>";
                    }


                }else{

                    
                    echo "<script>alert('Enter a valid password !');</script>";
                   echo "<script>window.location.href='../login.php';</script>";
                }


            }else{
                echo "<script>alert('Enter a valid email !');</script>";
                echo "<script>window.location.href='../login.php';</script>";
            }




        }else{
            echo "<script>alert('Enter your email and password!');</script>";
                echo "<script>window.location.href='../login.php';</script>";
        }

    break;

    case 'logout':

        $_SESSION["login-access"]="0";
        $_SESSION["accesor_level"]="";
        echo "<script>window.location.href='../index.php';</script>";


        break;


}





}


// to active or deactive the user
if (!empty($_GET["action1"])) {
    //unset($_GET["action1"]);

    var_dump($_GET);

    if($_GET["action1"] = "active"){

        $resultactive = $DbMgr->activateUser(trim($_GET["id"]));
    if (isset($resultactive)) {

        echo "<script>alert('this user is active now.');</script>";
                echo "<script>window.location.href='../users.php';</script>";

    }else{
        echo "<script>alert('problem in activation.try again.');</script>";
        echo "<script>window.location.href='../users.php';</script>";
    }

    }else{

        $resultdeactive = $DbMgr->deactivateUser(trim($_GET["id"]));
    if (isset($resultdeactive)) {

        echo "<script>alert('this user is deactivate now.');</script>";
       echo "<script>window.location.href='../users.php';</script>";

    }else{
        echo "<script>alert('problem in deactivation.try again.');</script>";
        echo "<script>window.location.href='../users.php';</script>";
    }
    }




}
