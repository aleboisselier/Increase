{{msg}}
<h1>Bonjour {{user}} !</h1>
<br>
<ul class="list-group">
 	<li class="list-group-item active">Vos Projets :</li>
	{% for project in projects %}
		<a href="#" data-ajax="Projects/show/{{project.getId()}}" class="list-group-item">{{project.getNom()}}</a>
		<div class="progress">
			<div class="progress-bar progress-bar-success" role="progressbar"
				aria-valuenow="[[avancement]]" aria-valuemin="0"
				aria-valuemax="100" style="width: {{project.getAvancement()}}%;">{{project.getAvancement()}}%</div>
		</div>
	{% endfor %}
</ul>
{{ script_foot }}