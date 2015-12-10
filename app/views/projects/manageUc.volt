{{ form("usecases/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
	<div class="form-group">
		<label for="libelle">Nom</label>
		<input type="text" name="nom" id="nom" value="{{uc.getNom()}}" class="form-control">
	</div>
	<div class="form-group">
		<label for="poid">Poid :</label>
		<input type="text" name="poid" id="poid" value="{{uc.getPoids()}}" class="form-control">
	</div>
	<div class="form-group">
		<select class="form-control">
			{% for user in users %}	
				<option value="{{user.getId()}}" {% if user.getId()==uc.getIdDev() %}selected{% endif %}> 
					{{user.getIdentite()}} ({{user.getRole()}})
				</option>
			{% endfor %}
		</select>
	</div>
</form>
{{ script_foot }}