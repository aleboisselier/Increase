{{msg}}
<h1>Bonjour {{ user.getIdentite() }}.</h1>
<br>
<ul class="list-group">
 	<li class="list-group-item active">Vos Projets :</li>
	{% for project in projets %}
		<a href="#" data-ajax="Projects/show/{{project.getId()}}" class="list-group-item">
			<b>{{project.getNom()}}</b>
			<div class="progress" style="margin-top:2%;">
				<div class="progress-bar progress-bar-success" role="progressbar"
					aria-valuenow="{{project.getAvancement()}}" aria-valuemin="0"
					aria-valuemax="100" style="width: {{project.getAvancement()}}%;">
					{% if project.getAvancement()==0 %}
						<b style="color:red">{{project.getAvancement()}}%</b>
					{% else %}
						<b>{{project.getAvancement()}}%</b>
					{% endif%}
				</div>
				<div class="progress-bar progress-bar-warning" style="width: {{ 100-project.getAvancement() }}%">
					{{ 100-project.getAvancement() }}% avant le {{ project.getDateFinPrevue() }}
				</div>
			</div>
		</a>

	{% endfor %}
</ul>
{{ script_foot }}