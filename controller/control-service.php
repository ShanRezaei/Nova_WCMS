<?php
// to include classes and start session
include "../head.inc.php";



// define variables for adding new service

$iconErr = $titleErr = $textErr = "";
$title = $text = $icon = "";
$isvalidate = true;
$_SESSION['service_icon_error'] = $_SESSION['service_title_error'] = $_SESSION['service_text_error']   = "";




// define variables to add new service cards
$imgErr = $titlecardErr = $textcardErr = "";
$titlecard = $textcard = $img = "";
$isvalidatecard = true;
$_SESSION['service_img_card_error'] = $_SESSION['service_title_card_error'] = $_SESSION['service_text_card_error']   = "";


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
$DbMgrservice = new ServiceManager();
$DbMgrservicecard = new ServiceCardManager();


if (isset($_REQUEST['action-service'])) {
    $action_s = $_REQUEST['action-service'];
}

if (!empty($action_s)) {
    // add new  service
    if ($action_s == "addservice") {

        if (!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['icons'])) {

            //title validation
            if (!empty(trim($_POST["title"]))) {

                if (strlen(trim($_POST["title"])) >= 4) {
                    $title = trim($_POST["title"]);
                    $isvalidate = true;
                } else {
                    $titleErr = "title should be more than 4 characters.";
                    $_SESSION['service_title_error'] = "title should be more than 4 characters.";

                    $isvalidate = false;
                }
            } else {
                $titleErr = "Enter title.";
                $_SESSION['service_title_error'] = "Enter title.";

                $isvalidate = false;
            }


            //text validation
            if (!empty(trim($_POST["text"]))) {

                if (strlen(trim($_POST["text"])) >= 4) {
                    $text = trim($_POST["text"]);
                    $isvalidate = true;
                } else {
                    $textErr = "description should be more than 4 characters.";
                    $_SESSION['service_text_error'] = "Description should be more than 4 characters.";

                    $isvalidate = false;
                }
            } else {
                $textErr = "Enter Description.";
                $_SESSION['service_text_error'] = "Enter description.";

                $isvalidate = false;
            }


            // icon validation
            if (!empty(trim($_POST["icons"]))) {
                $icon = trim($_POST["icons"]);
                $isvalidate = true;
            } else {
                $iconErr = "choose the icon.";
                $_SESSION['service_icon_error'] = "choose the icon.";

                $isvalidate = false;
            }


            // on submit
            if ($isvalidate === true  &&  $iconErr == "" && $titleErr == "" && $textErr == "") {


                // creat object of service class
                $service = new Service($id, $icon, $title, $text);
                $addservice = $DbMgrservice->addNewService($service);

                if (isset($addservice)) {

                    echo "<script>alert('you add new service successfully.');</script>";
                    echo "<script>window.location.href='../nova-service.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-service.php';</script>";
                }
            } else {
                echo "<script>alert('fill out all fields based on errors.');</script>";
                echo "<script>window.location.href='../nova-service.php';</script>";
            }
        } else {

            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-service.php';</script>";
        }
    } else if ($action_s == "editservice") {

        // do the validation
        echo "bye";
    }else if($action_s == "addservicecard"){

        if (!empty($_POST['titlecard']) && !empty($_POST['textcard']) && !empty($_FILES['imagecard'])) {

        // do the validations

        //title validation
        if (!empty(trim($_POST["titlecard"]))) {

            if (strlen(trim($_POST["titlecard"])) >= 4) {
                $titlecard = trim($_POST["titlecard"]);
                $isvalidatecard = true;
            } else {
                $titlecardErr = "title should be more than 4 characters.";
                $_SESSION['service_title_card_error'] = "title should be more than 4 characters.";

                $isvalidatecard = false;
            }
        } else {
            $titlecardErr = "Enter title.";
            $_SESSION['service_title_card_error'] = "Enter title.";

            $isvalidatecard = false;
        }


        //text validation
        if (!empty(trim($_POST["textcard"]))) {

            if (strlen(trim($_POST["textcard"])) >= 4) {
                $textcard = trim($_POST["textcard"]);
                $isvalidatecard = true;
            } else {
                $textcardErr = "description should be more than 4 characters.";
                $_SESSION['service_text_card_error'] = "Description should be more than 4 characters.";

                $isvalidatecard = false;
            }
        } else {
            $textcardErr = "Enter Description.";
            $_SESSION['service_text_card_error'] = "Enter description.";

            $isvalidatecard = false;
        }



        //validate avatar
        if (($_FILES['imagecard']) == "") {
            $isvalidatecard = false;
            $imgErr = "choose your image.";
            $_SESSION['this_img_card_error'] =  $imgErr;
        }


        // on submit
        if ($isvalidatecard === true  &&  $imgErr == "" && $titlecardErr == "" && $textcardErr == "") {

            // image validation
            // //make the path of the avatar and check other character of image to be correct
            $image_name = $_FILES['imagecard']['name'];
            $image_type = $_FILES['imagecard']['type'];
            $image_size = $_FILES['imagecard']['size'];
            $image_temp_name = $_FILES['imagecard']['tmp_name'];
            $array_name = explode(".", $image_name);
            $image_format = end($array_name); //get last index of array
            //make an address for saving avatar

            $countcard1 = ($DbMgrservicecard->countServicecard()->rowCount())+1;
            $image_address = "Nova/assets/img/" . "cards-" .  $countcard1 . "." . $image_format;

            //check for general errors
            if (!$_FILES['imagecard']['error']) {
                // check the size of the image
                if ($image_size < 1024000) {
                    //check for type of the image
                    if (in_array($image_type, $accepted_format)) {
                        //uploade img in the folder in project root
                        move_uploaded_file($image_temp_name, "../" . $image_address);

                        //create content object
                        $newimgaddress = "assets/img/" . "cards-" .  $countcard1 . "." . $image_format;
                        $servicec = new ServiceCard($id, $newimgaddress, $titlecard, $textcard);
                        $addservicec = $DbMgrservicecard->addNewServiceCard($servicec);

                        if (isset($addservicec)) {

                            echo "<script>alert('you add new Card successfully.');</script>";
                            echo "<script>window.location.href='../nova-service.php';</script>";
                        } else {
                            echo "<script>alert('Try again.');</script>";
                            echo "<script>window.location.href='../nova-service.php';</script>";
                        }
                    } else {
                        echo "<script>alert('invalid image format.Choose the new one.');</script>";
                        echo "<script>window.location.href='../nova-service.php';</script>";
                    }
                } else {
                    echo "<script>alert('the size of the image is big.Choose the new one.');</script>";
                    echo "<script>window.location.href='../nova-service.php';</script>";
                }
            } else {
                echo "<script>alert('there is an error for image, choose another one!');</script>";
                echo "<script>window.location.href='../nova-service.php';</script>";
            }



        }else{
            echo "<script>alert('fill out all fields based on errors.');</script>";
            echo "<script>window.location.href='../nova-service.php';</script>";
        }

        }else{
            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-service.php';</script>";
        }


    }else if($action_s == "editservicecard"){
        // update content
        echo "bye2";

    }
}


