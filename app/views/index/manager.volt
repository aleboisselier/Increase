{{msg}}
<h1>Bonjour {{user}} !</h1>
<br>
<ul class="list-group">
 	<li class="list-group-item active">Vos Projets managé :</li>
	{% for projectManager in projectsManager %}
		<a href="#" data-ajax="Projects/show/{{projectManager.getId()}}" class="list-group-item">
			<b>{{projectManager.getNom()}}</b>
			<div class="progress" style="margin-top:2%;">
				<div class="progress-bar progress-bar-success" role="progressbar"
					aria-valuenow="{{projectManager.getAvancement()}}" aria-valuemin="0"
					aria-valuemax="100" style="width: {{projectManager.getAvancement()}}%;">
					{% if projectManager.getAvancement()==0 %}
						<b style="color:red">{{projectManager.getAvancement()}}%</b>
					{% else %}
						<b>{{projectManager.getAvancement()}}%</b>
					{% endif%}
				</div>
			</div>
		</a>
	{% endfor %}
</ul>
<ul class="list-group">
 	<li class="list-group-item active">Vos Projets :</li>
	{% for projectDvlp in projectsDvlp %}
		<a href="#" data-ajax="Projects/show/{{projectDvlp.getId()}}" class="list-group-item">
			{{projectDvlp.getNom()}}
			<div class="progress" style="margin-top:2%;">
				<div class="progress-bar progress-bar-success" role="progressbar"
					aria-valuenow="{{projectDvlp.getAvancement()}}" aria-valuemin="0"
					aria-valuemax="100" style="width: {{projectDvlp.getAvancement()}}%;">
					{% if projectDvlp.getAvancement()==0 %}
						<b style="color:red">{{projectDvlp.getAvancement()}}%</b>
					{% else %}
						<b>{{projectDvlp.getAvancement()}}%</b>
					{% endif%}
				</div>
			</div>
		</a>
	{% endfor %}
</ul>
{{ script_foot }}