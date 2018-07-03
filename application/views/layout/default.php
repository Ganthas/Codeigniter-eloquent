<!DOCTYPE html>
<html lang="es" xml:lang="es">
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="es-ES">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="es-ES">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="es-ES">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]>
<html dir="ltr" lang="es-ES">
<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta http-equiv="Content-Language" content="es-ES">
    <!-- Metas -->
    <?php echo $this->layout->headMeta(); ?>

    <!-- title -->
    <title class="title-nombre">
        <?php echo $this->layout->getTitle(); ?>
    </title>
    <!-- CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->

    <?php echo $this->layout->getCss(); ?>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5-els.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <link href="/favicon.ico" rel="shortcut icon" />

</head>

<body <?=$this->layout->getidObj(); ?> <?=$this->layout->getBodyClass(); ?> >


    <!-- Top -->
    <?php //echo $this->layout->getHeader();?>
    <?php
        #if($this->session->userdata('rol')==$this->perfiles->getPostulante()){
        #    echo $this->load->view('menupostulante');

        #} else if($this->session->userdata('rol')==$this->perfiles->getAdministrador()){
        #    echo $this->load->view('menuadministrador');
        #}
    ?>
    <div class="">
        <?=$this->layout->getNav();?>
    </div>

    <?php //$this->load->view($this->layout->getHeader());?>

    <?php echo $content_for_layout?>

    <?php //$this->load->view($this->layout->getFooter());?>

<?php echo $this->layout->getJs(); ?>

<!-- <script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script> -->

</body>
</html>