// to delete selected row
if (!empty($_GET["action_service"])) {

    

    if ($_GET["action_service"] = "delete") {
        
        // get the row number
         $count = $DbMgrservice->countService()->rowCount();

        if($count>1){
            $resultdelete = $DbMgrservice->deleteService(trim($_GET["id"]));

        if (isset($resultdelete)) {

            echo "<script>alert('the content is deleted successfully.');</script>";
            echo "<script>window.location.href='../nova-service.php';</script>";
        } else {
            echo "<script>alert('problem in deleting.try again.');</script>";
            echo "<script>window.location.href='../nova-service.php';</script>";
        }

        }else{
            echo "<script>alert('You are not allowed to delete.');</script>";
            echo "<script>window.location.href='../nova-service.php';</script>";
        }

        
    } 
}

// delete the service card

if (!empty($_GET["action_service_card"])) {
     if($_GET["action_service_card"] = "deletecard"){

        // get the row number
        $countcard = $DbMgrservicecard->countServicecard()->rowCount();

        if($countcard>1){
            // remove the img

        if (file_exists("../Nova/" . $_GET["img_card"])) {


            // delete img
            unlink("../Nova/" . $_GET["img_card"]);
            
            $resultdelete1 = $DbMgrservicecard->deleteServiceCard(trim($_GET["idcard"]));

        if (isset($resultdelete1)) {

            echo "<script>alert('the content is deleted successfully.');</script>";
            echo "<script>window.location.href='../nova-service.php';</script>";
        } else {
            echo "<script>alert('problem in deleting.try again.');</script>";
            echo "<script>window.location.href='../nova-service.php';</script>";
        }


        }else {
           echo "<script>alert('img file does not exist.');</script>";
            echo "<script>window.location.href='../nova-service.php';</script>";
        }



        }else{
            echo "<script>alert('You are not allowed to delete.');</script>";
            echo "<script>window.location.href='../nova-service.php';</script>";
        }



    }


}


