<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="/diploma/assets/img/favicon.html">

    <title>管理员登陆</title>

    <!-- Bootstrap core CSS -->
    <link href="/diploma/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/diploma/assets/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/diploma/assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/diploma/assets/css/style.css" rel="stylesheet">
    <link href="/diploma/assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/diploma/assets/js/html5shiv.js"></script>
    <script src="/diploma/assets/js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="/diploma/admin/checkAdmin" method="post">
        <h2 class="form-signin-heading">管理员-登陆</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="管理员账号" autofocus name='admin_name'>
            <input type="password" class="form-control" placeholder="管理员密码" name='admin_pwd'>
            <button class="btn btn-lg btn-login btn-block" type="submit">登陆</button>

        </div>

      </form>

    </div>


  </body>
</html>
