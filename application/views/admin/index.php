<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="/diploma/assets/img/favicon.html">

    <title>知否</title>

    <!-- Bootstrap core CSS -->
    <link href="/diploma/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/diploma/assets/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/diploma/assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/diploma/assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/diploma/assets/css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="/diploma/assets/css/style.css" rel="stylesheet">
    <link href="/diploma/assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="/diploma/assets/js/html5shiv.js"></script>
      <script src="/diploma/assets/js/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
        .xxx-margin {
            margin-top: 30px;
        }
    </style>
  </head>

  <body>

  <section id="container" class="">
      <?php include('header.php');?>
      <?php include('sidebar.php');?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-6 col-sm-6 xxx-margin">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-user"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo $userNum?></h1>
                              <p>用户</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-6 col-sm-6 xxx-margin">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="icon-tags"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo $tagNum?></h1>
                              <p>标签</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-6 col-sm-6 xxx-margin">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="icon-question-sign"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo $questionNum?></h1>
                              <p>问题</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-6 col-sm-6 xxx-margin">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="icon-adn"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo $answerNum?></h1>
                              <p>答案</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->
          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/diploma/assets/js/jquery.js"></script>
    <script src="/diploma/assets/js/jquery-1.8.3.min.js"></script>
    <script src="/diploma/assets/js/bootstrap.min.js"></script>
    <script src="/diploma/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/diploma/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/diploma/assets/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="/diploma/assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/diploma/assets/js/owl.carousel.js" ></script>
    <script src="/diploma/assets/js/jquery.customSelect.min.js" ></script>

    <!--common script for all pages-->
    <script src="/diploma/assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="/diploma/assets/js/sparkline-chart.js"></script>
    <script src="/diploma/assets/js/easy-pie-chart.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
