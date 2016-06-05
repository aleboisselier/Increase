<legend>Gérer un Projet : <a class="" href="{{ baseHref }}/Projects/show/{{ project.getId() }}">{{ project }}</a></legend>

<div class="viewUC" style="visibility:hidden">
	{% if usecase is defined %}
		Modifier l'Use Case "{{ucModify.getNom()}}"
	{% endif %}
</div>

<table class='table table-striped'>
	<tbody>
	{% for uc in ucs %}
		<tr>
			<td>{{uc.getNom()}}</td>
			<td class='td-center'>
				<div class='btn btn-primary btn-xs updateUC' id="{{ uc.getId() }}"
					data-toggle="tooltip" data-placement="top" title="Modifier l'UC">
					<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
				</div>
				</td>
			<td class='td-center'>
				<a class='btn btn-warning btn-xs delete'
				href='{{url.get("Usecases/delete/"~uc.getId())}}'
				data-toggle="tooltip" data-placement="top" title="Supprimer l'UC">
					<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
				</a>
			</td>
		</tr>
	{% endfor %}
	</tbody>
</table>
<div class='btn btn-primary addUC' id="{{project.getId()}}">Ajouter...</a>
{% if script_foot is defined %}
    {{ script_foot }}
{% endif %}
