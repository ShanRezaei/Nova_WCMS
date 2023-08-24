<?php
// to include classes and start session
include "../head.inc.php";

// create object of dbmanager to access functions
$DbMgrhome = new HomeManager();

// define variables to add new post
$fnameErr = $lnameErr = $imgErr = $titleErr =$textErr= "";
$fname = $lname = $title =$text= "";
$isvalidate = true;
$_SESSION['post_img_error'] = $_SESSION['post_fname_error'] = $_SESSION['post_lname_error']  = $_SESSION['post_title_error'] = $_SESSION['post_text_error'] ="";

//define variables for update table one
$text1Err= "";
$text1= "";
$isvalidate1 = true;
$_SESSION['this_logo1_error'] ="";

//define variables for update table two
$title2Err=$text2Err= $btitle2Err=$blink2Err=$vlink2Err="";
$text2= $title2=$btitle2=$blink2=$vlink2="";
$isvalidate2 = true;
$_SESSION['home_title2_error'] =$_SESSION['home_text2_error'] =$_SESSION['home_btitle2_error'] =$_SESSION['home_blink2_error'] =$_SESSION['home_vlink2_error'] ="";


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

if (isset($_REQUEST['action-home'])) {
    $action_h = $_REQUEST['action-home'];
}

if (!empty($action_h)) {
    if ($action_h == "addpost") {
        // if the fields are not empty
        if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['title']) && !empty($_POST['text'])  && !empty($_FILES['imgpost'])) {

            // do the validation

            //first name validation

            if (!empty(trim($_POST["fname"]))) {

                if (strlen(trim($_POST["fname"])) >= 2) {
                    $fname = trim($_POST["fname"]);
                    $isvalidate = true;
                } else {
                    $fnameErr = "the first name should be more than 2 character.";
                    $_SESSION['post_fname_error'] = "the first name should be more than 2 character.";

                    $isvalidate = false;
                }
            } else {
                $fnameErr = "Enter the first name.";
                $_SESSION['post_fname_error'] = "Enter the first name.";

                $isvalidate = false;
            }

            //last name
            if (!empty(trim($_POST["lname"]))) {

                if (strlen(trim($_POST["lname"])) >= 2) {
                    $lname = trim($_POST["lname"]);
                    $isvalidate = true;
                } else {
                    $lnameErr = "the last name should be more than 2 character.";
                    $_SESSION['post_lname_error'] = "the last name should be more than 2 character.";

                    $isvalidate = false;
                }
            } else {
                $lnameErr = "Enter the last name.";
                $_SESSION['post_lname_error'] = "Enter the last name.";

                $isvalidate = false;
            }


            //title
            if (!empty(trim($_POST["title"]))) {

                if (strlen(trim($_POST["title"])) >= 2) {
                    $title = trim($_POST["title"]);
                    $isvalidate = true;
                } else {
                    $titleErr = " title should be more than 2 character.";
                    $_SESSION['post_title_error'] = " title should be more than 2 character.";

                    $isvalidate = false;
                }
            } else {
                $titleErr = "Enter  title.";
                $_SESSION['post_title_error'] = "Enter  title.";

                $isvalidate = false;
            }

            //text
            if (!empty(trim($_POST["text"]))) {

                if (strlen(trim($_POST["text"])) >= 4) {
                    $text = trim($_POST["text"]);
                    $isvalidate = true;
                } else {
                    $textErr = " description should be more than 4 character.";
                    $_SESSION['post_text_error'] = " description should be more than 4 character.";

                    $isvalidate = false;
                }
            } else {
                $textErr = "Enter  description.";
                $_SESSION['post_text_error'] = "Enter  description.";

                $isvalidate = false;
            }


            //img
            if (($_FILES["imgpost"]) == "") {
                $isvalidate = false;
                $imgErr = "choose your image.";
                $_SESSION['post_img_error'] =  $imgErr;
            }


            //on submit
            if ($isvalidate === true  &&  $imgErr == "" && $fnameErr == "" && $lnameErr == "" && $titleErr == "" && $textErr == "") {

                // //make the path of the avatar and check other character of image to be correct
                $image_name = $_FILES['imgpost']['name'];
                $image_type = $_FILES['imgpost']['type'];
                $image_size = $_FILES['imgpost']['size'];
                $image_temp_name = $_FILES['imgpost']['tmp_name'];
                $array_name = explode(".", $image_name);
                $image_format = end($array_name); //get last index of array

                //make an address for saving img

                $countpost = ($DbMgrhome->countPost()->rowCount())+1;

                $image_address = "Nova/assets/img/blog/" . "blog-" . $countpost . "." . $image_format;


                //check for general errors
                if (!$_FILES['imgpost']['error']) {
                    // check the size of the image
                    if ($image_size < 1024000) {
                        //check for type of the image
                        if (in_array($image_type, $accepted_format)) {
                            //uploade img in the folder in project root
                            move_uploaded_file($image_temp_name, "../" . $image_address);

                            //create content object
                            $newimgaddress = "assets/img/blog/" . "blog-" . $countpost . "." . $image_format;

                            $post = new HomeThree($id, $fname, $lname, $title,$text,$newimgaddress);
                            $addpost = $DbMgrhome->addNewPost($post);

                            if (isset($addpost)) {

                                echo "<script>alert('you add new post successfully.');</script>";
                                echo "<script>window.location.href='../nova-home.php';</script>";
                            } else {
                                echo "<script>alert('Try again.');</script>";
                                echo "<script>window.location.href='../nova-home.php';</script>";
                            }
                        } else {
                            echo "<script>alert('invalid image format.Choose the new one.');</script>";
                            echo "<script>window.location.href='../nova-home.php';</script>";
                        }
                    } else {
                        echo "<script>alert('the size of the image is big.Choose the new one.');</script>";
                        echo "<script>window.location.href='../nova-home.php';</script>";
                    }
                } else {
                    echo "<script>alert('there is an error for image, choose another one!');</script>";
                    echo "<script>window.location.href='../nova-home.php';</script>";
                }



            }else {
                echo "<script>alert('fill out all fields based on errors.');</script>";
            echo "<script>window.location.href='../nova-home.php';</script>";
            }

        }else{
            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-home.php';</script>";
        }

        // update home one
    }else if($action_h == "edithomeone"){
        //text
        if (!empty(trim($_POST["logo1"]))) {

            if (strlen(trim($_POST["logo1"])) >= 4) {
                $text1 = trim($_POST["logo1"]);
                $isvalidate1 = true;
            } else {
                $text1Err = " description should be more than 4 character.";
                $_SESSION['this_logo1_error'] = " description should be more than 4 character.";

                $isvalidate1 = false;
            }
        } else {
            $text1Err = "Enter  description.";
            $_SESSION['this_logo1_error'] = "Enter  description.";

            $isvalidate1 = false;
        }
        


        //on submit
        if ($isvalidate1 === true   && $text1Err == "") {


            $id=$_POST["idlogo"];
            $logo = new HomeOne($id, $text1);
            $updatelogo = $DbMgrhome->updateHomeOne($logo);

            if (isset($updatelogo)) {

                echo "<script>alert('Logo updated successfully.');</script>";
                echo "<script>window.location.href='../nova-home.php';</script>";
            } else {
                echo "<script>alert('Try again.');</script>";
                echo "<script>window.location.href='../nova-home.php';</script>";
            }



        }else{
            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-home.php';</script>";
        }


        //edit home two
    }else if($action_h == "edithometwo"){

        if (!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['btitle']) && !empty($_POST['blink'])  && !empty($_POST['vlink'])) {
            //do the validation
            
            if (strlen(trim($_POST["title"])) >= 4) {
                $title2 = trim($_POST["title"]);
                $isvalidate2 = true;
            } else {
                $title2Err = " title should be more than 4 character.";
                $_SESSION['home_title2_error'] = " title should be more than 4 character.";

                $isvalidate2 = false;
            }

            if (strlen(trim($_POST["text"])) >= 4) {
                $text2 = trim($_POST["text"]);
                $isvalidate2 = true;
            } else {
                $text2Err = " description should be more than 4 character.";
                $_SESSION['home_text2_error'] = " description should be more than 4 character.";

                $isvalidate2 = false;
            }

            if (strlen(trim($_POST["btitle"])) >= 4) {
                $btitle2 = trim($_POST["btitle"]);
                $isvalidate2 = true;
            } else {
                $btitle2Err = " title should be more than 4 character.";
                $_SESSION['home_btitle2_error'] = " title should be more than 4 character.";

                $isvalidate2 = false;
            }

            //on submit
        if ($isvalidate2 === true   && $text2Err == ""  && $title2Err == "" && $btitle2Err == "") {


            $id2=$_POST["id"];
            $content = new HomeTwo($id2, $title2,$text2,$_POST['btitle'],$_POST['blink'],$_POST['vlink']);
            $updatec = $DbMgrhome->updateHomeTwo($content);

            if (isset($updatec)) {

                echo "<script>alert('Content updated successfully.');</script>";
                echo "<script>window.location.href='../nova-home.php';</script>";
            } else {
                echo "<script>alert('Try again.');</script>";
                echo "<script>window.location.href='../nova-home.php';</script>";
            }



        }else{
            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-home.php';</script>";
        }




        }else{
            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-home.php';</script>";
        }

    }


    
}











// to delete
if (!empty($_GET["action_home"])) {
    if ($_GET["action_home"] = "delete") {

        // get the row number
         $count = $DbMgrhome->countPost()->rowCount();
         // give the permission to delete
        if($count>1){
            // remove the img

        if (file_exists("../Nova/" . $_GET["img"])) {
            unlink("../Nova/" . $_GET["img"]);

            $resultdelete = $DbMgrhome->deletePost(trim($_GET["id"]));

            if (isset($resultdelete)) {

                echo "<script>alert('the content is deleted successfully.');</script>";
                echo "<script>window.location.href='../nova-home.php';</script>";
            } else {
                echo "<script>alert('problem in deleting.try again.');</script>";
                echo "<script>window.location.href='../nova-home.php';</script>";
            }
        } else {
            echo "<script>alert('img file does not exist.try again.');</script>";
                echo "<script>window.location.href='../nova-home.php';</script>";
        }

        }else{
            echo "<script>alert('you are not allowed to delete.');</script>";
                echo "<script>window.location.href='../nova-home.php';</script>";
        }


    }
}

?>