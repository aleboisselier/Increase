<form id="userForm" method="post" action="Users/update" name="userForm" onsubmit="return:false;">
  <div class="form-group">
    <input type="hidden" class="form-control" name="id" value="{{ user.getId() }}"/>
  </div>
  <div class="form-group">
    <label for="identite">Identité</label>
    <input type="text" class="form-control" id="identite" placeholder="Identité" name="identite" value="{{ user.getIdentite() }}">
  </div>
  <div class="form-group">
    <label for="role">Rôle</label>
    <input type="text" class="form-control" id="role" placeholder="Rôle(s)" name="role" value="{{ user.getRole() }}">
  </div>
  <div class="form-group">
    <label for="mail">Mail</label>
    <input type="text" class="form-control" id="mail" placeholder="Mail" name="mail" value="{{ user.getMail() }}">
  </div>
 
<div class="btn-toolbar pull-right">
	<div class="btn-group" role="group">
	    <button type="submit" class="btn btn-success updateUser" id="{{ user.getId() }}"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>&nbsp;Valider</button>
	    <button class="btn btn-warning cancelUser" id="{{ user.getId() }}">Annuler&nbsp;<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span></button>
	</div>
	<div class="btn-group" role="group">
	    <button class="btn btn-danger delUser" id="{{ user.getId() }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Supprimer l'utilisateur</button>
	</div>
</div>
<div class="clearfix"></div>
</form>

{{ script_foot }}