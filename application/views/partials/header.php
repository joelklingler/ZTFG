<html>
<head>
    <title>ZTFG</title>
    <link rel="icon" type="image/png" href=<?php echo "'".asset_url()."img/iconztfg.png'";?>/>
    <link type="text/css" rel="stylesheet" href=<?php echo "'".asset_url()."css/style.css'";?>/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>
<?php $this->view('partials/account', $account); ?>
<?php $this->view('partials/status'); ?>
<div id="Seite">
    <h1 class="headerImage"></h1>
    <ul id="Navigation"><center>
        <p style="margin-top:0.4em; margin-left:0.3em">
        <a href="<?php echo root_url()."Start";?>"><img src="<?php echo asset_url().'img/home_button.png'?>"></a>
        <a href="<?php echo root_url()."Wir";?>"><img src="<?php echo asset_url().'img/wir_button.png'?>"></a>
        <a href="<?php echo root_url()."Server";?>"><img src="<?php echo asset_url().'img/server_button.png'?>"></a>
        <a href="<?php echo root_url()."Support";?>"><img src="<?php echo asset_url().'img/support_button.png'?>"></a></p></center>
    </ul>

    <div id="Inhalt">
<br/>