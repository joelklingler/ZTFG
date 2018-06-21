<html>
<head>
    <title>ZTFG</title>
    <link rel="icon" type="image/png" href=<?php echo "'".asset_url()."img/iconztfg.png'";?>/>
    <link type="text/css" rel="stylesheet" href=<?php echo "'".asset_url()."css/style.css'";?>/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href=<?php echo "'".asset_url()."css/overhang.min.css'";?> />
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="<?php echo asset_url().'js/overhang.min.js';?>"></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php $this->view('partials/status'); ?>
<div class="main">
    <div class="main-row">
        <div class="row">
            <header class="main-header">
                <a href="<?php echo root_url()."Start";?>"><img src="<?php echo asset_url().'img/header3.png';?>"/></a>
            </header>
            <nav class="main-nav">
                <span class="show-menue">Menü<a href="#" alt="toggle menue"><i class="fas fa-bars"></i></a></span>
                <ul>
                    <li><a href="<?php echo root_url()."Start";?>"><img src="<?php echo asset_url().'img/home_button.png'?>"></a></li>
                    <li><a href="<?php echo root_url()."Wir";?>"><img src="<?php echo asset_url().'img/wir_button.png'?>"></a></li>
                    <li><a href="<?php echo root_url()."Server";?>"><img src="<?php echo asset_url().'img/server_button.png'?>"></a></li>
                    <li><a href="<?php echo root_url()."Support";?>"><img src="<?php echo asset_url().'img/support_button.png'?>"></a></li>
                    <li><a href="<?php echo root_url()."Account_mobile";?>"><img src="<?php echo asset_url().'img/account_button.png'?>"></a></li>
                </ul>
            </nav>
            <section class="main-content">
            <main>