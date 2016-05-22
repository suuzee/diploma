<?php
    $login_admin = $this -> session -> userdata("login_admin");
    if (!!!$login_admin) {
        redirect('//q.qunarzz.com/diploma/admin');
    }
?>
<!--header start-->
<header class="header white-bg">
      <div class="sidebar-toggle-box">
          <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
      </div>
      <!--logo start-->
      <a href="/diploma/assets/#" class="logo">知<span>否</span></a>
      <!--logo end-->
      <div class="top-nav ">
          <!--search & user info start-->
          <ul class="nav pull-right top-menu">
              <!-- user login dropdown start-->
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="/diploma/assets/#">
                      <span class="username"><?php echo $login_admin -> admin_name;?></span>
                      <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu extended logout">
                      <li><a href="/diploma/admin/logout"><i class="icon-key"></i> 退出登录</a></li>
                  </ul>
              </li>
              <!-- user login dropdown end -->
          </ul>
          <!--search & user info end-->
      </div>
  </header>
<!--header end-->
