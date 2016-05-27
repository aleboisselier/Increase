{% for  message in messages %}	
	<div class="msgTemplate">
		<div class="col-md-11 pull-right" style="padding:0">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<span>{{message.getObjet()}}
						<small class="pull-right">de 
							<i style="font-size:12px">{{message.getUser()}}</i>
						</small>
					</span>
				</div>
			  	<div class="panel-body" id="{{message.getId()}}">
			  		<i>{{message.getContent()}}</i>
			  		<small class="pull-right">Il y a {{message.getSince()}}</small>
			  	</div>
			  	<div class="panel-footer">
			  		<button class="btn btn-xs btn-default newResponse" id="{{message.getId()}}"><span class="glyphicon glyphicon-share-alt"></span></button>
			  		<small class="pull-right"> 
			  			<a style="cursor:pointer" id="{{message.getId()}}" class="loadReponses {{message.getId()}}" data-ajax="Json/loadMessages/{{ message.getProjet().getId() }}/{{message.getId()}}" >Afficher {{responses[message.getId()]}} réponses</a>
			  			<a style="cursor:pointer; display:none" class="unloadResponses {{message.getId()}}" onclick="$('.responses.{{message.getId()}}').slideUp(); $('.loadReponses.{{message.getId()}}').show(); $(this).hide();">Masquer les réponses</a>
			  		</small>
			  		<div class="clearfix"></div>
			  	</div>
			</div>
			<div class="responses {{message.getId()}}"></div>
		</div>
	</div>
{% endfor %}