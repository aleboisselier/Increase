{{ form("projects/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
	<fieldset>
	<legend>Ajouter/modifier un Projet</legend>
		<div class="form-group">
			<input type="hidden" name="id" id="id" value="{{project.getId()}}">
		</div>
		<div class="form-group">
			<label for="libelle">Nom</label>
			<input type="text" name="nom" id="nom" value="{{project.getNom()}}" class="form-control">
		</div>
		<div class="form-group">
			<label for="libelle">Description</label>
			<textarea name="description" id="description" class="form-control">{{project.getDescription()}}</textarea>
		</div>
		<div class="form-group">
		    <label for="idClient">Client</label>
		    <select class="form-control" name="idCLient">
				{% for client in clients %}
					<option value="{{ client.getId() }}" {% if client.getId() == project.getIdClient() %}selected{% endif %}>{{ client.getIdentite() }}</option>
				{% endfor %}
			</select>
		  </div>
		<div class="form-group col-md-6">
			<label for="libelle">Date de Lancement</label>
			<input type="date" name="dateLancement" id="dateLancement" class="form-control" value="{{project.getDateLancement()}}"/>
		</div>
		<div class="form-group col-md-6">
			<label for="libelle">Date de Fin Prévue</label>
			<input type="date" name="dateFinPrevue" id="dateFinPrevue" class="form-control" value="{{project.getDateFinPrevue()}}"/>
		</div>
		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-default validate">
			<a class="btn btn-default cancel" href="{{url.get("projects")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
		</div>
	</fieldset>
</form>


{{ script_foot }}
