{{msg}}
<table class='table table-striped'>
	<thead><tr><th colspan='3'>{{model}}</th></tr></thead>
		<tbody>
		{% for object in objects %}
			<tr>
				<td>{{object}}</td>
				<td class='td-center'>
					<a class='btn btn-primary btn-xs update' 
					href='{{url.get(baseHref~"/show/"~object.getId())}}' 
					data-ajax="{{ baseHref ~ "/show/" ~ object.getId() }}"
					data-toggle="tooltip" data-placement="top" title="Voir le projet">
						<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
					</a>
				</td>
				<td class='td-center'>
					<a class='btn btn-primary btn-xs update' 
					href='{{url.get(baseHref~"/frm/"~object.getId())}}' 
					data-ajax="{{ baseHref ~ "/frm/" ~ object.getId() }}"
					data-toggle="tooltip" data-placement="top" title="Modifier Le projet">
						<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
					</a>
					</td>
				<td class='td-center'>
					<a class='btn btn-warning btn-xs delete' 
					href='{{url.get(baseHref~"/delete/"~object.getId())}}' 
					data-ajax="{{ baseHref ~ "/delete/" ~ object.getId() }}"
					data-toggle="tooltip" data-placement="top" title="Supprimer le rojet">
						<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
					</a>
				</td>
			</tr>
		{% endfor %}
		</tbody>
</table>
<a class='btn btn-primary add' href='{{url.get(baseHref~"/frm")}}' data-ajax="{{ baseHref ~ "/frm/"}}">Ajouter...</a>
{% if script_foot is defined %}
    {{ script_foot }}
{% endif %}