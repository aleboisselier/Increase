{{ form("projects/update", "method": "post", "name":"manageUc", "id":"manageUc") }}
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
		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-default validate">
			<a class="btn btn-default cancel" href="{{url.get("projects")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
		</div>
	</fieldset>
</form>


{{ script_foot }}
