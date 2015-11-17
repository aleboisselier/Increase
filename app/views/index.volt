<!DOCTYPE html>
<html>
	<head>
		<title>Increase</title>
		{{ stylesheet_link("css/bootstrap.min.css") }}
		{{ stylesheet_link("css/styles.css") }}
		{{ javascript_include('js/jquery.min.js') }}
		{{ javascript_include('js/bootstrap.min.js') }}
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
		<ol class="breadcrumb">
		<h3>Increase</h3>
			<p>Gérez la <b>progression</b> de vos projets, améliorez la <b>communication</b> 
			avec vos clients.</p>
				<li><a href="{{ url }}Index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Accueil</a></li>
				{% if ControllerName is defined %}<li {% if ObjectName is defined %}class="active"{% endif %}><a href="{{ url }}{{ ControllerName }}"><span class="glyphicon glyphicon-{{ controllerIcon }}" aria-hidden="true"></span>&nbsp;{{ title }}</a></li>{% endif %}
				<li class="active objectBreadcrumb">{% if ObjectName is defined %}{{ ObjectName }}{% endif %}</li>
			</ol>
		<div class="content">
			{{ content() }}
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