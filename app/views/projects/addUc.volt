{{ form("usecases/updateFromProject", "method": "post", "name":"frmObject", "id":"frmObject") }}
	<fieldset>
	<legend>Ajouter/modifier un Projet</legend>
		<div class="form-group">
			<input type="hidden" name="id" id="id" value="">
		</div>		
		<div class="form-group">
			<label for="libelle">Code</label>
			<input type="text" name="code" id="code" class="form-control" value="{{usecase.getCode()}}" {% if usecase.getCode() != "" %}disabled{% endif %}/>
		</div>
		<div class="form-group">
			<label for="libelle">Nom</label>
			<input type="text" name="nom" id="nom" class="form-control" value="{{usecase.getNom()}}"/>
		</div>
		<input type="hidden" value="{{usecase.getIdProjet()}}" name="idProjet">
		<div class="form-group">
		    <label for="idUser">Développeur</label>
		    <select class="form-control" name="idDev">
				{% for user in users %}
					<option value="{{ user.getId() }}" {% if user.getId() == usecase.getIdDev() %}selected{% endif %}>{{ user.getIdentite() }}</option>
				{% endfor %}
			</select>
		  </div>
		<div class="form-group">
			<label for="libelle">Poids</label>
			<input type="text" name="poids" id="poids" class="form-control" value="{{usecase.getPoids()}}"/>
		</div>
		<div class="form-group">
			<input type="hidden" name="avancement" id="avancement" value="0">
		</div>
		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-default validateUpUc">
			<a class="btn btn-default cancel" href="{{url.get("usecases")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
		</div>
	</fieldset>
</form>
{{ script_foot }}