<?php
// to include classes and start session
include "../head.inc.php";


// define variables to add to table two
$titleoneErr = $titletwoErr = $textErr = "";
$titleone = $titletwo = $text = "";
$isvalidate = true;
$_SESSION['abouttwo_titleone_error'] = $_SESSION['abouttwo_titletwo_error'] = $_SESSION['abouttwo_text_error']  =  "";

// define variables to update to table two
$title1Err = $title2Err = $text2Err = "";
$title1 = $title2 = $text2 = "";
$isvalidate3 = true;
$_SESSION['abouttwo_title1_error'] = $_SESSION['abouttwo_title2_error'] = $_SESSION['abouttwo_text2_error']  =  "";



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
$DbMgrabouttwo = new AboutManager();

if (isset($_REQUEST['action-abouttwo'])) {
    $action_abouttwo = $_REQUEST['action-abouttwo'];
}

// //////////////////////////////////////////add and edit about two/////////////////////////////////
if (!empty($action_abouttwo)) {
    if ($action_abouttwo == "addabouttwo") {

        // do the validation
        // echo "hello";

        if (!empty($_POST['titleone']) && !empty($_POST['titletwo']) && !empty($_POST['text'])) {

            // do the validation
            //titleone validation
            if (!empty(trim($_POST["titleone"]))) {

                if (strlen(trim($_POST["titleone"])) >= 4) {
                    $titleone = trim($_POST["titleone"]);
                    $isvalidate = true;
                } else {
                    $titleoneErr = "the title should be more than 4 characters.";
                    $_SESSION['abouttwo_titleone_error'] = "the title should be more than 4 characters.";

                    $isvalidate = false;
                }
            } else {
                $titleoneErr = "Enter the first title.";
                $_SESSION['abouttwo_titleone_error'] = "Enter the title.";

                $isvalidate = false;
            }

            //titletwo validation
            if (!empty(trim($_POST["titletwo"]))) {

                if (strlen(trim($_POST["titletwo"])) >= 4) {
                    $titletwo = trim($_POST["titletwo"]);
                    $isvalidate = true;
                } else {
                    $titletwoErr = "the title should be more than 4 characters.";
                    $_SESSION['abouttwo_titletwo_error'] = "the title should be more than 4 characters.";

                    $isvalidate = false;
                }
            } else {
                $titleoneErr = "Enter the second title.";
                $_SESSION['abouttwo_titletwo_error'] = "Enter the second title.";

                $isvalidate = false;
            }

            //text validation
            if (!empty(trim($_POST["text"]))) {

                if (strlen(trim($_POST["text"])) >= 4) {
                    $text = trim($_POST["text"]);
                    $isvalidate = true;
                } else {
                    $textErr = "the description should be more than 4 characters.";
                    $_SESSION['abouttwo_text_error'] = "the description should be more than 4 characters.";

                    $isvalidate = false;
                }
            } else {
                $textErr = "Enter the Description.";
                $_SESSION['abouttwo_text_error'] = "Enter the Description.";

                $isvalidate = false;
            }


            //on submit
            if ($isvalidate === true  &&  $titleoneErr == "" && $titletwoErr == "" && $textErr == "") {

                // add new page swipper

                $abouttwo = new AboutTwo($id, $titleone, $titletwo, $text);
                $addabouttwo = $DbMgrabouttwo->addNewpage($abouttwo);
                if (isset($addabouttwo)) {

                    echo "<script>alert('you add new page successfully.');</script>";
                    echo "<script>window.location.href='../nova-about.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-about.php';</script>";
                }


            }else{
            
                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-about.php';</script>";
            

        }

        }else{
            
                echo "<script>alert('fill out all fields.');</script>";
                echo "<script>window.location.href='../nova-about.php';</script>";
            

        }


        // edit table two
    }else if($action_abouttwo == "editabouttwo"){
        if (!empty($_POST['ftitle']) && !empty($_POST['stitle']) && !empty($_POST['text'])) {

            // do the validation
            //titleone validation
            if (!empty(trim($_POST["ftitle"]))) {

                if (strlen(trim($_POST["ftitle"])) >= 4) {
                    $title1 = trim($_POST["ftitle"]);
                    $isvalidate3 = true;
                } else {
                    $title1Err = "the title should be more than 4 characters.";
                    $_SESSION['abouttwo_title1_error'] = "the title should be more than 4 characters.";

                    $isvalidate3 = false;
                }
            } else {
                $title1Err = "Enter the first title.";
                $_SESSION['abouttwo_title1_error'] = "Enter the title.";

                $isvalidate3 = false;
            }

            // validation for title two
            if (!empty(trim($_POST["stitle"]))) {

                if (strlen(trim($_POST["stitle"])) >= 4) {
                    $title2 = trim($_POST["stitle"]);
                    $isvalidate3 = true;
                } else {
                    $title2Err = "the title should be more than 4 characters.";
                    $_SESSION['abouttwo_title2_error'] = "the title should be more than 4 characters.";

                    $isvalidate3 = false;
                }
            } else {
                $title2Err = "Enter the first title.";
                $_SESSION['abouttwo_title2_error'] = "Enter the title.";

                $isvalidate3 = false;
            }

            //text validation
            if (!empty(trim($_POST["text"]))) {

                if (strlen(trim($_POST["text"])) >= 4) {
                    $text2 = trim($_POST["text"]);
                    $isvalidate3 = true;
                } else {
                    $text2Err = "the description should be more than 4 characters.";
                    $_SESSION['abouttwo_text2_error'] = "the description should be more than 4 characters.";

                    $isvalidate3 = false;
                }
            } else {
                $text2Err = "Enter the Description.";
                $_SESSION['abouttwo_text2_error'] = "Enter the Description.";

                $isvalidate3 = false;
            }


            //on submit
            if ($isvalidate3 === true  &&  $title1Err == "" && $title2Err == "" && $text2Err == "") {

                // add new page swipper

                $id2=$_POST["id"];
                $about2 = new AboutTwo($id2, $title1, $title2, $text2);
                $addabout2 = $DbMgrabouttwo->updateAboutTwo($about2);
                if (isset($addabout2)) {

                    echo "<script>alert('you update the content successfully.');</script>";
                    echo "<script>window.location.href='../nova-about.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-about.php';</script>";
                }

            }else{
            
                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-about.php';</script>";

        }
        }else{
            
                echo "<script>alert('fill out all fields.');</script>";
                echo "<script>window.location.href='../nova-about.php';</script>";
        
        }


    // edit table one
    }else if($action_abouttwo == "editaboutone"){

        if (empty($_FILES["avatar"]) == true) {
            
            echo "<script>window.location.href='../nova-about.php';</script>";

        }else{

            //echo "<script>alert('hello.');</script>";
            // //make the path of the avatar and check other character of image to be correct
            $image_name = $_FILES['avatar']['name'];
            $image_type = $_FILES['avatar']['type'];
            $image_size = $_FILES['avatar']['size'];
            $image_temp_name = $_FILES['avatar']['tmp_name'];
            $array_name = explode(".", $image_name);
            $image_format = end($array_name); //get last index of array


            // unlink the former img
            if (file_exists("../Nova/" . $_POST["imglink"])) {
                unlink("../Nova/" . $_POST["imglink"]);
            }

            
            $image_address1 = "Nova/assets/img/" . "why-us-bg" . "." . $image_format;
            //check for general errors
            if (!$_FILES['avatar']['error']) {
                // check the size of the image
                if ($image_size < 1024000) {
                    //check for type of the image
                    if (in_array($image_type, $accepted_format)) {
                        //uploade img in the folder in project root
                        move_uploaded_file($image_temp_name, "../" . $image_address1);

                        //create content object
                        $newimgaddress1 = "assets/img/" . "why-us-bg" . "." . $image_format;

                        $id = $_POST["id"];

                        $imgone = new AboutOne($id, $newimgaddress1);
                        $updateaboutone =$DbMgrabouttwo->updateAboutOne($imgone);

                        if (isset($updateaboutone)) {

                            echo "<script>alert('you Update the image successfully.');</script>";
                            echo "<script>window.location.href='../nova-about.php';</script>";
                        } else {
                            echo "<script>alert('Try again.');</script>";
                            echo "<script>window.location.href='../nova-about.php';</script>";
                        }
                    } else {
                        echo "<script>alert('invalid image format.Choose the new one.');</script>";
                        echo "<script>window.location.href='../nova-about.php';</script>";
                    }
                } else {
                    echo "<script>alert('the size of the image is big.Choose the new one.');</script>";
                    echo "<script>window.location.href='../nova-about.php';</script>";
                }
            } else {
                echo "<script>alert('there is an error for image, choose another one!');</script>";
                echo "<script>window.location.href='../nova-about.php';</script>";
            }


        } 


    }
}

