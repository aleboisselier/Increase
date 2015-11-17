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
		<div id="wrapper">
	
	        <!-- Sidebar -->
	        <div id="sidebar-wrapper">
	            <ul class="sidebar-nav">
	            	<div class="display-user">
						<img src="img/user.png" class="img-responsive" alt="Responsive image">
					</div>
					<div class="bs-docs-header">
						<img src="img/phalcon.png" class="img-responsive" alt="Responsive image">
					</div>
					<div class="row" style="margin:0px;">
						<div class="col-md-4 col-xs-4"></div>
						<div class="img-logo col-md-4 col-xs-4" style="padding:0%">
							<img src="img/Increase.png" class="img-responsive" alt="Responsive image">
						</div>
					</div>
					<br>
	                <li>
	                    <a href="#">Dashboard</a>
	                </li>
	                <li>
	                    <a href="#">Shortcuts</a>
	                </li>
	                <li>
	                    <a href="#">Overview</a>
	                </li>
	                <li>
	                    <a href="#">Events</a>
	                </li>
	                <li>
	                    <a href="#">About</a>
	                </li>
	                <li>
	                    <a href="#">Services</a>
	                </li>
	                <li>
	                    <a href="#">Contact</a>
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
					<div class="bread"></div>
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
	<script>
	    $("#menu-toggle").click(function(e) {
	        e.preventDefault();
	        $("#wrapper").toggleClass("toggled");
	    });
	    </script>
	</html>