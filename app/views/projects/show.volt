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
		<br>
		<div class="description">
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

		<h3>Use Cases : </h3>
		<div class="btn btn-primary btn-block displayUcs">Afficher les Use Cases</div>
		<div class="btn btn-primary btn-block hideUcs" style="display:none">Cacher les Use Cases</div>
		<div class="ucs" style="display:none;">
		<br>
			{% for u in ucs %}
				<div class="panel panel-default">
	  				<div class="panel-heading">
		  				{{ u }}<!--  {{ poids }}-->
							{% if tachesUcs[u.getCode()]|length > 0 %}							
		  						<a class="loadTasks" id="{{ u.getCode() }}" data-ajax="Json/listTaches/{{ u.getCode() }}">
		  							<span class="glyphicon glyphicon-eye-open pull-right" style="color:rgba(0,0,0,0.7); cursor:pointer"></span>
		  						</a>
		  						<a class="hideTasks" id="{{ u.getCode() }}" style="display:none;">
		  							<span class="glyphicon glyphicon-eye-close pull-right" style="color:rgba(0,0,0,0.7); cursor:pointer"></span>
		  						</a>
		  					{% endif %}
					</div>
					<div class="viewUc" id="{{ u.getCode() }}">
		  				<table class="table" id="{{ u.getCode() }}" style="display:none">
					  	</table>
				  	</div>
				</div>
			{% endfor %}
		</div>
		
		<h3>Messages : </h3>
		
		{% if nbMessages > 0 %}
			<a href="" data-ajax="Json/loadMessages/{{ projet.getId() }}" class="btn btn-primary loadMessages btn-block" >Afficher {{ nbMessages }} message{% if nbMessages > 1 %}s{% endif%}.</a>
		{% else %}
			<a class="btn btn-primary load btn-block disabled">Aucun Message à Afficher.</a>
		{% endif%}
		
		<div class="messages" style="display:none">
			<a class="btn btn-primary load btn-block hideMessages" style="margin-bottom: 25px;">Masquer les Messages</a>
			<div class="msgTemplate">
				<div class="col-md-11 pull-right">
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
					  	<div class="panel-footer">
					  		<small class="pull-right"> <a id="[[id]]" class="loadReponses" data-ajax="Json/loadMessages/{{ projet.getId() }}/[[id]]" >Afficher [[responses]] réponses</a></small>
					  		<div class="clearfix"></div>
					  	</div>
				</div>
				<div class="responses [[id]]"></div>
			</div>
		</div>
	</div>
</fieldset>

{{ script_foot }}
