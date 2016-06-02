{{ form("taches/updateFromProject", "method": "post", "name":"frmTasks", "id":"frmTasks") }}
	<fieldset>
	<legend>Ajouter/modifier une Tâche</legend>
		<div class="form-group">
			<input type="hidden" name="id" id="id" value="{{tache.getId()}}">
			<input type="hidden" name="codeUseCase" id="id" value="{{tache.getcodeUseCase()}}">
			<input type="hidden" name="idProjet" id="id" value="{{tache.getUseCase().getIdProjet()}}">
		</div>
		  <div class="form-group">
			<label for="libelle">Libellé</label>
			<input type="text" name="libelle" id="libelle" class="form-control" value="{{tache.getLibelle()}}"/>
		</div>
		<div class="form-group">
			<label for="libelle">Date Max</label>
			<input type="date" name="date" id="date" class="form-control" value="{{tache.getDate()}}"/>
		</div>
		<div class="form-group">
			<label for="avancement">Avancement</label>
			<input type="range" min="0" max="100" step="5" value="{{ tache.getAvancement() }}" data-orientation="horizontal" name="avancement" id="avancement">
			<div><h1 class="avancementTasks text-center">{{ tache.getAvancement() }}%</h1></div>
		</div>
		
		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-default validateTasks">
			<div class="btn btn-default cancelTask" href="{{url.get("taches")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
		</div>
		
	</fieldset>
</form>


{{ script_foot }}
