<?php include_once("functions.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="FAWONG Homepage">
<meta name="author" content="fawong.com, FAWONG.com, FAWONG, fawong" />
<?php
if (isset($favicon)) {
print $favicon;
} else {
?>
<link rel="shortcut icon" href="/favicon.ico">
<?php
}
?>

<?php
if (isset($title)) {
?>
<title><?php print $title; ?></title>
<?php
} else {
?>
<title>FAWONG</title>
<?php
}
?>

<!-- Bootstrap core CSS -->
<link href="/assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="/assets/css/sticky-footer-navbar.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="../../assets/js/html5shiv.js"></script>
<script src="../../assets/js/respond.min.js"></script>
<![endif]-->

<script>
var _prum = [['id', '5205f924abe53d514a000000'],
             ['mark', 'firstbyte', (new Date()).getTime()]];
(function() {
    var s = document.getElementsByTagName('script')[0]
      , p = document.createElement('script');
    p.async = 'async';
    p.src = '//rum-static.pingdom.net/prum.min.js';
    s.parentNode.insertBefore(p, s);
})();
</script>
<?php
if (isset($extra_headers)) {
  print $extra_headers;
}
?>
</head>

<body>
<!-- <a href="//www.fawong.com/graveyardtemporal.php">ubiquitous</a> -->
<!-- <a href="//fawong.com/conditionalgrowing.php">yearlong</a> -->
<a href="//www.fawong.com/graveyardtemporal.php"><!-- portal --></a>
<a href="//fawong.com/conditionalgrowing.php"><!-- exuberant-intensity --></a>

<!-- Wrap all page content here -->
<div id="wrap">

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">

<div class="container">

<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="/">FAWONG</a>
</div>

<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li <?php active_class("index", true); ?>><a href="/">Home</a></li>
<li><a href="/tpilb.php">Blank Page</a></li>
<li><a href="//blog.fawong.com">Blog</a></li>
<li><a href="//cms.fawong.com">CMS</a></li>
<li><a href="//forums.fawong.com">Forums</a></li>
<li><a href="//gallery.fawong.com">Gallery</a></li>
<li <?php active_class(["mc", "minecraft"]); ?>><a href="//mc.gyx.io">Minecraft</a></li>
<li <?php active_class("index"); ?>><a href="//pi.fawong.com">PI (&pi;)</a></li>
<li><a href="/wiki">Wiki</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Links <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="//www.aatf.us" target="_blank">Asian Arts Talents Foundation</a></li>
<li><a href="http://waf.50webs.org">50Webs</a></li>
<li><a href="http://www.freewebs.com/xilef/">FreeWebs</a></li>
<li><a href="http://xilef.webs.com/">Webs</a></li>
<li><a href="http://gnowxilef.weebly.com">Weebly</a></li>
<li><a href="//github.com/fawong" target="_blank">GitHub</a></li>
<li><a href="//www.kirinas.com" target="_blank">Kirin Art School (Dream High)</a></li>
<!--
<li><a href="#">Something else here</a></li>
<li class="divider"></li>
<li class="dropdown-header">Nav header</li>
<li><a href="#">Separated link</a></li>
<li><a href="#">One more separated link</a></li>
-->
</ul>
</li>
</ul>
</div><!--/.nav-collapse -->

</div>

</div>
