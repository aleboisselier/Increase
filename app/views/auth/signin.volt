<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		{{ form("Auth/login", "method": "post", "name":"frmLogin", "id":"frmLogin") }}
		<h1 class="text-center text-success">Connexion</h1>
		  <div class="form-group">
		    <label for="mail">Adresse Mail</label>
		    <input type="email" class="form-control" id="mail" placeholder="Email" name="mail">
		  </div>
		  <div class="form-group">
		    <label for="pass">Mot de passe</label>
		    <input type="password" class="form-control" id="pass" placeholder="Mot de passe" name="pass">
		  </div>
		  <button type="submit" class="btn btn-success btn-block btn-lg validate">Se Connecter <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> </button>
		  <div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Connexion Rapide <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
			    {% for role in roles %}
					<li><a class="fastConnect" id="{{ role.getId() }}">{{ role }}</a></li>
			    {% endfor %}
			  </ul>
			</div>
		</form>
	</div>
</div>
{{ script_foot }}