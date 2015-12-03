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

		<div class="ucs" style="margin-top:15%">
			<h3>Use Cases : </h3>
			{% for u in ucs %}
				<div class="panel panel-default">
	  				<div class="panel-heading" id="{{ u.getCode() }}" data-ajax="Json/listTaches/{{ u.getCode() }}">{{ u }}</div>
	  				<table class="table" id="{{ u.getCode() }}">
	  					<tr class="taskRepeat" style="display:none;">
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
				</div>
			{% endfor %}
		</div>
		
		<div class="messages" style="margin-top:15%">
			<h3>Messages : </h3>
			{% for message in messages %}
				<div class="panel panel-primary" style="margin-top:5%">
					<div class="panel-heading">
						<h4>{{ message.getObjet()}}</h4>
					</div>
				  	<div class="panel-body">
				  		<i>{{message.getContent()}}</i>
				  	</div>
				  	<div class="panel-footer">
				  		Auteur :
						{% for user in users %}
								{% if user.getId() == message.getIdUser() %}
									{{ user.getIdentite() }}
								{% endif %}
						{% endfor %}
				  	</div>
				</div>
				<div class="repondre pull-right">
					<span class="glyphicon glyphicon-pencil" style="margin:22%;"></span>
				</div>
			</div>
			{% endfor %}
		</div>
</fieldset>

{{ script_foot }}
