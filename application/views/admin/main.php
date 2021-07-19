<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/uploads/web_personalization/3433.jpg">
	<title><?=$title?></title>
    <?php include 'layout/css.php' ?>
</head>
<style>
    .url{
        cursor: pointer;
    }
    .modalajaxgif {
        display:    none;
        position:   fixed;
        z-index:    10000;
        top:        0;
        left:       0;
        height:     100%;
        width:      100%;
        background: rgba( 0, 0, 0, .8 )
        url('<?= base_url()?>load.gif')
    50% 50%
    no-repeat;
        background-size: 50px;
    }

    /* When the body has the loading class, we turn
       the scrollbar off with overflow:hidden */
    body.loading .modalajaxgif {
        overflow: hidden;
    }

    /* Anytime the body has the loading class, our
       modal element will be visible */
    body.loading .modalajaxgif {
        display: block;
    }
</style>

<body>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <?php include 'layout/header.php' ?>
    <?php include 'layout/sidebar.php' ?>
    <div class="page-wrapper">
        <?php $this->load->view($content) ?>
        <?php include 'layout/footer.php' ?>
    </div>
</div>
<?php include 'layout/js.php' ?>
</body>

</html>
