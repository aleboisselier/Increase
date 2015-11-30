<!DOCTYPE html>
<html>
	<head>
		<title>Increase</title>
		{{ stylesheet_link("css/bootstrap.min.css") }}
		{{ stylesheet_link("css/styles.css") }}
		{{ javascript_include('js/jquery.min.js') }}
		{{ javascript_include('js/bootstrap.min.js') }}
		
		{{ stylesheet_link("css/rangeslider.css") }}
		{{ javascript_include('js/rangeslider.min.js') }}

		<link rel="icon" href="{{ siteUrl }}img/increase.png" >
		<script src="{{ siteUrl }}js/menu.js" type="text/javascript"></script>
	</head>
	<meta charset="UTF-8">
	<body>
		<div id="wrapper">
			<div class="display"></div>
	
	        <!-- Sidebar -->
	        <div id="sidebar-wrapper">
	            <ul class="sidebar-nav">
	            	<div class="display-user">
						<img src="{{ siteUrl }}img/user.png" class="img-responsive" alt="Responsive image">
					</div>
					<div class="bs-docs-header">
						<img src="{{ siteUrl }}img/phalcon.png" class="img-responsive" alt="Responsive image">
					</div>
					<div class="row" style="margin:0px;">
						<div class="col-md-4 col-xs-4"></div>
						<div class="img-logo col-md-4 col-xs-4" style="padding:0%">
							<img src="{{ siteUrl }}img/Increase.png" class="img-responsive" alt="Responsive image">
						</div>
					</div>
					<br>
	                <li>
	                    <a href="{{url.get("Index")}}"><span class="glyphicon glyphicon-home" aria-hidden="true" style="margin-left:-10%;"></span>&nbsp;Accueil</a>
	                </li>
	                <li>
			          <a href="{{url.get("Users")}}" data-ajax="Users" class="menuItem"><span class="glyphicon glyphicon-user" aria-hidden="true" style="margin-left:-10%;"></span>&nbsp;Utilisateurs</a>
	                </li>
		            <li>
	                    <a href="{{url.get("Roles")}}" data-ajax="Roles" class="menuItem"><span class="glyphicon glyphicon-tags" aria-hidden="true" style="margin-left:-10%;"></span>&nbsp; Rôles</a>
	                </li>
	                <li>
	                    <a href="{{url.get("Users")}}" data-ajax="Projects" class="menuItem"><span class="glyphicon glyphicon-book" aria-hidden="true" style="margin-left:-10%;"></span>&nbsp;Projets</a>
	                </li>
	                <li>
	                    <a href="{{url.get("Messages")}}" data-ajax="Messages" class="menuItem"><span class="glyphicon glyphicon-comment" aria-hidden="true" style="margin-left:-10%;"></span>&nbsp;Messages</a>
	                </li>
	                <li>
	                    <a href="{{url.get("UseCases")}}" data-ajax="UseCases" class="menuItem"><span class="glyphicon glyphicon-briefcase" aria-hidden="true" style="margin-left:-10%;"></span>&nbsp;Use Cases</a>
	                </li>
	                <li>
	                    <a href="{{url.get("Taches")}}" data-ajax="Taches" class="menuItem"><span class="glyphicon glyphicon-tasks" aria-hidden="true" style="margin-left:-10%;"></span>&nbsp;Tâches</a>
	                </li>
	                <li>
	                    <a href="{{url.get("Auth/logout")}}" data-ajax="Auth/logout" class="menuItem"><span class="glyphicon glyphicon-log-out" aria-hidden="true" style="margin-left:-10%;"></span>&nbsp;Déconnexion</a>
	                </li>
	            </ul>
	        </div>
	        <!-- /#sidebar-wrapper -->
	
	        <!-- Page Content -->
	        <div id="page-content-wrapper">
	            <div class="container-fluid" style="margin:0px; padding:0px;">
	                <div class="header">
	                	<div id="menu-toggle">
		                	<span  class=" glyphicon glyphicon-menu-hamburger"></span>
		                	Menu
	                	</div>
	                	<br>
						<p>
							<span class="title">Increase :</span>
							 Gérez la <b>progression</b> de vos projets, améliorez la <b>communication</b> 
							avec vos clients.
						</p>
					</div>
					<div class="bread">
						<ol class="breadcrumb">
							<li><a href="{{ siteUrl }}Index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Accueil</a></li>
							{% if ControllerName is defined and title != "" %}<li {% if ObjectName is defined%}class="active"{% endif %}><a href="{{ siteUrl }}{{ ControllerName }}"><span class="glyphicon glyphicon-{{ controllerIcon }}" aria-hidden="true"></span>&nbsp;{{ title }}</a></li>{% endif %}
							<li class="active objectBreadcrumb">{% if ObjectName is defined %}{{ ObjectName }}{% endif %}</li>
						</ol>
					</div>
					<div class="content">
						<div id="message"></div>
						<div id="content">
							{{ content() }}
						</div>
					</div>
				</div>
	        </div>
	        <!-- /#page-content-wrapper -->
	
	    </div>
	    <!-- /#wrapper -->
	</body>
	</html>