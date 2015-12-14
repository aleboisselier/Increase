{{ form("usecases/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
	<fieldset>
	<legend>Ajouter/modifier un Projet</legend>
		<div class="form-group">
			<input type="hidden" name="id" id="id" value="{{usecase.getCode()}}">
		</div>		
		<div class="form-group">
			<label for="libelle">Code</label>
			<input type="text" name="code" id="code" class="form-control" value="{{usecase.getCode()}}" {% if usecase.getCode() != "" %}disabled{% endif %}/>
		</div>
		<div class="form-group">
			<label for="libelle">Nom</label>
			<input type="text" name="nom" id="nom" class="form-control" value="{{usecase.getNom()}}"/>
		</div>
		<div class="form-group">
		    <label for="idProjet">Projet</label>
		    <select class="form-control" name="idProjet" {% if usecase.getId() > 0 %}disabled{% endif %} >
				{% for project in projects %}
					<option value="{{ project.getId() }}" {% if project.getId() == usecase.getIdProjet() %}selected{% endif %}>{{ project }}</option>
				{% endfor %}
			</select>
		  </div>
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
			<label for="avancement">Avancement</label>
			<input type="range" min="0" max="100" step="1" value="{{ usecase.getAvancement() }}" data-orientation="horizontal" name="avancement" id="avancement" disabled>
			<div><h1 class="avancement text-center">{{ usecase.getAvancement() }}%</h1></div>
		</div>
		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-default validate">
			<a class="btn btn-default cancel" href="{{url.get("usecases")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
		</div>
	</fieldset>
</form>


{{ script_foot }}
