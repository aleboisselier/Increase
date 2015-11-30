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
			<label for="libelle">Description</label>
			<textarea name="description" id="description" class="form-control">{{role.getDescription()}}</textarea>
		</div>
		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-default validate">
			<a class="btn btn-default cancel" href="{{url.get("Roles")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
		</div>
	</fieldset>
</form>

<hr>
<legend>Droits du Groupe</legend>
{{ form("Roles/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
<input type="hidden" value="{{ role.getId() }}"  name="idRole"/>
{% for key, controller in controllers %}
<div class="col-md-6">
<div class="panel panel-success">
	<div class="panel-heading"><h3 class="panel-title">{{ controller['name'] }}</h3></div>
		<div class="panel-body">
			<div class="row">
				{% for actionKey, action in controllers['Default']['actions'] %}
					<div class="col-md-3">
						<div class="checkbox"><label><input name="acl[]" type="checkbox" value="{{ key }}/{{ actionKey }}" {% if acls[key][actionKey] is defined  %}checked{% endif %}> {{ action }}</label></div>
					</div>
				{% endfor %}
				{% if key != "Default" %}
					{% for actionKey, action in controller['actions'] %}
						<div class="col-md-3">
							<div class="checkbox"><label><input name="acl[]" type="checkbox" value="{{ key }}/{{ actionKey }}" {% if acls[key][actionKey] is defined  %}checked{% endif %}> {{ action }}</label></div>
						</div>
					{% endfor %}
				{% endif %}
			</div>
		</div>
	</div>
	</div>
{% endfor %}
<div class="form-group">
	<input type="submit" value="Mettre à jour" class="btn btn-default validateACL">
	<a class="btn btn-default cancel" href="{{url.get("Roles")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
</div>
</form>

<div class="clearfix"></div>


{{ script_foot }}
