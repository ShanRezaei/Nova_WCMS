<?php
// to include classes and start session
include "../head.inc.php";


// define variables
$nameErr = $textErr = $imgErr = "";
$myname = $mytext =  "";
$isvalidate = true;
$_SESSION['this_img_error'] = $_SESSION['this_name_error'] = $_SESSION['this_text_error'] = "";

// define variables for update
$name1Err = $text1Err = $img1Err = "";
$myname1 = $mytext1 =  "";
$isvalidate1 = true;
$_SESSION['this_img1_error'] = $_SESSION['this_name1_error'] = $_SESSION['this_text1_error'] = "";


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
$DbMgrp = new PortfolioManager();

if (isset($_REQUEST['action-portfolio'])) {
    $action_p = $_REQUEST['action-portfolio'];
}

if (!empty($action_p)) {
    if ($action_p == "addproduct") {

        // do the validation
        // echo "hello";

        if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_FILES['avatar'])) {


            //name validation
            if (!empty(trim($_POST["name"]))) {

                if (strlen(trim($_POST["name"])) >= 2) {
                    $myname = trim($_POST["name"]);
                    $isvalidate = true;
                } else {
                    $nameErr = "the title should be more than 2 character.";
                    $_SESSION['this_name_error'] = "the title should be more than 2 character.";

                    $isvalidate = false;
                }
            } else {
                $nameErr = "Enter the title.";
                $_SESSION['this_name_error'] = "Enter the title.";

                $isvalidate = false;
            }


            //description validation
            if (!empty(trim($_POST["description"]))) {

                if (strlen(trim($_POST["description"])) >= 4) {
                    $mytext = trim($_POST["description"]);
                    $isvalidate = true;
                } else {
                    $textErr = "the description should be more than 4 character.";
                    $_SESSION['this_text_error'] = "the description should be more than 4 character.";

                    $isvalidate = false;
                }
            } else {
                $textErr = "Enter the description.";
                $_SESSION['this_text_error'] = "Enter the description.";

                $isvalidate = false;
            }


            //validate avatar
            if (($_FILES["avatar"]) == "") {
                $isvalidate = false;
                $imgErr = "choose your image.";
                $_SESSION['this_img_error'] =  $imgErr;
            }


            if ($isvalidate === true  &&  $imgErr == "" && $nameErr == "" && $textErr == "") {
                // //make the path of the avatar and check other character of image to be correct
                $image_name = $_FILES['avatar']['name'];
                $image_type = $_FILES['avatar']['type'];
                $image_size = $_FILES['avatar']['size'];
                $image_temp_name = $_FILES['avatar']['tmp_name'];
                $array_name = explode(".", $image_name);
                $image_format = end($array_name); //get last index of array
                //make an address for saving avatar

                $count = ($DbMgrp->countProduct()->rowCount()) + 1;

                $image_address = "Nova/assets/img/portfolio/" . $myname . $count . "." . $image_format;



                //check for general errors
                if (!$_FILES['avatar']['error']) {
                    // check the size of the image
                    if ($image_size < 1024000) {
                        //check for type of the image
                        if (in_array($image_type, $accepted_format)) {
                            //uploade img in the folder in project root
                            move_uploaded_file($image_temp_name, "../" . $image_address);

                            //create content object
                            $newimgaddress = "assets/img/portfolio/" . $myname . $count . "." . $image_format;
                            $product = new Portfolio($id, $newimgaddress, $myname, $mytext);
                            $addproduct = $DbMgrp->addNewProduct($product);

                            if (isset($addproduct)) {

                                echo "<script>alert('you add new product successfully.');</script>";
                                echo "<script>window.location.href='../nova-portfolio.php';</script>";
                            } else {
                                echo "<script>alert('Try again.');</script>";
                                echo "<script>window.location.href='../nova-portfolio.php';</script>";
                            }
                        } else {
                            echo "<script>alert('invalid image format.Choose the new one.');</script>";
                            echo "<script>window.location.href='../nova-portfolio.php';</script>";
                        }
                    } else {
                        echo "<script>alert('the size of the image is big.Choose the new one.');</script>";
                        echo "<script>window.location.href='../nova-portfolio.php';</script>";
                    }
                } else {
                    echo "<script>alert('there is an error for image, choose another one!');</script>";
                    echo "<script>window.location.href='../nova-portfolio.php';</script>";
                }
            } else {
                echo "<script>alert('fill out all fields based on errors.');</script>";
                echo "<script>window.location.href='../nova-portfolio.php';</script>";
            }
        } else {
            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-portfolio.php';</script>";
        }
    } else if ($action_p == "editproduct") {

        if (!empty($_POST['name1']) && !empty($_POST['description1'])) {
            // do the validation

            //name validation
            if (!empty(trim($_POST["name1"]))) {

                if (strlen(trim($_POST["name1"])) >= 2) {
                    $myname1 = trim($_POST["name1"]);
                    $isvalidate1 = true;
                } else {
                    $name1Err = "the title should be more than 2 character.";
                    $_SESSION['this_name1_error'] = "the title should be more than 2 character.";

                    $isvalidate1 = false;
                }
            } else {
                $name1Err = "Enter the title.";
                $_SESSION['this_name1_error'] = "Enter the title.";

                $isvalidate1 = false;
            }


            //description validation
            if (!empty(trim($_POST["description1"]))) {

                if (strlen(trim($_POST["description1"])) >= 4) {
                    $mytext1 = trim($_POST["description1"]);
                    $isvalidate1 = true;
                } else {
                    $text1Err = "the description should be more than 4 character.";
                    $_SESSION['this_text1_error'] = "the description should be more than 4 character.";

                    $isvalidate1 = false;
                }
            } else {
                $text1Err = "Enter the description.";
                $_SESSION['this_text1_error'] = "Enter the description.";

                $isvalidate1 = false;
            }


            // on submit
            if ($isvalidate1 === true  &&   $name1Err == "" && $text1Err == "") {

                if (($_FILES["avatar1"]['name']) == "") {


                    $id = $_POST["id"];
                    $img = "";
                    $product1 = new Portfolio($id, $img, $myname1, $mytext1);
                    $addproduct1 = $DbMgrp->updatePortfoliotwo($product1);

                    if (isset($addproduct1)) {

                        echo "<script>alert('you Update the product successfully.');</script>";
                        echo "<script>window.location.href='../nova-portfolio.php';</script>";
                    } else {
                        echo "<script>alert('Try again.');</script>";
                        echo "<script>window.location.href='../nova-portfolio.php';</script>";
                    }
                } else {

                    // //make the path of the avatar and check other character of image to be correct
                    $image_name = $_FILES['avatar1']['name'];
                    $image_type = $_FILES['avatar1']['type'];
                    $image_size = $_FILES['avatar1']['size'];
                    $image_temp_name = $_FILES['avatar1']['tmp_name'];
                    $array_name = explode(".", $image_name);
                    $image_format = end($array_name); //get last index of array

                    // unlink the former img
                    if (file_exists("../Nova/" . $_POST["imglink"])) {
                        unlink("../Nova/" . $_POST["imglink"]);
                    }

                    //make the address
                    $count1 = ($DbMgrp->countProduct()->rowCount());

                    $image_address1 = "Nova/assets/img/portfolio/" . $myname1 . $count1 . "." . $image_format;


                    //check for general errors
                    if (!$_FILES['avatar1']['error']) {
                        // check the size of the image
                        if ($image_size < 1024000) {
                            //check for type of the image
                            if (in_array($image_type, $accepted_format)) {
                                //uploade img in the folder in project root
                                move_uploaded_file($image_temp_name, "../" . $image_address1);

                                //create content object
                                $newimgaddress1 = "assets/img/portfolio/" . $myname1 . $count1 . "." . $image_format;

                                $id = $_POST["id"];

                                $product2 = new Portfolio($id, $newimgaddress1, $myname1, $mytext1);
                                $addproduct2 = $DbMgrp->updatePortfolio($product2);

                                if (isset($addproduct2)) {

                                    echo "<script>alert('you Update the product successfully.');</script>";
                                    echo "<script>window.location.href='../nova-portfolio.php';</script>";
                                } else {
                                    echo "<script>alert('Try again.');</script>";
                                    echo "<script>window.location.href='../nova-portfolio.php';</script>";
                                }
                            } else {
                                echo "<script>alert('invalid image format.Choose the new one.');</script>";
                                echo "<script>window.location.href='../nova-portfolio.php';</script>";
                            }
                        } else {
                            echo "<script>alert('the size of the image is big.Choose the new one.');</script>";
                            echo "<script>window.location.href='../nova-portfolio.php';</script>";
                        }
                    } else {
                        echo "<script>alert('there is an error for image, choose another one!');</script>";
                        echo "<script>window.location.href='../nova-portfolio.php';</script>";
                    }
                }
            } else {
                echo "<script>alert('fill out all fields based on errors.');</script>";
                echo "<script>window.location.href='../nova-portfolio.php';</script>";
            }
        } else {
            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-portfolio.php';</script>";
        }
    }
}









// to delete
if (!empty($_GET["action_portfolio"])) {



    if ($_GET["action_portfolio"] = "delete") {
        // get the row number
        $count1 = $DbMgrp->countProduct()->rowCount();

        // give the permission to delete
        if ($count1 > 1) {
            // remove the img

            if (file_exists("../Nova/" . $_GET["img_add"])) {
                unlink("../Nova/" . $_GET["img_add"]);

                $resultdelete = $DbMgrp->deleteProduct(trim($_GET["id"]));

                if (isset($resultdelete)) {

                    echo "<script>alert('the content is deleted successfully.');</script>";
                    echo "<script>window.location.href='../nova-portfolio.php';</script>";
                } else {
                    echo "<script>alert('problem in deleting.try again.');</script>";
                    echo "<script>window.location.href='../nova-portfolio.php';</script>";
                }
            } else {
                echo "<script>alert('img file does not exist.try again.');</script>";
                echo "<script>window.location.href='../nova-portfolio.php';</script>";
            }
        } else {
            echo "<script>alert('you are not allowed to delete.');</script>";
            echo "<script>window.location.href='../nova-portfolio.php';</script>";
        }
    }
}
