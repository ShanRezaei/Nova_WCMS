<?php
// to include classes and start session
include "../head.inc.php";

// define variables
$fnameErr = $lnameErr = $imgcErr = $jobErr = "";
$fname = $lname = $job = "";
$isvalidate = true;
$_SESSION['clerk_img_error'] = $_SESSION['clerk_fname_error'] = $_SESSION['clerk_lname_error']  = $_SESSION['clerk_job_error'] = "";


// image characters
$accepted_format = array("image/png", "image/jpg", "image/jpeg");
$php_file_error = [];
$php_file_error[0] = 'There is no error, the file uploaded with success';
$php_file_error[1] = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
$php_file_error[2] = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
$php_file_error[3] = 'The uploaded file was only partially uploaded';
$php_file_error[4] = 'No file was uploaded';
$php_file_error[6] = 'Missing a temporary folder';
$php_file_error[7] = 'Failed to write file to disk.';
$php_file_error[8] = 'A PHP extension stopped the file upload.';

// create object of dbmanager to access functions
$DbMgrclerk = new TeamManager();

if (isset($_REQUEST['action-team'])) {
    $action_c = $_REQUEST['action-team'];
}

if (!empty($action_c)) {
    if ($action_c == "addclerk") {


        if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['job']) && !empty($_FILES['imagec'])) {



            //first name validation

            if (!empty(trim($_POST["fname"]))) {

                if (strlen(trim($_POST["fname"])) >= 2) {
                    $fname = trim($_POST["fname"]);
                    $isvalidate = true;
                } else {
                    $fnameErr = "the first name should be more than 2 character.";
                    $_SESSION['clerk_fname_error'] = "the first name should be more than 2 character.";

                    $isvalidate = false;
                }
            } else {
                $fnameErr = "Enter the first name.";
                $_SESSION['clerk_fname_error'] = "Enter the first name.";

                $isvalidate = false;
            }


            //last name validation

            if (!empty(trim($_POST["lname"]))) {

                if (strlen(trim($_POST["lname"])) >= 2) {
                    $lname = trim($_POST["lname"]);
                    $isvalidate = true;
                } else {
                    $lnameErr = "the last name should be more than 2 character.";
                    $_SESSION['clerk_lname_error'] = "the last name should be more than 2 character.";

                    $isvalidate = false;
                }
            } else {
                $lnameErr = "Enter the last name.";
                $_SESSION['clerk_lname_error'] = "Enter the last name.";

                $isvalidate = false;
            }


            //job validation

            if (!empty(trim($_POST["job"]))) {

                if (strlen(trim($_POST["job"])) >= 2) {
                    $job = trim($_POST["job"]);
                    $isvalidate = true;
                } else {
                    $jobErr = "job title should be more than 2 character.";
                    $_SESSION['clerk_job_error'] = "job title should be more than 2 character.";

                    $isvalidate = false;
                }
            } else {
                $jobErr = "Enter job title.";
                $_SESSION['clerk_job_error'] = "Enter job title.";

                $isvalidate = false;
            }

            //image validation
            if (($_FILES["imagec"]) == "") {
                $isvalidate = false;
                $imgcErr = "choose your image.";
                $_SESSION['clerk_img_error'] =  $imgcErr;
            }

            if ($isvalidate === true  &&  $imgcErr == "" && $fnameErr == "" && $lnameErr == "" && $jobErr == "") {


                // //make the path of the avatar and check other character of image to be correct
                $image_name = $_FILES['imagec']['name'];
                $image_type = $_FILES['imagec']['type'];
                $image_size = $_FILES['imagec']['size'];
                $image_temp_name = $_FILES['imagec']['tmp_name'];
                $array_name = explode(".", $image_name);
                $image_format = end($array_name); //get last index of array

                //make an address for saving img

                $countclerk = $DbMgrclerk->countClerk()->rowCount();

                $image_address = "Nova/assets/img/team/" . "team-" . $countclerk . "." . $image_format;

                //check for general errors
                if (!$_FILES['imagec']['error']) {
                    // check the size of the image
                    if ($image_size < 1024000) {
                        //check for type of the image
                        if (in_array($image_type, $accepted_format)) {
                            //uploade img in the folder in project root
                            move_uploaded_file($image_temp_name, "../" . $image_address);

                            //create content object
                            $newimgaddress = "assets/img/team/" . "team-" . $countclerk . "." . $image_format;
                            $clerk = new Team($id, $newimgaddress, $fname, $lname,$job);
                            $addclerk = $DbMgrclerk->addNewMember($clerk);

                            if (isset($addclerk)) {

                                echo "<script>alert('you add new Clerk successfully.');</script>";
                                echo "<script>window.location.href='../nova-team.php';</script>";
                            } else {
                                echo "<script>alert('Try again.');</script>";
                                echo "<script>window.location.href='../nova-team.php';</script>";
                            }
                        } else {
                            echo "<script>alert('invalid image format.Choose the new one.');</script>";
                            echo "<script>window.location.href='../nova-team.php';</script>";
                        }
                    } else {
                        echo "<script>alert('the size of the image is big.Choose the new one.');</script>";
                        echo "<script>window.location.href='../nova-team.php';</script>";
                    }
                } else {
                    echo "<script>alert('there is an error for image, choose another one!');</script>";
                    echo "<script>window.location.href='../nova-team.php';</script>";
                }


            } else {
                echo "<script>alert('fill out all fields based on errors.');</script>";
            echo "<script>window.location.href='../nova-team.php';</script>";
            }
        }else{
            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-team.php';</script>";
        }
    } else if ($action_c == "editclerk") {

        // do the validation
        echo "bye";
    }
}


// to delete
if (!empty($_GET["action_team"])) {
    if ($_GET["action_team"] = "delete") {

        // get the row number
         $count2 = $DbMgrclerk->countClerk()->rowCount();
         // give the permission to delete
        if($count2>1){
            // remove the img

        if (file_exists("../Nova/" . $_GET["img_c"])) {
            unlink("../Nova/" . $_GET["img_c"]);

            $resultdelete = $DbMgrclerk->deleteclerk(trim($_GET["idc"]));

            if (isset($resultdelete)) {

                echo "<script>alert('the content is deleted successfully.');</script>";
                echo "<script>window.location.href='../nova-team.php';</script>";
            } else {
                echo "<script>alert('problem in deleting.try again.');</script>";
                echo "<script>window.location.href='../nova-team.php';</script>";
            }
        } else {
            echo "<script>alert('img file does not exist.try again.');</script>";
                echo "<script>window.location.href='../nova-team.php';</script>";
        }

        }else{
            echo "<script>alert('you are not allowed to delete.');</script>";
                echo "<script>window.location.href='../nova-team.php';</script>";
        }


    }
}