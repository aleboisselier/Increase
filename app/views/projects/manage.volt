<fieldset>
	<legend>Ajouter/modifier un Uc</legend>
	<div class="form-group">
		<select class="form-control selectUc">
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
