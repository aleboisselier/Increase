{{ form("Users/update", "method": "post", "name":"frmObject", "id":"frmObject") }}
  <div class="form-group">
    <input type="hidden" class="form-control" id="id" name="id" value="{{ user.getId() }}"/>
  </div>
  <div class="form-group">
    <label for="identite">Identité</label>
    <input type="text" class="form-control" id="identite" placeholder="Identité" name="identite" value="{{ user.getIdentite() }}">
  </div>
  <div class="form-group">
    <label for="role">Rôle</label>
    {{ q["role"] }}
  </div>
  <div class="form-group">
    <label for="mail">Mail</label>
    <input type="text" class="form-control" id="mail" placeholder="Mail" name="mail" value="{{ user.getMail() }}">
  </div>
 
<div class="btn-toolbar pull-right">
	<div class="btn-group" role="group">
	    <input type="submit" value="Valider" class="btn btn-default validate">
		<a class="btn btn-default cancel" href="{{url.get("Users")}}" data-ajax="{{ baseHref ~ "/index"}}">Annuler</a>
	</div>
</div>
<div class="clearfix"></div>
</form>
{{ script_foot }}