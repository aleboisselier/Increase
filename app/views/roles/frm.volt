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
<legend>Droits du Groupe</legend>

{% for key, controller in controllers %}
{{ form("Roles/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
<div class="panel panel-success">
	<div class="panel-heading"><h3 class="panel-title pull-left">{{ controller['name'] }}</h3><button class="btn btn-success btn-xs pull-right" type="submit">Mettre à jour</button><div class="clearfix"></div></div>
		<div class="panel-body">
			<div class="row">
				{% for key, action in controllers['Default']['actions'] %}
					<div class="col-md-3">
						<div class="checkbox"><label><input type="checkbox" value="{{ key }}"> {{ action }}</label></div>
					</div>
				{% endfor %}
				{% if key == "Default" %}
					{% for actionKey, action in controller['actions'] %}
						<div class="col-md-3">
							<div class="checkbox"><label><input type="checkbox" value="{{ actionKey }}"> {{ action }}</label></div>
						</div>
					{% endfor %}
				{% endif %}
			</div>
		</div>
	</div>
</form>
{% endfor %}


{{ script_foot }}
