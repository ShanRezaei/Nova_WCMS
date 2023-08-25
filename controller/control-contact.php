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

// define variables for add section three
$textone1Err  =  "";
$textone1 =  "";
$isvalidateone1 = true;
$_SESSION['contact_one1_text_error'] =   "";


// define variables for update section three
$textone11Err  =  "";
$textone11 =  "";
$isvalidateone11 = true;
$_SESSION['contact_one11_text_error'] =   "";

// define variables for section five
$textfiveErr = $addressfiveErr =  "";
$textfive = $addressfive = "";
$isvalidatefive = true;
$_SESSION['contact_five_text_error'] = $_SESSION['contact_five_address_error'] =  "";

// define variables for section six
$typesixErr = $namesixErr = $placesixErr = "";
$typesix = $namesix = $placesix = "";
$isvalidatesix = true;
$_SESSION['contact_six_type_error'] = $_SESSION['contact_six_name_error'] = $_SESSION['contact_six_place_error'] = "";

// define variables for section two update
$texttwoErr = $nametwoErr =  "";
$texttwo = $nametwo = "";
$isvalidate2 = true;
$_SESSION['contact_two_text_error'] = $_SESSION['contact_two_name_error'] =  "";


// define variables for section five and four update
$text5Err = $link5Err =  "";
$text5 = $link5 = "";
$isvalidate5 = true;
$_SESSION['contact_5_text_error'] = $_SESSION['contact_5_link_error'] =  "";
$_SESSION['contact_4_text_error'] = $_SESSION['contact_4_link_error'] =  "";

