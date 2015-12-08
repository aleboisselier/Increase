{{msg}}
<h1>Bonjour !</h1>
<br>
<ul class="list-group">
 	<li class="list-group-item active">Vos Projets :</li>
	{% for project in projets %}
		<a href="#" data-ajax="Projects/show/{{project.getId()}}" class="list-group-item">{{project.getNom()}}</a>
	{% endfor %}
</ul>

{{ script_foot }}