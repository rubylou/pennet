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
      <h1>服务信息</h1>
    </div>
    <table class="table table-striped table-hover">
      <tr>
        <th>ID</th>
        <th>服务名称</th>
        <th>端口</th>
        <th>状态</th>
        <th>更新时间</th>
      </tr>
      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$services): $mod = ($i % 2 );++$i;?><tr>
          <td><?php echo ($services["id"]); ?></td>
          <td><?php echo ($services["name"]); ?></td>
          <td><?php echo ($services["port"]); ?></td>
          <td><?php echo ($services["state"]); ?></td>
          <td><?php echo ($services["updated_at"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table> 
  </div>
</body>
</html>