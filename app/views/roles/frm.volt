{{ form("Role/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
	<fieldset>
	<legend>Ajouter/modifier un Rôle</legend>
		<div class="form-group">
			<input type="hidden" name="id" id="id" value="{{role.getId()}}">
		</div>
		<div class="form-group">
			<label for="libelle">Libellé</label>
			<input type="text" name="libelle" id="libelle" value="{{role.getLibelle()}}" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-default validate">
			<a class="btn btn-default cancel" href="{{url.get("Roles")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
		</div>
	</fieldset>
</form>

<hr>

{{ form("Roles/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
	<legend>Droits du Groupe</legend>
	<div id="list">
		{% for acl in acls %}
			<div class="row" style="margin-top:10px;">
				<div class="col-md-4"></div>
				<div class="input-group col-md-4">
					<select class="form-control" name="controllers[]">
						{% for key, controller in controllers %}
							<option value="{{ key }}" {% if key == acl.getController() %}selected{% endif %}>{{ controller['name'] }}</option>
						{% endfor %}
					</select>
					<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></span>
					<select class="form-control" name="acl[]">
						{% for key, action in controllers['Default']['actions'] %}
							<option value="{{ key }}" {% if key == acl.getAction() %}selected{% endif %}>{{ action }}</option>
						{% endfor %}
					</select>
				</div>
			</div>
		{% endfor %}
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-4"></div>
		<div class="input-group col-md-4">
			<button type="button" class="btn btn-default btn-block">Ajouter</button>
		</div>
	</div>
</form>


{{ script_foot }}