// ////////////////////////////////////////table three update////////////////////////////////////////

// define variables to update table three
$title3Err = $text3Err = $link3Err = $linktext3Err = "";
$title3 = $text3 = $linktext3 =$link3 ="";
$isvalidate3= true;
$_SESSION['aboutthree_title_error'] = $_SESSION['aboutthree_text_error'] = $_SESSION['aboutthree_linktext_error']  = $_SESSION['aboutthree_link_error'] = "";



//update table three
if (isset($_REQUEST['action-aboutthree'])) {
    $action_aboutthree = $_REQUEST['action-aboutthree'];

}

if (!empty($action_aboutthree)) {
    if ($action_aboutthree == "editaboutthree") {
        if (!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['link']) && !empty($_POST['linktext'])) {

            //text validation
            if (!empty(trim($_POST["text"]))) {

                if (strlen(trim($_POST["text"])) >= 4) {
                    $text3 = trim($_POST["text"]);
                    $isvalidate3 = true;
                } else {
                    $text3Err = "the description should be more than 4 characters.";
                    $_SESSION['aboutthree_text_error']= "the description should be more than 4 characters.";

                    $isvalidate3 = false;
                }
            } else {
                $text3Err = "Enter the Description.";
                $_SESSION['aboutthree_text_error'] = "Enter the Description.";

                $isvalidate3 = false;
            }
            //title validation
            if (!empty(trim($_POST["title"]))) {

                if (strlen(trim($_POST["title"])) >= 4) {
                    $title3 = trim($_POST["title"]);
                    $isvalidate3 = true;
                } else {
                    $title3Err = "the title should be more than 4 characters.";
                    $_SESSION['aboutthree_title_error'] = "the title should be more than 4 characters.";

                    $isvalidate3 = false;
                }
            } else {
                $title3Err = "Enter the second title.";
                $_SESSION['aboutthree_title_error']= "Enter the second title.";

                $isvalidate3 = false;
            }

            //link validation
            if (!empty(trim($_POST["link"]))) {

                if (strlen(trim($_POST["link"])) >= 4) {
                    $link3 = trim($_POST["link"]);
                    $isvalidate3 = true;
                } else {
                    $link3Err = "the link address should be more than 4 characters.";
                    $_SESSION['aboutthree_link_error'] = "the link address should be more than 4 characters.";

                    $isvalidate3 = false;
                }
            } else {
                $link3Err = "Enter the Link address.";
                $_SESSION['aboutthree_link_error']= "Enter the Link address.";

                $isvalidate3 = false;
            }

            //link text validation
            if (!empty(trim($_POST["linktext"]))) {

                if (strlen(trim($_POST["linktext"])) >= 4) {
                    $linktext3 = trim($_POST["linktext"]);
                    $isvalidate3 = true;
                } else {
                    $linktext3Err = "the link description should be more than 4 characters.";
                    $_SESSION['aboutthree_linktext_error'] = "the link description should be more than 4 characters.";

                    $isvalidate3 = false;
                }
            } else {
                $linktext3Err = "Enter the Link text.";
                $_SESSION['aboutthree_linktext_error'] = "Enter the Link text.";

                $isvalidate3 = false;
            }



            //on submit
            if ($isvalidate3 === true  &&  $linktext3Err == "" && $link3Err == "" && $text3Err == "" && $title3Err=="") {

                // add new page swipper

                $id=$_POST["id"];
                $aboutthree = new AboutThree($id, $title3, $text3, $link3,$linktext3);
                $addaboutthree = $DbMgrabouttwo->updateAboutThree($aboutthree);
                if (isset($addaboutthree)) {

                    echo "<script>alert('you Update the content successfully.');</script>";
                    echo "<script>window.location.href='../nova-about.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-about.php';</script>";
                }


            }else{
            
                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-about.php';</script>";
            

        }






        }else{
            
                echo "<script>alert('fill out all fields.');</script>";
                echo "<script>window.location.href='../nova-about.php';</script>";
            

        }


    }


}
















// to delete
if (!empty($_GET["action_about"])) {
    if ($_GET["action_about"] = "delete") {
        // get the row number
    $count1 = $DbMgrabouttwo->countPage()->rowCount();
    // give the permission to delete
    if($count1>1){
        $resultdelete = $DbMgrabouttwo->deletePage(trim($_GET["id"]));
        
        if (isset($resultdelete)) {

            echo "<script>alert('the content is deleted successfully.');</script>";
            echo "<script>window.location.href='../nova-about.php';</script>";
        } else {
            echo "<script>alert('problem in deleting.try again.');</script>";
            echo "<script>window.location.href='../nova-about.php';</script>";
        }
    }else{
        echo "<script>alert('you are not allowed to delete.');</script>";
            echo "<script>window.location.href='../nova-about.php';</script>";
    }


    }

}