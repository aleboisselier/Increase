<fieldset>
	<div class="alert alert-success row" style="border-radius:0px">
		{% if projet.getImage()==NULL %}
			<img src="{{siteUrl}}/public/img/phalconIcon.png" style="float:left">
		{% else %}
			<img src="{{siteUrl~projet.getImage()}}" style="float:left">
		{% endif %}
		<p class="margin-top:50%" style="float:left; margin:1%;">
			<span class="title" style="font-size:25px"> Projet : </span><b id="nomProjet">{{projet}}</b>
		</p>
	</div>
	<div class="form-group row">
		<h3>Commanditaire du projet :</h3>
		{{projet.getClient()}}
		
		<h3>Dates :</h3>
		<div class="date row">
			<div class="col-md-5">Lancement : {{projet.getDateLancement()}}</div>
			<div class="col-md-5">Fin prévue : {{projet.getDateFinPrevue()}}</div>
		</div>
		
		<h3>Description : </h3>
		{{projet.getDescription()}}
 	</fieldset>
 </form>