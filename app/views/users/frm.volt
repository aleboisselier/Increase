{{ form("Users/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
<fieldset>
<legend>Ajouter/modifier un utilisateur</legend>
<div class="alert alert-info">Utilisateur : {{user}}</div>
<div class="form-group">
	<input type="hidden" name="id" id="id" value="{{user.getId()}}">
	<input type="text" name="identite" id="identite" value="{{user.getIdentite()}}" placeholder="Entrez votre identité" class="form-control">
	<input type="mail" name="mail" id="mail" value="{{user.getMail()}}" placeholder="Entrez l'adresse email" class="form-control">
	<input type="password" name="password" id="password" value="{{user.getPassword()}}" placeholder="Entrez le mot de passe" class="form-control">
	{{ q["role"] }}
</div>
<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default validate">
	<a class="btn btn-default cancel" href="{{url.get("Users")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
</div>
</fieldset>
</form>
{{ script_foot }}