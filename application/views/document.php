<?php
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/application/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/application/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Legitimately
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="/application/assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link href="/application/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">Document</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon" disabled>
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="container-fluid">


          <div class="row">
           
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Critical Sentences</h4>
                  <p class="card-category">Critical Sentences In the Document which can harm you</p>
                 <mark> <span class="label label-default" style="color: red;"><?php echo round($score,2);?></span></mark>
                </div>

                <div class="card-body table-responsive">
                 <form class="form2" method="post" action="/Welcome/finalResult"> 
                <div class="form-group">
                  <?php 
                    foreach ($analysisData as $key => $value) {
                      if($value['severity_id']==2)
                      {
                        $colorCode="red";
                      }elseif($value['severity_id']==1){
                        $colorCode="blue";
                      }elseif($value['severity_id']==0){
                        $colorCode="green";
                      } echo 
                      ' <span style="">
                  <font color="'.$colorCode.'">'.$value['sentence'].'</font>
                </span>';
                    }
                  ?>
                </div>
                <button class="btn btn-danger" type="submit" name="Accept">Accept</button>
                <button class="btn btn-success" type="submit" name="Deny">Deny</button>
                </form>
                </div>

              </div>

              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Summary</h4>
                  <p class="card-category">Summary of the Document Uploaded</p>
                </div>

                <div class="card-body table-responsive">
                 <form class="form2" method="post" action="/Welcome/finalResult"> 
                <div class="form-group">
                  <?php 
                    foreach ($summary as $key => $value) {
                     echo 
                      ' <span style="">'.$value['summary'].'</span>';
                    }
                  ?>
                </div>
                </form>
                </div>

              </div>
            </div>
            
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  Legitimiately
                </a>
              </li>
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
              <li>
                <a href="#">
                  Blog
                </a>
              </li>
              <li>
                <a href="#">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            <a href="#" target="_blank">Legitimiately</a> for a better analysis of your agreement.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="#" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>

        <li class="button-container">
          <a href="#" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>
  <script src="/application/assets/js/core/jquery.min.js"></script>
  <script src="/application/assets/js/core/popper.min.js"></script>
  <script src="/application/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="/application/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="/application/assets/js/plugins/moment.min.js"></script>
  <script src="/application/assets/js/plugins/jquery.validate.min.js"></script>
  <script src="/application/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <script src="/application/assets/js/plugins/bootstrap-selectpicker.js"></script>
  <script src="/application/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <script src="/application/assets/js/plugins/jquery.dataTables.min.js"></script>
  <script src="/application/assets/js/plugins/bootstrap-tagsinput.js"></script>
  <script src="/application/assets/js/plugins/jasny-bootstrap.min.js"></script>
  <script src="/application/assets/js/plugins/fullcalendar.min.js"></script>
  <script src="/application/assets/js/plugins/jquery-jvectormap.js"></script>
  <script src="/application/assets/js/plugins/nouislider.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <script src="/application/assets/js/plugins/chartist.min.js"></script>
  <script src="/application/assets/js/plugins/bootstrap-notify.js"></script>
  <script src="/application/assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <script>
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>
