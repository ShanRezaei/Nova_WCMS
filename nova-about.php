<?php
// to start our session and include all classes
include "head.inc.php";
$_SESSION['page'] = "index";
//$DbMngpost = new DbManager();
$DbMngabout = new AboutManager();

?>
<?php
if (isset($_SESSION["login-access"]) &&  $_SESSION["login-access"] == "1") {
    //unset($_SESSION['this_user_login_new']);

    //$shows = "none";
    $shown = "block";
}
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
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Nova <br>
            <h6>Focus On What Matters</h6>
        </a>




        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
                    <!-- <li><hr class="dropdown-divider" /></li> -->
                    <!-- log out process -->

                    <li>
                        <form action="controller/controll.php" method="post">
                            <input type="hidden" name="action" value="logout">

                            <input type="submit" name="logout" value="Log out" class="btn btn-warning" style="font-weight: 600;">
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div> -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="users.php">All Users</a>
                                        <a class="nav-link" href="login.php">Login</a>
                                        <a class="nav-link" href="register.php">Register</a>
                                        <!-- <a class="nav-link" href="password.html">Forgot Password</a> -->
                                    </nav>
                                </div>
                                <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div> -->
                            </nav>


                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages" style="display:<?php echo isset($shown) ? $shown : "none"; ?>">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth1" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Nova pages
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="nova-home.php">Home</a>
                                        <a class="nav-link" href="nova-about.php">About</a>
                                        <a class="nav-link" href="nova-service.php">Service</a>
                                        <a class="nav-link" href="nova-portfolio.php">Portfolio</a>
                                        <a class="nav-link" href="nova-team.php">Team</a>
                                        <a class="nav-link" href="nova-contact.php">Contact</a>
                                        <!-- <a class="nav-link" href="password.html">Forgot Password</a> -->
                                    </nav>
                                </div>
                                <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div> -->
                            </nav>
                        </div>
                        <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo isset($_SESSION["accesor_level"]) ? $_SESSION["accesor_level"] : "Nova"; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"> Nova Dashboard </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Welcome to Nova Dashboard</li>
                    </ol>
                    

                    <div class="row" style="justify-content: center;">

                     
                          <!-- --------------------about one ------------>
                        <div class="col-lg-10">
                            <h3 class="text-center font-weight-light my-4">Nova About</h3>
                            <div class="alert alert-warning" role="alert" style="display:<?php echo isset($showu) ? $showu : "block"; ?>">
                                Log in to see the Table!
                            </div>
                            <table class="table table-hover" style="display:<?php echo isset($showt) ? $showt : "none"; ?> margin-left:30%" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>

                                        <th>Update</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($DbMngabout->getAllAboutOne()  as $allaboutone) : ?>

                                        <tr>
                                            <td><?= $allaboutone->getId() ?></td>
                                            <td> <img src="Nova/<?= $allaboutone->getImg() ?>" alt="myimg" width=6%></td>



                                            <td><a class="btn btn-warning " href="#" data-bs-toggle="modal" data-bs-target="#editModalaboutone" data-id="<?= $allaboutone->getId() ?>" data-img="<?= $allaboutone->getImg() ?>"> Update</a></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>


                            </table>
                            <!-- add modal by two tags -->
                            <!-- <a href="#" class="btn btn-primary" id="addp" data-bs-toggle="modal" data-bs-target="#addModal">Add New Product</a> -->

                        </div>



                        <!------------------------ about two -------------------->
                        <div class="col-lg-10">
                            <h3 class="text-center font-weight-light my-4">Nova About Descriptions</h3>
                            <div class="alert alert-warning" role="alert" style="display:<?php echo isset($showu) ? $showu : "block"; ?>">
                                Log in to see the Table!
                            </div>
                            <table class="table table-hover" style="display:<?php echo isset($showt) ? $showt : "none"; ?>">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Title</th>
                                        <th>Second Title</th>
                                        <th>Description</th>

                                        <th>Delete</th>
                                        <th>Update</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($DbMngabout->getAllAboutTwo()  as $allabouttwo) : ?>

                                        <tr>
                                            <td><?= $allabouttwo->getId() ?></td>
                                            <td> <?= $allabouttwo->getTitleOne() ?></td>
                                            <td> <?= $allabouttwo->getTitleTwo() ?></td>
                                            <td> <?= $allabouttwo->getText() ?></td>


                                            <td><?php if ($_SESSION["accesor_level"] == "Admin") : ?>
                                                    <a onclick="javascript:return confirm('Are You sure you want to delete?');" class="btn btn-warning " href="controller/control-about.php ? action_about=delete & id=<?= $allabouttwo->getId() ?>  "> Delete</a>

                                                <?php endif; ?>


                                            </td>

                                            <td><a class="btn btn-warning " href="#" data-bs-toggle="modal" data-bs-target="#editModalabouttwo" data-id="<?= $allabouttwo->getId() ?>" data-titleone="<?= $allabouttwo->getTitleOne() ?>"  data-titletwo="<?= $allabouttwo->getTitleTwo() ?>"  data-text="<?= $allabouttwo->getText() ?>"> Update</a></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>


                            </table>
                            <!-- add modal by two tags -->
                            <a href="#" class="btn btn-primary" id="addp" data-bs-toggle="modal" data-bs-target="#addModalabouttwo">Add New Description</a> 

                        </div>


                        <!----------------------- about three ---------------------->

                        <div class="col-lg-10">
                            <h3 class="text-center font-weight-light my-4">Nova About Call us</h3>
                            <div class="alert alert-warning" role="alert" style="display:<?php echo isset($showu) ? $showu : "block"; ?>">
                                Log in to see the Table!
                            </div>
                            <table class="table table-hover" style="display:<?php echo isset($showt) ? $showt : "none"; ?>">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Text</th>
                                        <th>Link</th>
                                        <th>LinkText</th>

                                        <th>Update</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($DbMngabout->getAllAboutThree()  as $allaboutthree) : ?>

                                        <tr>
                                            <td><?= $allaboutthree->getId() ?></td>
                                            <td> <?= $allaboutthree->getTitle() ?></td>
                                            <td> <?= $allaboutthree->getText() ?></td>
                                            <td> <?= $allaboutthree->getLink() ?></td>
                                            <td> <?= $allaboutthree->getLinkText() ?></td>



                                            <td><a class="btn btn-warning " href="#" data-bs-toggle="modal" data-bs-target="#editModalaboutthree" data-linktext="<?= $allaboutthree->getLinkText() ?>" data-link="<?= $allaboutthree->getLink() ?>" data-text="<?= $allaboutthree->getText() ?>" data-id="<?= $allaboutthree->getId() ?>" data-title="<?= $allaboutthree->getTitle() ?>" > Update</a></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>


                            </table>
                            <!-- add modal by two tags -->
                            <!-- <a href="#" class="btn btn-primary" id="addp" data-bs-toggle="modal" data-bs-target="#addModal">Add New Product</a> -->

                        </div>






                    </div>


                    <div class="card mb-4">

                    </div>
                </div>
            </main>
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
    <div class="modal fade" id="addModalabouttwo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



                        <form id="form1" method="POST" action="controller/control-about.php" enctype="multipart/form-data">
                            <!-- hidden input -->
                            <input type="hidden" name="action-abouttwo" value="addabouttwo">


                            <!----------------- general inputs--------------------------- -->
                            <div class="mb-3">

                                <input type="text" class="form-control myinput" name="titleone" placeholder="First Title" min="2" />
                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset($_SESSION['abouttwo_titleone_error']) ? $_SESSION['abouttwo_titleone_error'] : ""; ?></span>
                            </div>
                            <div class="mb-3">

                                <input type="text" class="form-control myinput" name="titletwo" id="lname" placeholder="Second Title" min="2" />
                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset( $_SESSION['abouttwo_titletwo_error']) ?  $_SESSION['abouttwo_titletwo_error']: ""; ?></span>
                            </div>

                            <div class="mb-3">

                                

                            <input type="text" class="form-control myinput" name="text" id="lname" placeholder="Description" min="2" />
                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset($_SESSION['abouttwo_text_error']) ? $_SESSION['abouttwo_text_error']: ""; ?></span>
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



    <!-------------------------------- ----------------edit modal --------------------------------------------->

    <!-- --------------------------table three-------------------------- -->

    <div class="modal fade" id="editModalaboutthree">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Content</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- create our form to do the registration -->
                    <!-- --------------------main body of the form---------------- -->
                    <div class="container" id="mymain">



                        <form id="form2" method="POST" action="controller/control-about.php" enctype="multipart/form-data">
                            <!-- hidden input -->
                            <input type="hidden" name="action-aboutthree" value="editaboutthree">

                            <input type="hidden" name="id">
                            <!----------------- general inputs--------------------------- -->
                            <div class="mb-3">
                            <label  for="title"style="color: #146c43; font-weight:600" >Title:</label>

                                <input type="text" class="form-control myinput" name="title" min="2" id="title" />
                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset($_SESSION['aboutthree_title_error']) ? $_SESSION['aboutthree_title_error'] : ""; ?></span>
                            </div>
                            <div class="mb-3">
                            <label  for="lname"style="color: #146c43; font-weight:600" >Description:</label>

                                <input type="text" class="form-control myinput" name="text" id="lname" min="2" />
                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset($_SESSION['aboutthree_text_error']) ? $_SESSION['aboutthree_text_error'] : ""; ?></span>
                            </div>

                            <div class="mb-3">
                            <label  for="avatar"style="color: #146c43; font-weight:600" >Link:</label>

                                <input type="text" class="form-control myinput" id="avatar" name="link" />

                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset($_SESSION['aboutthree_link_error']) ? $_SESSION['aboutthree_link_error'] : ""; ?></span>
                            </div>

                            <div class="mb-3">
                            <label  for="avatar1"style="color: #146c43; font-weight:600" >Link Text:</label>

                                <input type="text" class="form-control myinput" id="avatar1" name="linktext" />

                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset($_SESSION['aboutthree_linktext_error']) ? $_SESSION['aboutthree_linktext_error'] : ""; ?></span>
                            </div>


                            <!------------------------- buttons--------------------------- -->
                            <div>
                                <input type="submit" value="Update" name="submit3" class="btn btn-success mystyle2" />

                            </div>
                        </form>

                    </div>



                </div>
            </div>
        </div>

    </div>



    <!-- ----------------------------------table two-------------------------- -->

    <div class="modal fade" id="editModalabouttwo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Content</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- create our form to do the registration -->
                    <!-- --------------------main body of the form---------------- -->
                    <div class="container" id="mymain">



                        <form id="form2" method="POST" action="controller/control-about.php" enctype="multipart/form-data">
                            <!-- hidden input -->
                            <input type="hidden" name="action-abouttwo" value="editabouttwo">

                            <input type="hidden" name="id">
                            <!----------------- general inputs--------------------------- -->
                            <div class="mb-3">
                            <label  for="title"style="color: #146c43; font-weight:600" >First Title:</label>

                                <input type="text" class="form-control myinput" name="ftitle" min="2" id="title" />
                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset($_SESSION['abouttwo_title1_error']) ? $_SESSION['abouttwo_title1_error'] : ""; ?></span>
                            </div>
                            <div class="mb-3">
                            <label  for="lname"style="color: #146c43; font-weight:600" >Second Title:</label>

                                <input type="text" class="form-control myinput" name="stitle" id="lname" min="2" />
                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset($_SESSION['abouttwo_title2_error']) ? $_SESSION['abouttwo_title2_error'] : ""; ?></span>
                            </div>

                            <div class="mb-3">
                            <label  for="avatar"style="color: #146c43; font-weight:600" >Description:</label>

                                <input type="text" class="form-control myinput" id="avatar" name="text" />

                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset($_SESSION['abouttwo_text2_error']) ? $_SESSION['abouttwo_text2_error'] : ""; ?></span>
                            </div>

                            
                            <!------------------------- buttons--------------------------- -->
                            <div>
                                <input type="submit" value="Update" name="submit3" class="btn btn-success mystyle2" />

                            </div>
                        </form>

                    </div>



                </div>
            </div>
        </div>

    </div>


    <!-- ----------------------------------table One-------------------------- -->

    <div class="modal fade" id="editModalaboutone">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Content</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- create our form to do the registration -->
                    <!-- --------------------main body of the form---------------- -->
                    <div class="container" id="mymain">



                        <form id="form2" method="POST" action="controller/control-about.php" enctype="multipart/form-data">
                            <!-- hidden input -->
                            <input type="hidden" name="action-abouttwo" value="editaboutone">

                            <input type="hidden" name="id">
                            <!----------------- general inputs--------------------------- -->
                            
                            

                            <div class="mb-3">
                            <label  for="avatar"style="color: #146c43; font-weight:600" >Image:</label>

                                <input type="file" class="form-control myinput" id="avatar" name="avatar" />

                                <!-- error text to show -->
                                <span style="color:chocolate"><?php echo isset($_SESSION['abouttwo_text2_error']) ? $_SESSION['abouttwo_text2_error'] : ""; ?></span>
                            </div>

                            <!-- with jquery we gave the value to the img src part -->
                            <img id="imgs" src="" alt="myimg" width=20%   style="margin-bottom: 2%;" >

                            <input type="hidden" name="imglink">
                            
                            <!------------------------- buttons--------------------------- -->
                            <div>
                                <input type="submit" value="Update" name="submit3" class="btn btn-success mystyle2" />

                            </div>
                        </form>

                    </div>



                </div>
            </div>
        </div>

    </div>















    <!-- javascript links -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <!-- jquery link -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/about.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>