{{msg}}
<h1>Bonjour !</h1>
<br>
<ul class="list-group">
 	<li class="list-group-item active">Vos Projets :</li>
	{% set i=0 %}
	{% for data in listP %}
		<a href="{{siteUrl}}/Projects/show/{{id[i]}}" class="list-group-item">{{data}}</a>
		{% set i+=1 %}
	{% endfor %}
</ul>