{{msg}}
<h1>Congratulations!</h1>

<p>You're now flying with Phalcon. Great things are about to happen!</p>
<p>You can now install <a href="http://phalcon-jquery.kobject.net" target="new">phalcon-jQuery</a> for flying even faster.</p>

<div class="row">
	<div class="col-md-12">
		<div class="btn-group btn-group-justified" role="group" aria-label="...">
		  <div class="btn-group" role="group">
		  		<a class="btn btn-default" href="{{url.get("Users")}}" data-ajax="Users">Utilisateurs</a>&nbsp;
		  </div>
		  <div class="btn-group" role="group">
		    <a class="btn btn-primary" href="{{url.get("Projects")}}" data-ajax="Projects">Projets</a>&nbsp;
		  </div>
		  <div class="btn-group" role="group">
		    <a class="btn btn-success" href="{{url.get("UseCases")}}" data-ajax="UseCases">UseCases</a>&nbsp;
		  </div>
		  <div class="btn-group" role="group">
		    <a class="btn btn-info" href="{{url.get("Taches")}}" data-ajax="Taches">Tâches</a>&nbsp;
		  </div>
		  <div class="btn-group" role="group">
		    <a class="btn btn-warning" href="{{url.get("Messages")}}" data-ajax="Messages">Messages</a>&nbsp;
		  </div>
		  <div class="btn-group" role="group">
		    <a class="btn btn-danger" href="{{url.get("Auth/logout")}}" data-ajax="Auth/logout"><b>Deconnexion</b></a>&nbsp;
		  </div>
		</div>
	</div>
</div>



{{ script_foot }}