// define variables for update section one
$text1Err = $icon1Err = $title1Err = "";
$text1 = $icon1 = $title1 = "";
$isvalidate1 = true;
$_SESSION['contact_1_text_error'] = $_SESSION['contact_1_icon_error'] =  "";
$_SESSION['contact_1_title_error']  =  "";

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
            if ($isvalidatefour === true  &&  $textfourErr == "" && $addressfourErr == "") {

                // add new content

                $id = "";
                $contactfour = new ContactFour($id, $textfour, $addressfour);
                $addfour = $DbMgcontact->addContactFour($contactfour);
                if (isset($addfour)) {

                    echo "<script>alert('you add new content successfully.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                }
            } else {

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
            if ($isvalidatefive === true  &&  $textfiveErr == "" && $addressfiveErr == "") {

                // add new content

                $id = "";
                $contactfive = new ContactFive($id, $textfive, $addressfive);
                $addfive = $DbMgcontact->addContactFive($contactfive);
                if (isset($addfive)) {

                    echo "<script>alert('you add new content successfully.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                }
            } else {

                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            }
        } else {

            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }
    } else if ($action_contact == "addsix") {


        if (!empty($_POST['iconsix']) && !empty($_POST['inputname']) && !empty($_POST['inputholder'])) {
            //do the validation

            // name validation
            if (!empty(trim($_POST["inputname"]))) {

                if (ctype_alpha(trim($_POST["inputname"]))) {

                    if (strlen(trim($_POST["inputname"])) >= 4) {


                        //check the uniquness
                        $name = $DbMgcontact->CountNameSix(trim($_POST["inputname"]));
                        if (isset($name)) {
                            $namesixErr = "Name should be Unique.";
                            $_SESSION['contact_six_name_error'] = "Name should be Unique.";

                            $isvalidatesix = false;
                        } else {
                            $namesix = trim($_POST["inputname"]);
                            $isvalidatesix = true;
                        }
                    } else {
                        $namesixErr = "it should be more than 4 characters.";
                        $_SESSION['contact_six_name_error'] = "it should be more than 4 characters.";

                        $isvalidatesix = false;
                    }
                } else {
                    $namesixErr = "it should be only characters.";
                    $_SESSION['contact_six_name_error'] = "it should be only characters.";

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
            } else {
                $typesixErr = "choose the type.";
                $_SESSION['contact_six_type_error'] = "choose the type.";

                $isvalidatesix = false;
            }


            // on submit

            if ($isvalidatesix === true  &&  $typesixErr == "" && $placesixErr == "" && $namesixErr == "") {

                // add new content

                $id = "";
                $contactsix = new ContactSix($id, $typesix, $namesix, $placesix);
                $addsix = $DbMgcontact->addContactSix($contactsix);
                if (isset($addsix)) {

                    echo "<script>alert('you add new content successfully.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                }
            } else {

                echo "<script>alert('fill out all fields correctly based on the errors.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            }
        } else {

            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }

        // update section two
    } else if ($action_contact == "editcontacttwo") {

        if (!empty($_POST['name']) && !empty($_POST['description'])) {
            // validate
            if (!empty(trim($_POST["name"]))) {

                if (strlen(trim($_POST["name"])) >= 4) {
                    $nametwo = trim($_POST["name"]);
                    $isvalidate2 = true;
                } else {
                    $nametwoErr = "it should be more than 4 characters.";
                    $_SESSION['contact_two_name_error'] = "it should be more than 4 characters.";

                    $isvalidate2 = false;
                }
            } else {
                $nametwoErr = "Enter the  placeholder content.";
                $_SESSION['contact_two_name_error'] = "Enter the placeholdercontent.";

                $isvalidate2 = false;
            }


            if (!empty(trim($_POST["description"]))) {

                if (strlen(trim($_POST["description"])) >= 4) {
                    $texttwo = trim($_POST["description"]);
                    $isvalidate2 = true;
                } else {
                    $texttwoErr = "it should be more than 4 characters.";
                    $_SESSION['contact_two_text_error'] = "it should be more than 4 characters.";

                    $isvalidate2 = false;
                }
            } else {
                $texttwoErr = "Enter the  placeholder content.";
                $_SESSION['contact_two_text_error'] = "Enter the placeholdercontent.";

                $isvalidate2 = false;
            }


            // on submit

            if ($isvalidate2 === true  &&  $texttwoErr == "" && $nametwoErr == "") {

                // update content

                $idtwo = $_POST["id"];
                $contacttwo = new ContactTwo($idtwo, $nametwo, $texttwo);
                $update2 = $DbMgcontact->updateContactTwo($contacttwo);
                if (isset($update2)) {

                    echo "<script>alert('you aupdated content successfully.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                }
            } else {

                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            }
        } else {

            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }

        // update section five
    } else if ($action_contact == "editcontactfive") {
        if (!empty($_POST['text']) && !empty($_POST['link'])) {

            if (!empty(trim($_POST["text"]))) {

                if (strlen(trim($_POST["text"])) >= 4) {
                    $text5 = trim($_POST["text"]);
                    $isvalidate5 = true;
                } else {
                    $text5Err = "it should be more than 4 characters.";
                    $_SESSION['contact_5_text_error'] = "it should be more than 4 characters.";

                    $isvalidate5 = false;
                }
            } else {
                $text5Err = "Enter the  placeholder content.";
                $_SESSION['contact_5_text_error'] = "Enter the placeholdercontent.";

                $isvalidate5 = false;
            }


            if (!empty(trim($_POST["link"]))) {

                if (strlen(trim($_POST["link"])) >= 2) {
                    $link5 = trim($_POST["link"]);
                    $isvalidate5 = true;
                } else {
                    $link5Err = "it should be more than 2 characters.";
                    $_SESSION['contact_5_text_error'] = "it should be more than 2 characters.";

                    $isvalidate5 = false;
                }
            } else {
                $link5Err = "Enter the  placeholder content.";
                $_SESSION['contact_5_text_error'] = "Enter the placeholdercontent.";

                $isvalidate5 = false;
            }



            // on submit

            if ($isvalidate5 === true  &&  $text5Err == "" && $link5Err == "") {

                // update content

                $id5 = $_POST["id"];
                $contact5 = new ContactFive($id5, $text5, $link5);
                $update5 = $DbMgcontact->updateContactFive($contact5);
                if (isset($update5)) {

                    echo "<script>alert('you aupdated content successfully.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                }
            } else {

                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            }
        } else {

            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }

        // update section four
    } else if ($action_contact == "editcontactfour") {
        if (!empty($_POST['text']) && !empty($_POST['link'])) {

            if (!empty(trim($_POST["text"]))) {

                if (strlen(trim($_POST["text"])) >= 4) {
                    $text5 = trim($_POST["text"]);
                    $isvalidate5 = true;
                } else {
                    $text5Err = "it should be more than 4 characters.";
                    $_SESSION['contact_4_text_error'] = "it should be more than 4 characters.";

                    $isvalidate5 = false;
                }
            } else {
                $text5Err = "Enter the  placeholder content.";
                $_SESSION['contact_4_text_error'] = "Enter the placeholdercontent.";

                $isvalidate5 = false;
            }


            if (!empty(trim($_POST["link"]))) {

                if (strlen(trim($_POST["link"])) >= 2) {
                    $link5 = trim($_POST["link"]);
                    $isvalidate5 = true;
                } else {
                    $link5Err = "it should be more than 2 characters.";
                    $_SESSION['contact_4_text_error'] = "it should be more than 2 characters.";

                    $isvalidate5 = false;
                }
            } else {
                $link5Err = "Enter the  placeholder content.";
                $_SESSION['contact_4_text_error'] = "Enter the placeholdercontent.";

                $isvalidate5 = false;
            }



            // on submit

            if ($isvalidate5 === true  &&  $text5Err == "" && $link5Err == "") {

                // update content

                $id4 = $_POST["id"];
                $contact4 = new ContactFour($id4, $text5, $link5);
                $update4 = $DbMgcontact->updateContactFour($contact4);
                if (isset($update4)) {

                    echo "<script>alert('you aupdated content successfully.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                }
            } else {

                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            }
        } else {

            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }
    } else if ($action_contact == "editcontactone") {

        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['iconone'])) {

            if (!empty(trim($_POST["title"]))) {

                if (strlen(trim($_POST["title"])) >= 2) {
                    $title1 = trim($_POST["title"]);
                    $isvalidate1 = true;
                } else {
                    $title1Err = "it should be more than 2 characters.";
                    $_SESSION['contact_1_title_error'] = "it should be more than 2 characters.";

                    $isvalidate1 = false;
                }
            } else {
                $title1Err = "Enter the  title.";
                $_SESSION['contact_1_title_error'] = "Enter the title.";

                $isvalidate1 = false;
            }


            if (!empty(trim($_POST["description"]))) {

                if (strlen(trim($_POST["description"])) >= 2) {
                    $text1 = trim($_POST["description"]);
                    $isvalidate1 = true;
                } else {
                    $text1Err = "it should be more than 2 characters.";
                    $_SESSION['contact_1_title_error'] = "it should be more than 2 characters.";

                    $isvalidate1 = false;
                }
            } else {
                $text1Err = "Enter the  description.";
                $_SESSION['contact_1_title_error'] = "Enter the description.";

                $isvalidate1 = false;
            }


            if (!empty(($_POST["iconone"]))) {


                $icon1 = trim($_POST["iconone"]);
                $isvalidate1 = true;
            } else {
                $icon1Err = "choose the icon.";
                $_SESSION['contact_1_icon_error'] = "choose the icon.";

                $isvalidate1 = false;
            }


            // on submit

            if ($isvalidate1 === true  &&  $text1Err == "" && $icon1Err == "" && $title1Err == "") {

                // update content

                $id1 = $_POST["id"];
                $contact1 = new ContactOne($id1, $title1, $text1, $icon1);
                $update1 = $DbMgcontact->updateContactOne($contact1);
                if (isset($update1)) {

                    echo "<script>alert('you aupdated content successfully.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                }
            } else {

                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            }
        } else {

            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }
    } else if ($action_contact == "addthree") {
        if (!empty($_POST['linkname']) &&  !empty($_POST['iconone'])) {

            if (!empty(trim($_POST["linkname"]))) {

                if (strlen(trim($_POST["linkname"])) >= 4) {
                    $textone1 = trim($_POST["linkname"]);
                    $isvalidateone1 = true;
                } else {
                    $textone1Err = "it should be more than 4 characters.";
                    $_SESSION['contact_one1_text_error'] = "it should be more than 4 characters.";

                    $isvalidateone1 = false;
                }
            } else {
                $textone1Err = "Enter the  address of the link.";
                $_SESSION['contact_one1_text_error'] = "Enter the address of the link.";

                $isvalidateone1 = false;
            }


            // on submit

            if ($isvalidateone1 === true  &&  $textone1Err == "") {

                // add new content

                $id = "";
                $contact3 = new ContactThree($id, $_POST['iconone'], $textone1);
                $add3 = $DbMgcontact->addContactThree($contact3);
                if (isset($add3)) {

                    echo "<script>alert('you add new content successfully.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                }
            } else {

                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            }
        } else {

            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }
    } else if ($action_contact == "editthree") {
        if (!empty($_POST['linkname'])) {

            //validation
            if (!empty(trim($_POST["linkname"]))) {

                if (strlen(trim($_POST["linkname"])) >= 4) {
                    $textone11 = trim($_POST["linkname"]);
                    $isvalidateone11 = true;
                } else {
                    $textone11Err = "it should be more than 4 characters.";
                    $_SESSION['contact_one11_text_error'] = "it should be more than 4 characters.";

                    $isvalidateone11 = false;
                }
            } else {
                $textone11Err = "Enter the  address of the link.";
                $_SESSION['contact_one11_text_error'] = "Enter the address of the link.";

                $isvalidateone11 = false;
            }


            if ($isvalidateone11 === true  &&  $textone11Err == "") {

                // update content

                $id = $_POST["id"];
                $icon = "";
                $contact4 = new ContactThree($id, $icon, $textone11);
                $update4 = $DbMgcontact->UpdateContactThree($contact4);
                if (isset($update4)) {

                    echo "<script>alert('you update content successfully.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                } else {
                    echo "<script>alert('Try again.');</script>";
                    echo "<script>window.location.href='../nova-contact.php';</script>";
                }
            } else {

                echo "<script>alert('fill out all fields correctly.');</script>";
                echo "<script>window.location.href='../nova-contact.php';</script>";
            }
        } else {

            echo "<script>alert('fill out all fields.');</script>";
            echo "<script>window.location.href='../nova-contact.php';</script>";
        }
    }
}


//////////////////////// to delete////////////////////////////////////

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
