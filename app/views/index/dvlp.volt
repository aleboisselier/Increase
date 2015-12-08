{{msg}}
<h1>Bonjour !</h1>
<br>
<ul class="list-group">
 	<li class="list-group-item active">Vos Projets :</li>
 	{% for projet in projets %}
		<li class="list-group-item">{{ projet }}</li>
	{% endfor %}
</ul>