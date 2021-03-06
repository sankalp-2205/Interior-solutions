
<?php
session_start();
include ('../connection.php');
include ('comments.php');
if(!array_key_exists("adminemail",$_SESSION))
{
    header("location:login.php");
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
        <title>Viewed Contacts</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"></script>
        <style>
                @media screen and (max-width: 845px){
    table{
        display : block;
        overflow-x : auto;
        white-space : nowrap;
    }
}
        </style>
        
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Ultimate Designs</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <form id = "logoutform" method = "POST">
                            <input name = "logout" type="hidden" value = "true" /> 
                            <button id = "logout" type = "button" class="dropdown-item">Logout</button>
                        </form>
                        
                    </div>
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
                            <a class="nav-link" href="subscribers.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Subscribers
                            </a>
                            <a class="nav-link" href="subscriber_requests.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Subscriber Requests
                            </a>
                            <a class="nav-link active" href="viewed_contact.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Contact Viewed
                            </a>
                            <a class="nav-link" href="users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="categories.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Categories - <?php echo displaycategoriesnum() ;?>
                            </a>
                            <a class="nav-link" href="categories.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Sub-Categories - <?php echo displaysubcategoriesnum() ;?>
                            </a>
                            <a class="nav-link" href="categories.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Topics - <?php echo displaytopicsnum() ;?>
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['adminemail'] ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Contact Viewed</h1>
                        <br>
                        <div class="container">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
                <th>Viewed By</th>
                <th>Viewed Of</th>
                <th>Topic</th>
                <th>Sub Category</th>
                <th>Category</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            <?php display_views(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Viewed By</th>
                <th>Viewed Of</th>
                <th>Topic</th>
                <th>Sub Category</th>
                <th>Category</th>
                <th>Time</th>
            </tr>
        </tfoot>
    </table>
</div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script>
                     $("#logout").click(function (event) {
            event.preventDefault();
            var datatopost = $("#logoutform").serializeArray();
  console.log(datatopost);
                     $.ajax({
                     url: "logoutcode.php",
                     type: "POST",
                     data: datatopost,
                     success: function (data) {
                         console.log(data);
                         location.href = "login.php";
    },
    error: function () {
            alert("Can't log out");
    },
             })
    })
        </script>
        <script>
            $(document).ready(function() {
    $('#example').DataTable();
} );
        </script>
    </body>
</html>
