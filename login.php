<?php
  require 'src/meli.php';
  require 'src/config.php';
?>
<!doctype html>
<!--[if IE 7]>  <html class="no-js lt-ie10 lt-ie9 lt-ie8 ie7" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="no-js lt-ie10 lt-ie9 ie8" lang="en"> <![endif]-->
<!--[if IE 9]>  <html class="no-js lt-ie10 ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <title>API MercadoLibre</title>
  <!-- Mobile viewport optimization http://goo.gl/b9SaQ -->
  <meta name="HandheldFriendly" content="True">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="cleartype" content="on">
  <!-- Favicon -->
  <link type="image/vnd.microsoft.icon" href="https://static.mlstatic.com/org-img/chico/img/favicon.ico?new" rel="shortcut icon">
  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/chico.css">
  <link rel="stylesheet" href="assets/css/mesh.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <!-- Header -->
  <div class="ml-header">
    <h1><div class="logo-ml"></div> API MercadoLibre</h1>
  </div>
  <!-- Content -->
  <?php if (isset($user) == null) {?>
    <div class="ch-g1-3">
    <div class="ch-box-lite ch-leftcolumn">
      <h2 class="welcome-msg">Atención</h2>
      <p>¡Su sesión ha caducado, vuelva a iniciar sesión nuevamente!</p><br>
      <?php echo '<a href="' . $meli->getAuthUrl('http://develop.com/mercadolibre/login.php') . '"><input type="button" class="ch-btn ch-btn-large" value="Iniciar Sesión"></a>'; ?>
    </div>
  </div> 
  <?php } else { ?>
  <div class="ch-g1-3">
    <div class="ch-box-lite ch-leftcolumn">
      <h2 class="welcome-msg">Datos Personales</h2>
      <b>Nombre:</b> <?php echo ucfirst(isset($user['body']->first_name)); ?><br>
      <b>Apellido:</b> <?php echo ucfirst(isset($user['body']->last_name)); ?><br>
      <b>E-mail:</b> <?php echo isset($user['body']->email); ?><br><br>
      <?php echo '<a href="http://develop.com/mercadolibre/logout.php"><input type="button" class="ch-btn ch-btn-large" value="Cerrar Sesión"></a>'; ?>
    </div>
  </div>
  <?php } ?>
</body>
</html>