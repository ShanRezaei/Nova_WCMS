<?php
// to include classes and start session
include "../head.inc.php";


// define variables
$titleoneErr = $titletwoErr = $textErr = "";
$titleone = $titletwo = $text = "";
$isvalidate = true;
$_SESSION['abouttwo_titleone_error'] = $_SESSION['abouttwo_titletwo_error'] = $_SESSION['abouttwo_text_error']  =  "";

// create object of dbmanager to access functions
$DbMgrabouttwo = new AboutManager();

if (isset($_REQUEST['action-abouttwo'])) {
    $action_abouttwo = $_REQUEST['action-abouttwo'];
}

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