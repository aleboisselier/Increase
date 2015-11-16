<ol class="breadcrumb">
	<li><a href="{{ siteUrl }}Index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Accueil</a></li>
	{% if ControllerName is defined and title != "" %}<li {% if ObjectName is defined%}class="active"{% endif %}><a href="{{ siteUrl }}{{ ControllerName }}"><span class="glyphicon glyphicon-{{ controllerIcon }}" aria-hidden="true"></span>&nbsp;{{ title }}</a></li>{% endif %}
	<li class="active objectBreadcrumb">{% if ObjectName is defined %}{{ ObjectName }}{% endif %}</li>
</ol>