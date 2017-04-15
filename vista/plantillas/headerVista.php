<?php
	$LMX = NoticiaC::TitularNav("Liga MX");
	$PL = NoticiaC::TitularNav("Premier League");
	$LL = NoticiaC::TitularNav("La Liga");
	$UCL = NoticiaC::TitularNav("Champions League");
	$LC = NoticiaC::TitularNav("Liga de Campeones");
	$CL = NoticiaC::TitularNav("Copa Libertadores");
	$SM = NoticiaC::TitularNav("Seleccion Mexicana");
	$CC = NoticiaC::TitularNav("Copa Confederaciones");
	$CM = NoticiaC::TitularNav("Copa del Mundo");
	$NoticiasLMX = NoticiaC::NoticiasNav("Liga MX");
	$NoticiasPL = NoticiaC::NoticiasNav("Premier League");
	$NoticiasLL = NoticiaC::NoticiasNav("La Liga");
	$NoticiasUCL = NoticiaC::NoticiasNav("Champions League");
	$NoticiasLC = NoticiaC::NoticiasNav("Liga de Campeones");
	$NoticiasCL = NoticiaC::NoticiasNav("Copa Libertadores");
	$NoticiasSM = NoticiaC::NoticiasNav("Seleccion Mexicana");
	$NoticiasCC = NoticiaC::NoticiasNav("Copa Confederaciones");
	$NoticiasCM = NoticiaC::NoticiasNav("Copa del Mundo");
?>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="../libs/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../libs/fonts/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../libs/css/site.css">
<link rel="stylesheet" type="text/css" href="../libs/css/cookies.css">
<link rel="stylesheet" type="text/css" href="../libs/css/MenuNav.css">
<link rel="stylesheet" type="text/css" href="../libs/css/style.css">
<link rel="stylesheet" type="text/css" href="../libs/css/index.css">
<!-- FUENTES -->
<link rel="stylesheet" type="text/css" href="../libs/fonts/cabin.css">
<link rel="stylesheet" type="text/css" href="../libs/fonts/cabincondensed.css">
<link rel="stylesheet" type="text/css" href="../libs/fonts/varelaround.css">
<link rel="stylesheet" type="text/css" href="../libs/fonts/muli.css">
<!-- Scripts -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script type="text/javascript" src="../libs/js/jquery.min.js"></script>
<script type="text/javascript" src="../libs/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../libs/js/Validacion.js"></script>
<script type="text/javascript" src="../libs/js/Viewlogin.js"></script>
<script type="text/javascript" src="../libs/js/analytics.js"></script>
<script type="text/javascript" src="../libs/js/countAnalyticsIndex.js"></script>
<script type="text/javascript" src="../libs/js/jquery.flexisel.js"></script>
<script type="text/javascript" src="../libs/js/BuscadorAvanzado.js"></script>
<script type="text/javascript" src="../libs/js/index.js"></script>
<script type="text/javascript" src="http://www.jqueryscript.net/demo/Responsive-jQuery-News-Ticker-Plugin-with-Bootstrap-3-Bootstrap-News-Box/scripts/jquery.bootstrap.newsbox.min.js"></script>
<script>
	(adsbygoogle = window.adsbygoogle || []).push({
    	google_ad_client: "ca-pub-9347761211349930",
    	enable_page_level_ads: true
  	});

    $(document).ready(function(){
		var unrli = "<?php echo $url; ?>";
		var inpli = "<?php echo $ipUser; ?>";
		count(unrli, inpli);

		$("#flexiselDemo3").flexisel({
       		visibleItems: 5,
       		itemsToScroll: 2,         
       		autoPlay: {
           		enable: true,
           		interval: 5000,
           		pauseOnHover: true
       		}        
    	});
	});
</script>