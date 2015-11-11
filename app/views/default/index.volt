{% if q['alertResult'] is defined  %} 
	{{ q['alertResult'] }}
{% endif %}
<table class='table table-striped'>
	<thead><tr><th colspan="2">{{title}}</th></tr></thead>
	<tbody>
		{% for  object in objects %}	
			<tr>
				<td>{{object}} </td>
				<td class='td-center'><a class='btn btn-primary btn-xs pull-right editBtn' id="{{ object.getId() }}" href='' data-toggle="tooltip" data-placement="top" title="Afficher les Détails"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
			</tr>
		{% endfor %}
	</tbody>
</table>
<a class='btn btn-primary editBtn' href='' id="0">Ajouter...</a>

{{ script_foot }}