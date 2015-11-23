<fieldset>
	<div class="alert alert-info">Projet : {{projet}}</div>
	<div class="form-group">
		<input type="hidden" name="id" id="id" value="{{projet.getId()}}">
		<input type="text" name="description" id="description" value="{{projet.getDescription()}}">
	</div>
	</fieldset>
</form>
{{ script_foot }}