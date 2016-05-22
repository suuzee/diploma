<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="/diploma/assets/img/favicon.html">

    <title>回收站-知否</title>

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
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>编号</th>
                              <th>所属问题</th>
                              <th>内容</th>
                              <th>作者</th>
                              <th>时间</th>
                              <th>操作</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                              foreach($answers as $answer) {
                          ?>
                          <tr>
                              <td><?php echo $answer -> answer_id;?></td>
                              <td><a href="//q.qunarzz.com/diploma/question/<?php echo $answer -> question_id;?>" target="_blank"><?php echo $answer -> question_title;?></a></td>
                              <td><?php echo $answer -> answer_desc;?></td>
                              <td><?php echo $answer -> user_name;?></td>
                              <td><?php echo $answer -> answer_date;?></td>
                              <td><a href="//q.qunarzz.com/diploma/admin/regainAnswer?answerId=<?php echo $answer -> answer_id?>">恢复</a></td>
                          </tr>
                          <?php }?>
                          <?php
			            	  if($total > $pagesize){
			              ?>
			              <tr><td colspan="7" style="text-align: center;" id="fenye"><?php echo $this->pagination->create_links();?></td></tr>
			              <?php
							  }
			              ?>
                      </tbody>
                  </table>
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
