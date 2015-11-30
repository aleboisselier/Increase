{{ form("taches/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
	<fieldset>
	<legend>Ajouter/modifier une Tâche</legend>
		<div class="form-group">
			<input type="hidden" name="id" id="id" value="{{tache.getId()}}">
		</div>
		<div class="form-group">
		    <label for="idProjet">UseCase</label>
		    <select class="form-control" name="idUseCase">
				{% for usecase in usecases %}
					<option value="{{ usecase.getId() }}" {% if usecase.getId() == tache.getCodeUseCase() %}selected{% endif %}>{{usecase.getProjet()}} - {{ usecase }}</option>
				{% endfor %}
			</select>
		  </div>
		  <div class="form-group">
			<label for="libelle">Libellé</label>
			<input type="text" name="libelle" id="libelle" class="form-control" value="{{tache.getLibelle()}}"/>
		</div>
		<div class="form-group">
			<label for="libelle">Date</label>
			<input type="datetime" name="date" id="date" class="form-control" value="{{tache.getDate()}}"/>
		</div>
		<div class="form-group">
			<label for="avancement">Avancement</label>
			<input type="range" min="0" max="100" step="5" value="{{ tache.getAvancement() }}" data-orientation="horizontal" name="avancement" id="avancement">
			<div><h1 class="avancement text-center">{{ tache.getAvancement() }}%</h1></div>
		</div>
		
		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-default validate">
			<a class="btn btn-default cancel" href="{{url.get("taches")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
		</div>
		
	</fieldset>
</form>


{{ script_foot }}
