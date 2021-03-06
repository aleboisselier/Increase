{{ form("usecases/updateFromProject", "method": "post", "name":"frmObject", "id":"frmObject") }}
<div class="cancelUC btn btn-default" style="position:absolute; right:5%; top:1.5%">
	<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
</div>
	<fieldset>
	<legend>Ajouter/modifier une UseCase : </legend>
		<div class="form-group">
			<input type="hidden" name="id" id="id" value="{{usecase.getId()}}">
		</div>		
		<div class="form-group">
			<label for="libelle">Code</label>
			<input type="text" name="code" id="code" class="form-control" value="{{usecase.getCode()}}" {% if usecase.getCode() != "" %}disabled{% endif %} />
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
			<label for="avancement">Avancement</label>
			<input type="range" min="0" max="100" step="1" value="{{ usecase.getAvancement() }}" data-orientation="horizontal" name="avancement" id="avancement" disabled>
			<div><h1 class="avancement text-center">{{ usecase.getAvancement() }}%</h1></div>
		</div>
		
		<div class="form-group">
			<table class='table table-striped'>
				<tbody>
					{% for task in tasks %}
					<tr>
						<td>{{task.getLibelle()}}</td>
						<td class='td-center'>
							<div class='btn btn-primary btn-xs updateTask' id="{{ task.getId() }}"
							data-toggle="tooltip" data-placement="top" title="Modifier la tâche">
								<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
							</div>
						</td>
						<td class='td-center'>
							<a class='btn btn-warning btn-xs delete'
							href='{{url.get("Taches/delete/"~task.getId())}}'
							data-ajax="Taches/delete/{{task.getId()}}"
							data-toggle="tooltip" data-placement="top" title="Supprimer la tâche">
								<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
							</a>
						</td>
					</tr>
					{% endfor %}
				</tbody>
			</table>
			<div class='btn btn-primary addTask' id="NULL/{{usecase.getId()}}">Ajouter une tâche...</div>
		</div>
		
	</fieldset>
</form>

<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default validateUpUc">
	<div class="btn btn-default cancelUC" >Annuler</a>
</div>

</div>
<div class="tasks"></div>

{{ script_foot }}
