{{ form("messages/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
	<fieldset>
	<legend>Ajouter/modifier un Message</legend>
		<div class="form-group">
			<input type="hidden" name="id" id="id" value="{{message.getId()}}">
		</div>
		<div class="form-group">
		    <label for="idProjet">Projet</label>
		    <select class="form-control" name="idProjet">
				{% for project in projects %}
					<option value="{{ project.getId() }}" {% if project.getId() == message.getIdProjet() %}selected{% endif %}>{{ project }}</option>
				{% endfor %}
			</select>
		  </div>
		<div class="form-group">
		    <label for="idUser">Utilisateur</label>
		    <select class="form-control" name="idUser">
				{% for user in users %}
					<option value="{{ user.getId() }}" {% if user.getId() == message.getIdUser() %}selected{% endif %}>{{ user.getIdentite() }}</option>
				{% endfor %}
			</select>
		  </div>
		  <div class="form-group">
			<label for="libelle">Objet</label>
			<input type="text" name="objet" id="objet" class="form-control" value="{{message.getObjet()}}"/>
		</div>
		<div class="form-group">
			<label for="libelle">Contenu</label>
			<textarea name="content" id="content" class="form-control">{{message.getContent()}}</textarea>
		</div>
		<div class="form-group">
			<label for="libelle">Date</label>
			<input type="datetime" name="date" id="date" class="form-control" value="{{message.getDate()}}"/>
		</div>
		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-default validate">
			<a class="btn btn-default cancel" href="{{url.get("messages")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
		</div>
	</fieldset>
</form>


{{ script_foot }}
