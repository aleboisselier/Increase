<fieldset style="margin:-30px;">
	<div class="col-md-3 col-xs-3 ticket" id="color">
		<div class="imgProjet row">
			{% if projet.getImage()==NULL %}
				<img src="{{siteUrl}}img/phalconIcon.png" class="img-circle" alt="imageProject" id="imageProject" style="width:100%">
			{% else %}
				<img src="{{siteUrl~projet.getImage()}}" class="img-circle" alt="imageProject" id="imageProject" style="width:100%">
			{% endif %}
		</div>
		<div class="client row">
			{{projet.getClient()}}
		</div>
		<div class="percentage"> 
			{{avancement}} %
		</div>
			
	</div>
	<div class="form-group col-md-7 col-xs-7" style="margin-left:5%">
		<h1 class="titleProject">{{projet}}</h1>
		<div class="date row">
			<div class="col-md-10">Lancement : {{projet.getDateLancement()}} // Fin prévue : {{projet.getDateFinPrevue()}}</div>
		</div>
		<br>
		Temps Ecoulé : 
		<div class="progress">
			<div class="progress-bar progress-bar-success" 
				role="progressbar" 
				aria-valuenow="40" 
				aria-valuemin="0" 
				aria-valuemax="100" 
				style="width: {{tmpEcoule}}">
				{% if tmpEcoule=="0%" %}
					<b style="color:red">{{tmpEcoule}}</b>
				{% else %}
					<b>{{tmpEcoule}}</b>
				{% endif%}
			</div>
			
		</div>
		Pourcentage du projet effectué : 
		<div class="progress">
			<div class="progress-bar progress-bar-info" 
				role="progressbar" 
				aria-valuenow="{{avancement}}" 
				aria-valuemin="0" 
				aria-valuemax="100" 
				style="width: {{avancement}}%">
				{% if avancement==0 %}
					<b style="color:red">{{avancement}}%</b>
				{% else %}
					<b>{{avancement}}%</b>
				{% endif%}
			</div>
		</div>
		<div class="description" style="margin-top:15%">
			<h3>Description : </h3>
			{{projet.getDescription()}}
		</div>
		
		<table class="taskRepeat" style="display:none;" >
		<tr>
			<td class="col-md-6">[[libelle]]</td>
			<td class="col-md-6">
				<div class="progress">
					<div class="progress-bar progress-bar-success" role="progressbar"
						aria-valuenow="[[avancement]]" aria-valuemin="0"
						aria-valuemax="100" style="width: [[avancement]]%;">[[avancement]]%</div>
				</div>
			</td>
		</tr>	
		</table>

		<div class="ucs" style="margin-top:15%">
			<h3>Use Cases : </h3>
			{% for u in ucs %}
				<div class="panel panel-default">
	  				<div class="panel-heading loadTasks" id="{{ u.getCode() }}" data-ajax="Json/listTaches/{{ u.getCode() }}">
		  				{{ u }}
		  				{% for tachesUc in tachesUcs %}
							{% if u.getCode() == tachesUc %} 
							<span class="glyphicon chevron pull-right glyphicon-menu-down" id="{{ u.getCode() }}"></span> 
							{% endif %}
						{% endfor %}
					</div>
	  				<table class="table" id="{{ u.getCode() }}">
				  	</table>
				</div>
			{% endfor %}
		</div>
		
		<h3>Messages : </h3>
		
		{% if nbMessages > 0 %}
			<a href="" data-ajax="Json/loadMessages/{{ projet.getId() }}" class="btn btn-primary loadMessages btn-block">Afficher {{ nbMessages }} message{% if nbMessages > 1 %}s{% endif%}.</a>
		{% else %}
			<a class="btn btn-primary load btn-block disabled">Aucun Message à Afficher.</a>
		{% endif%}
		
		<div class="messages" style="display:none">
			<div class="msgTemplate">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span>[[objet]]
							<small>Auteur :
								<i style="font-size:12px">[[author]]</i>
							</small>
						</span>
					</div>
				  	<div class="panel-body" id="[[id]]">
				  		<i>[[content]]</i>
				  	</div>
				</div>
				<div class="loadFil pull-right" data-ajax="Json/loadMessages/{{ projet.getId() }}/[[id]]">
					<span class="glyphicon glyphicon-eye-open" style="margin:20%;"></span>
				</div>
				<div class="responses"></div>
			</div>
			<a class="btn btn-primary load btn-block hideMessages">Masquer les Messages</a>
		</div>
	</div>
</fieldset>

{{ script_foot }}
