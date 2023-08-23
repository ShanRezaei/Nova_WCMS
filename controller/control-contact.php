<?php
// to include classes and start session
include "../head.inc.php";

// create object of dbmanager to access functions
$DbMgcontact = new ContactManager();

// define variables for section four
$textfourErr = $addressfourErr =  "";
$textfour = $addressfour = "";
$isvalidatefour = true;
$_SESSION['contact_four_text_error'] = $_SESSION['contact_four_address_error'] =  "";

// define variables for section five
$textfiveErr = $addressfiveErr =  "";
$textfive = $addressfive = "";
$isvalidatefive = true;
$_SESSION['contact_five_text_error'] = $_SESSION['contact_five_address_error'] =  "";

// define variables for section six
$typesixErr = $namesixErr = $placesixErr= "";
$typesix = $namesix = $placesix="";
$isvalidatesix = true;
$_SESSION['contact_six_type_error'] = $_SESSION['contact_six_name_error'] = $_SESSION['contact_six_place_error']= "";






if (isset($_REQUEST['action-contact'])) {
    $action_contact = $_REQUEST['action-contact'];
}

if (!empty($action_contact)) {
    if ($action_contact == "addfour") {

        // do the validation

        if (!empty($_POST['linkname']) && !empty($_POST['addressname'])) {

            // text validation
            if (!empty(trim($_POST["linkname"]))) {

                if (strlen(trim($_POST["linkname"])) >= 4) {
                    $textfour = trim($_POST["linkname"]);
                    $isvalidatefour = true;
                } else {
                    $textfourErr = "the title should be more than 4 characters.";
                    $_SESSION['contact_four_text_error'] = "the title should be more than 4 characters.";

                    $isvalidatefour = false;
                }
            } else {
                $textfourErr = "Enter the  title.";
                $_SESSION['contact_four_text_error'] = "Enter the title.";

                $isvalidatefour = false;
            }

            // address validation
            if (!empty(trim($_POST["addressname"]))) {

                if (strlen(trim($_POST["addressname"])) >= 4) {
                    $addressfour = trim($_POST["addressname"]);
                    $isvalidatefour = true;
                } else {
                    $addressfourErr = "it should be more than 4 characters.";
                    $_SESSION['contact_four_address_error'] = "it should be more than 4 characters.";

                    $isvalidatefour = false;
                }
            } else {
                $addressfourErr = "Enter the  address.";
                $_SESSION['contact_four_address_error'] = "Enter the address.";

                $isvalidatefour = false;
            }

            //on submit
            if ($isvalidatefour === true  &&  $textfourErr == "" && $addressfourErr == "" ) {

                // add new content

                $contactfour = new ContactFour($id, $textfour, $addressfour);
                $addfour = $DbMgcontact->addContactFour($contactfour);
                if (isset($addfour)) {

                    echo "<script>alert('you add new content successfully.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                }


            }else{
            
                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            

        }
        } else {

            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }
    } else if ($action_contact == "addfive") {

        // do the validation
        

        if (!empty($_POST['linknamef']) && !empty($_POST['addressnamef'])) {

            // text validation
            if (!empty(trim($_POST["linknamef"]))) {

                if (strlen(trim($_POST["linknamef"])) >= 4) {
                    $textfive = trim($_POST["linknamef"]);
                    $isvalidatefive = true;
                } else {
                    $textfiveErr = "the title should be more than 4 characters.";
                    $_SESSION['contact_five_text_error'] = "the title should be more than 4 characters.";

                    $isvalidatefive = false;
                }
            } else {
                $textfiveErr = "Enter the  title.";
                $_SESSION['contact_five_text_error'] = "Enter the title.";

                $isvalidatefive = false;
            }

            // address validation
            if (!empty(trim($_POST["addressnamef"]))) {

                if (strlen(trim($_POST["addressnamef"])) >= 4) {
                    $addressfive = trim($_POST["addressnamef"]);
                    $isvalidatefive = true;
                } else {
                    $addressfiveErr = "it should be more than 4 characters.";
                    $_SESSION['contact_five_address_error'] = "it should be more than 4 characters.";

                    $isvalidatefive = false;
                }
            } else {
                $addressfiveErr = "Enter the  address.";
                $_SESSION['contact_five_address_error'] = "Enter the address.";

                $isvalidatefive = false;
            }

            //on submit
            if ($isvalidatefive === true  &&  $textfiveErr == "" && $addressfiveErr == "" ) {

                // add new content

                $contactfive = new ContactFive($id, $textfive, $addressfive);
                $addfive = $DbMgcontact->addContactFive($contactfive);
                if (isset($addfive)) {

                    echo "<script>alert('you add new content successfully.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                }


            }else{
            
                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            

        }
        } else {

            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }



    }else if($action_contact == "addsix"){


        if (!empty($_POST['iconsix']) && !empty($_POST['inputname']) && !empty($_POST['inputholder'])) {
             //do the validation

             // name validation
            if (!empty(trim($_POST["inputname"]))) {

                if (strlen(trim($_POST["inputname"])) >= 4) {
                    $namesix = trim($_POST["inputname"]);
                    $isvalidatesix = true;
                } else {
                    $namesixErr = "it should be more than 4 characters.";
                    $_SESSION['contact_six_name_error'] = "it should be more than 4 characters.";

                    $isvalidatesix = false;
                }
            } else {
                $namesixErr = "Enter the  name.";
                $_SESSION['contact_six_name_error'] = "Enter the name.";

                $isvalidatesix = false;
            }

            // place validation
            if (!empty(trim($_POST["inputholder"]))) {

                if (strlen(trim($_POST["inputholder"])) >= 4) {
                    $placesix = trim($_POST["inputholder"]);
                    $isvalidatesix = true;
                } else {
                    $placesixErr = "it should be more than 4 characters.";
                    $_SESSION['contact_six_place_error'] = "it should be more than 4 characters.";

                    $isvalidatesix = false;
                }
            } else {
                $placesixErr = "Enter the  placeholder content.";
                $_SESSION['contact_six_place_error'] = "Enter the placeholdercontent.";

                $isvalidatesix = false;
            }

            //type validation

            if (!empty(trim($_POST["iconsix"]))) {
                $typesix = trim($_POST["iconsix"]);
                    $isvalidatesix = true;

            }else {
                $typesixErr = "choose the type.";
                $_SESSION['contact_six_type_error'] = "choose the type.";

                $isvalidatesix = false;
            }


            // on submit

            if ($isvalidatesix === true  &&  $typesixErr == "" && $placesixErr == "" && $namesixErr == "" ) {

                // add new content

                $contactsix = new ContactSix($id, $typesix, $namesix,$placesix);
                $addsix = $DbMgcontact->addContactSix($contactsix);
                if (isset($addsix)) {

                    echo "<script>alert('you add new content successfully.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                }


            }else{
            
                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            

        }





        }else {

            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }

    }
}


// to delete
if (!empty($_GET["action_contact"])) {
    if ($_GET["action_contact"] = "deleteIcon") {
        // get the row number
        $count1 = $DbMgcontact->countLink()->rowCount();
        // give the permission to delete
        if ($count1 > 1) {
            $resultdelete = $DbMgcontact->deleteLink(trim($_GET["id"]));

            if (isset($resultdelete)) {

                echo "<script>alert('the content is deleted successfully.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            } else {
                echo "<script>alert('problem in deleting.try again.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            }
        } else {
            echo "<script>alert('you are not allowed to delete.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }
    }
}

if (!empty($_GET["action_contactfour"])) {
    if ($_GET["action_contactfour"] = "deleteusefullink") {
        // get the row number
        $count2 = $DbMgcontact->countFour()->rowCount();
        // give the permission to delete
        if ($count2 > 1) {
            $resultdelete1 = $DbMgcontact->deleteFour(trim($_GET["id"]));

            if (isset($resultdelete1)) {

                echo "<script>alert('the content is deleted successfully.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            } else {
                echo "<script>alert('problem in deleting.try again.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            }
        } else {
            echo "<script>alert('you are not allowed to delete.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }
    }
}

if (!empty($_GET["action_contactfive"])) {
    if ($_GET["action_contactfive"] = "deletecontactservice") {
        // get the row number
        $count3 = $DbMgcontact->countFive()->rowCount();
        // give the permission to delete
        if ($count3 > 1) {
            $resultdelete2 = $DbMgcontact->deleteFive(trim($_GET["id"]));

            if (isset($resultdelete2)) {

                echo "<script>alert('the content is deleted successfully.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            } else {
                echo "<script>alert('problem in deleting.try again.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            }
        } else {
            echo "<script>alert('you are not allowed to delete.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }
    }
}

if (!empty($_GET["action_contactsix"])) {
    if ($_GET["action_contactsix"] = "deleteinput") {
        // get the row number
        $count4 = $DbMgcontact->countSix()->rowCount();
        // give the permission to delete
        if ($count4 > 1) {
            $resultdelete3 = $DbMgcontact->deleteSix(trim($_GET["id"]));

            if (isset($resultdelete3)) {

                echo "<script>alert('the content is deleted successfully.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            } else {
                echo "<script>alert('problem in deleting.try again.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            }
        } else {
            echo "<script>alert('you are not allowed to delete.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }
    }
}
