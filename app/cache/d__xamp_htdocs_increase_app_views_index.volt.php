<!DOCTYPE html>
<html>
	<head>
		<title>Increase</title>
		<?php echo $this->tag->stylesheetLink('css/bootstrap.min.css'); ?>
		<?php echo $this->tag->stylesheetLink('css/styles.css'); ?>
		<?php echo $this->tag->javascriptInclude('js/jquery.min.js'); ?>
		<?php echo $this->tag->javascriptInclude('js/bootstrap.min.js'); ?>
		<link rel="icon" href="public/img/increase.png" >
	</head>
	<meta charset="UTF-8">
	<body>
	<div class="menu col-md-2 col-xs-2" style="margin:0%">
		<div class="display-user">
			<img src="img/user.png" class="img-responsive" alt="Responsive image">
		</div>
		<div class="bs-docs-header row">
			<img src="img/phalcon.png" class="img-responsive" alt="Responsive image">
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-4"></div>
			<div class="img-logo col-md-4 col-xs-4" style="padding:0%">
				<img src="img/Increase.png" class="img-responsive" alt="Responsive image">
			</div>
		</div>
		<div class="row contains-menu">
		</div>
	</div>
	<div class="col-md-2 col-xs-2"></div>
	<div class="container col-md-10 col-xs-10" style="padding-left:0%; padding-right:0%">
		<div class="header">
		<h3>Increase</h3>
			<p>Gérez la <b>progression</b> de vos projets, améliorez la <b>communication</b> 
			avec vos clients.</p>
			</div>
		<div class="bread"></div>
		<div class="content">
			<div id="message"></div>
			<div id="content">
				<?php echo $this->getContent(); ?>
			</div>
		</div>
	</div>
</div>
	<div id="footer" class="col-md-10 col-xs-10" style="margin-rigth:0%;">
		<div class="container">
			<p>Mentions légales</p>
			<p><span>Créé avec Phalcon</span></p>
		</div>
	</div>
</body>
</html>