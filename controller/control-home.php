<?php
// to include classes and start session
include "../head.inc.php";

// create object of dbmanager to access functions
$DbMgrhome = new HomeManager();


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