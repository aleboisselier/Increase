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
	<div class="second-header"></div>
	<div class="bs-docs-header">
		<div class="container">
			<div class="header">
				<h1>Increase</h1>
				<p>Gérez la <b>progression</b> de vos projets, améliorez la <b>communication</b> avec vos clients.</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="bread"></div>
		<div class="content">
			<div id="message"></div>
			<div id="content">
				{{ content() }}
			</div>
		</div>
	</div>
	<div id="footer">
		<div class="container">
			<div class="col-md-4">
			<p>Mentions légales</p>
			<p><span>Créé avec Phalcon</span></p>
			</div>
			<div class="col-md-4">
				<div class="input-group">
					<input id="ig-5" name="ig-5" class="form-control" role="input" value="" type="text" aria-describedby="right-ig-5" placeholder="Rechercher...">
					<div id="right-ig-5" class="input-group-btn"><button id="ig-4-radio" class="btn btn-default" role="button">Go</button></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>