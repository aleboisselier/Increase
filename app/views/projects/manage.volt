<fieldset>
	<legend>Ajouter/modifier un Uc</legend>
	<div class="form-group">
		<select class="form-control selectUc">
			<option>Choisissez une action...</option>
			<option class="optionUc" data-ajax="Projects/addUc">Ajouter un nouvel Use Case</option>
			{% for uc in ucs %}
				<option value="{{uc.getId()}}" class="optionUc" id="{{uc.getId()}}" data-ajax="Projects/manageUc/{{ uc.getId() }}">
					{{uc.getNom()}}
				</option>
			{% endfor %}
		</select>
	</div>
	<div class="infoUc" style="display:none">
	</div>
</fieldset>


{{ script_foot }}
