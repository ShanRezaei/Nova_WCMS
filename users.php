<?php
// to start our session and include all classes
include "head.inc.php";
$DbMngall = new DbManager();

?>

<?php
if (isset( $_SESSION["login-access"]) &&  $_SESSION["login-access"] == "1") {
    //unset($_SESSION['this_user_login_new']);
    if($_SESSION["accesor_level"]== "Admin"){
        $showu = "none";
        $showt = "block";
    }
    
}
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container" >
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">All Users</h3></div>
                                    <div class="card-body" style="min-width: 100%;">

                                    <div class="alert alert-warning" role="alert" style="display:<?php echo isset($showu) ? $showu : "block"; ?>">
                                Log in as Admin to see the users!
                            </div>

                                    <!-- here I should populate all users with the action od delete button inside the table-->

                                        <table class="table table-hover" style="display:<?php echo isset($showt) ? $showt : "none"; ?>" >
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Email</th>
                                                    <th>Access</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($DbMngall->getAllUser()  as $allusers) : ?>

                                                <tr>
                                                <td><?= $allusers->getId() ?></td>
                                                    <td><?= $allusers->getFirstName() ?></td>
                                                    <td><?= $allusers->getLastName() ?></td>
                                                    <td><?= $allusers->getEmail() ?></td>
                                                    <td><?= $allusers->getLevel() ?></td>
                                                    <td><?= $allusers->getStat() ?></td>
                                                    <td><?php if($allusers->getStat()==1) : ?>
                                                        <a class="btn btn-warning " href="controller/controll.php ? action1=deactive & id=<?= $allusers->getId() ?>"> deactive</a>
                                                    <?php else : ?>
                                                        <a class="btn btn-warning " href="controller/controll.php ? action1=active & id=<?= $allusers->getId() ?>"> active</a>
                                                    <?php endif; ?>
                                                    
                                                    
                                                    </td>


                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>


                                        </table>

                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="Dashboard.php">Back to the main page!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Nova 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
