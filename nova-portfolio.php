<?php
// to start our session and include all classes
include "head.inc.php";
$DbMngall = new PortfolioManager();

?>
<?php
if (isset($_SESSION["login-access"]) &&  $_SESSION["login-access"] == "1") {
    //unset($_SESSION['this_user_login_new']);

    $showu = "none";
    $showt = "block";
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
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Nova Portfolio</h3>
                                </div>
                                <div class="card-body" style="min-width: 100%;">

                                    <div class="alert alert-warning" role="alert" style="display:<?php echo isset($showu) ? $showu : "block"; ?>">
                                        Log in to see the Table!
                                    </div>

                                    <!-- here I should populate all users with the action od delete button inside the table-->

                                    <table class="table table-hover" style="display:<?php echo isset($showt) ? $showt : "none"; ?>">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Delete</th>
                                                <th>Update</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($DbMngall->getAllProduct()  as $all) : ?>

                                                <tr>
                                                    <td><?= $all->getId() ?></td>
                                                    <td><?= $all->getImg() ?></td>
                                                    <td><?= $all->getName() ?></td>
                                                    <td><?= $all->getText() ?></td>

                                                    <td><?php if ($_SESSION["accesor_level"] == "Admin") : ?>
                                                            <a class="btn btn-warning " href="controller/control-portfolio.php ? action_portfolio=delete & id=<?= $all->getId() ?>"> Delete</a>

                                                        <?php endif; ?>


                                                    </td>

                                                    <td><a class="btn btn-warning " href="controller/control-portfolio.php ? action_portfolio=update & id=<?= $all->getId() ?>"> Update</a></td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>


                                    </table>

                                    

                                        <!-- add modal by two tags -->
                                       <a href="#" class="btn btn-primary" id="addp" data-bs-toggle="modal" data-bs-target="#addModal">Add New Product</a>
                                   

                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="index.php">Back to the main page!</a></div>
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




 <!---------------------------------------- modals--------------------------------- -->
    <!-- Add new  modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add new Content</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- create our form to do the registration -->
                    <!-- --------------------main body of the form---------------- -->
                    <div class="container" id="mymain">



                        <form id="form1" method="POST" action="controller/control-portfolio.php" enctype="multipart/form-data">
                            <!-- hidden input -->
                            <input type="hidden" name="action-portfolio" value="addproduct">

                           
                            <!----------------- general inputs--------------------------- -->
                            <div class="mb-3">

                                <input type="text" class="form-control myinput" name="name"  placeholder="Title" min="2" />
                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset($_SESSION['myfirsterror']) ? $_SESSION['myfirsterror'] : ""; ?></span>
                            </div>
                            <div class="mb-3">

                                <input type="text" class="form-control myinput" name="description" id="lname" placeholder="Description" min="2" />
                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset($_SESSION['mylasterror']) ? $_SESSION['mylasterror'] : ""; ?></span>
                            </div>
                            
                            <div class="mb-3">

                                <input type="file" class="form-control myinput" id="avatar" name="avatar" />

                                <!-- error text to show -->
                                <span style="color:chocolate"><span style="color:chocolate"><?php echo isset($_SESSION['myavatarerror']) ? $_SESSION['myavatarerror'] : ""; ?></span></span>
                            </div>



                            <!------------------------- buttons--------------------------- -->
                            <div>
                                <input type="submit" value="Submit" name="submit2" class="btn btn-success mystyle2" />

                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </div>

    </div>


























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>