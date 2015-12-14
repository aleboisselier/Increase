<fieldset>
	<legend>Ajouter/modifier un Uc</legend>
	<div class="form-group">
		<select class="form-control selectUc" id="selectUc" onChange="var e = document.getElementById('selectUc');var str = e.options[e.selectedIndex].value;e.setAttribute('data-ajax',str);" >
			<option>Choisissez une action...</option>
			<option class="optionUc" data-ajax="Projects/addUc">Ajouter un nouvel Use Case</option>
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

{{ script_foot }}
