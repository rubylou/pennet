<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PenNet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/Public/css/bootstrap.css" rel="stylesheet">
    
    <script src="/Public/js/jquery/jquery.js"></script>
    <script src="/Public/js/bootstrap/bootstrap.js"></script>
  </head>

<body>
   <div class="navbar-wrapper">
    <div class="container">
      <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo U('Index/index');?>">PenNet</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="#">主机检测</a></li>
              <li><a href="#">服务检测</a></li>
              <li><a href="#">信息检测</a></li>
              <li><a href="#">提权检测</a></li>   
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">登录</a></li>
              <li><a href="#">注销</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="page-header">
      <h1>信息收集</h1>
    </div>
    <!-- <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover table-condensed">
          <tr>
            <th>ID</th>
            <th>类别</th>
            <th>描述</th>
            <th>名称</th>
            <th>服务</th>
            <th>更新时间</th>
          </tr>
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$loots): $mod = ($i % 2 );++$i;?><tr>
              <td><?php echo ($loots["id"]); ?></td>
              <td><?php echo ($loots["ltype"]); ?></td>
              <td><?php echo ($loots["info"]); ?></td>
              <td><a href="<?php echo ($loots["path"]); ?>"><?php echo ($loots["name"]); ?></a></td>
              <td><?php echo ($loots["service_name"]); ?></td>
              <td><?php echo ($loots["updated_at"]); ?></td>
              <td><a href="/index.php/Home/Index/services?id=<?php echo ($loots["id"]); ?>">服务检测</a>&nbsp;&nbsp;<a href="/index.php/Home/Index/infos?id=<?php echo ($loots["id"]); ?>">信息检测</a>&nbsp;&nbsp;<a href="/index.php/Home/Index/auths?id=<?php echo ($loots["id"]); ?>">提权检测</a></td> 
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table> 
      </div>
    </div> -->

    <!-- Management Console Information Panel -->
    <div class="row">
      <div class="col-md-10">
        <div class="panel panel-primary">
          <div class="panel-heading">Management Console Information</div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <ul class="list-group">

                  <div class="list-group-item">
                    <h4 class="list-group-item-heading text-info">Version</h4>
                    <?php if(is_array($version)): $i = 0; $__LIST__ = $version;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$version): $mod = ($i % 2 );++$i;?><p class="list-group-item-text"><?php echo ($version["data"]); ?>&nbsp;&nbsp;&nbsp;<small><?php echo ($version["updated_at"]); ?></small></p><?php endforeach; endif; else: echo "" ;endif; ?>   
                  </div>

                  <div class="list-group-item">
                    <h4 class="list-group-item-heading text-info">Environment Variables</h4>
                    <?php if(is_array($env)): $i = 0; $__LIST__ = $env;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$env): $mod = ($i % 2 );++$i;?><p class="list-group-item-text"><?php echo ($env["data"]); ?>&nbsp;&nbsp;&nbsp;<small><?php echo ($env["updated_at"]); ?></small></p><?php endforeach; endif; else: echo "" ;endif; ?>
                  </div>

                  <div class="list-group-item">
                    <h4 class="list-group-item-heading text-info">Users</h4>
                    <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$users): $mod = ($i % 2 );++$i;?><p class="list-group-item-text"><?php echo ($users["data"]); ?>&nbsp;&nbsp;&nbsp;<small><?php echo ($users["updated_at"]); ?></small></p><?php endforeach; endif; else: echo "" ;endif; ?>
                  </div>

                  <div class="list-group-item">
                    <h4 class="list-group-item-heading text-info">Instance Properties</h4>
                    <?php if(is_array($instance)): $i = 0; $__LIST__ = $instance;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$instance): $mod = ($i % 2 );++$i;?><p class="list-group-item-text"><?php echo ($instance["data"]); ?>&nbsp;&nbsp;&nbsp;<small><?php echo ($instance["updated_at"]); ?></small></p><?php endforeach; endif; else: echo "" ;endif; ?>
                  </div> 

                  <div class="list-group-item">
                    <h4 class="list-group-item-heading text-info">Process Information</h4>
                    <?php if(is_array($process)): $i = 0; $__LIST__ = $process;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$process): $mod = ($i % 2 );++$i;?><p class="list-group-item-text"><?php echo ($process["info"]); ?>: <?php echo ($process["path"]); ?>&nbsp;&nbsp;&nbsp;<small><?php echo ($process["updated_at"]); ?></small></p><?php endforeach; endif; else: echo "" ;endif; ?>
                  </div>

                  <div class="list-group-item">
                    <h4 class="list-group-item-heading text-info">Startup Profile</h4>
                    <?php if(is_array($profile)): $i = 0; $__LIST__ = $profile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$profile): $mod = ($i % 2 );++$i;?><p class="list-group-item-text"><?php echo ($profile["info"]); ?>: <?php echo ($profile["path"]); ?>&nbsp;&nbsp;&nbsp;<small><?php echo ($profile["updated_at"]); ?></small></p><?php endforeach; endif; else: echo "" ;endif; ?>
                  </div> 

                  <div class="list-group-item">
                    <h4 class="list-group-item-heading text-info">ABAP Syslog</h4>
                    <?php if(is_array($abapsyslog)): $i = 0; $__LIST__ = $abapsyslog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$abapsyslog): $mod = ($i % 2 );++$i;?><p class="list-group-item-text"><?php echo ($abapsyslog["info"]); ?>: <?php echo ($abapsyslog["path"]); ?>&nbsp;&nbsp;&nbsp;<small><?php echo ($abapsyslog["updated_at"]); ?></small></p><?php endforeach; endif; else: echo "" ;endif; ?>
                  </div> 

                  <div class="list-group-item">
                    <h4 class="list-group-item-heading text-info">Trace Files and Log Files</h4>
                    <?php if(is_array($logfiles)): $i = 0; $__LIST__ = $logfiles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$logfiles): $mod = ($i % 2 );++$i;?><p class="list-group-item-text"><?php echo ($logfiles["info"]); ?>: <?php echo ($logfiles["path"]); ?>&nbsp;&nbsp;&nbsp;<small><?php echo ($logfiles["updated_at"]); ?></small></p><?php endforeach; endif; else: echo "" ;endif; ?>
                  </div> 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- SOAP RFC Information Panel -->
    <div class="row">
      <div class="col-md-10">
        <div class="panel panel-success">
          <div class="panel-heading">SOAP RFC Information</div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <ul class="list-group">
                  <div class="list-group-item">
                    <h4 class="list-group-item-heading text-success">System Information</h4>
                    <?php if(is_array($system)): $i = 0; $__LIST__ = $system;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$system): $mod = ($i % 2 );++$i;?><p class="list-group-item-text"><?php echo ($system["data"]); ?>&nbsp;&nbsp;&nbsp;<small><?php echo ($system["updated_at"]); ?></small></p><?php endforeach; endif; else: echo "" ;endif; ?>   
                  </div>
                  <div class="list-group-item">
                    <h4 class="list-group-item-heading text-success">SAP Information Disclosure</h4>
                    <?php if(is_array($saprel)): $i = 0; $__LIST__ = $saprel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$saprel): $mod = ($i % 2 );++$i;?><p class="list-group-item-text"><?php echo ($saprel["data"]); ?>&nbsp;&nbsp;&nbsp;<small><?php echo ($saprel["updated_at"]); ?></small></p><?php endforeach; endif; else: echo "" ;endif; ?>
                  </div>
                  <div class="list-group-item">
                    <h4 class="list-group-item-heading text-success">Directory Trasversal</h4>
                    <?php if(is_array($readdir)): $i = 0; $__LIST__ = $readdir;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$readdir): $mod = ($i % 2 );++$i;?><p class="list-group-item-text"><?php echo ($readdir["info"]); ?>: <?php echo ($readdir["path"]); ?>&nbsp;&nbsp;&nbsp;<small><?php echo ($readdir["updated_at"]); ?></small></p><?php endforeach; endif; else: echo "" ;endif; ?>
                  </div> 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</body>
</html>