<fieldset>
	<legend>Gérer un Projet : <a class="" href="{{ baseHref }}/Projects/show/{{ project.getId() }}">{{ project }}</a></legend>
	<div class="form-group">
		<select class="form-control selectUc" id="selectUc" onChange="var e = document.getElementById('selectUc');var str = e.options[e.selectedIndex].value;e.setAttribute('data-ajax',str);" >
			<option value="Projects/manageUc">Choisissez une action...</option>
			<option class="optionUc" value="Projects/manageUc/null/{{ project.getId() }}">Ajouter un nouvel Use Case</option>
			{% for uc in ucs %}
				<option class="optionUc" id="{{uc.getId()}}" value="Projects/manageUc/{{ uc.getId() }}">
					{{uc.getNom()}}
				</option>
			{% endfor %}
		</select>
	</div>
	<div class="infoUc" style="display:none">
	</div>
</fieldset>

<table class='table table-striped'>
		<tbody>
		{% for uc in ucs %}
			<tr>
				<td>{{uc.getNom()}}</td>
				<td class='td-center'>
					<a class='btn btn-primary btn-xs update' id="Projects/manageUc/{{ uc.getId() }}"
					data-toggle="tooltip" data-placement="top" title="Modifier l'UC">
						<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
					</a>
					</td>
				<td class='td-center'>
					<a class='btn btn-warning btn-xs delete' id="Projects/manageUc/{{ uc.getId() }}"
					data-toggle="tooltip" data-placement="top" title="Supprimer l'UC">
						<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
					</a>
				</td>
			</tr>
		{% endfor %}
		</tbody>
</table>
<a class='btn btn-primary add'>Ajouter...</a>
{% if script_foot is defined %}
    {{ script_foot }}
{% endif %}
