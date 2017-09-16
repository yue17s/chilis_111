<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php wp_title(); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link href="<?PHP bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="<?PHP bloginfo('template_directory'); ?>/css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<header>
    <div class="container">
       <a href="<?php echo site_url(); ?>">
            <img class="pull-left logo" src="<?PHP bloginfo('template_directory'); ?>/img/logo.png" alt="Chilis">
       </a>
        <nav class="pull-left main-menu">
            <?php wp_nav_menu(['container' => '']); ?>
            <!-- crea menu para WORPRESS / (container' => '') el container que WP creo  -->
        </nav>
    </div>
</header>