<table class='table table-striped'>
	<thead><tr><th colspan="3"><?php echo $title; ?></th></tr></thead>
	<tbody>
		<?php foreach ($objects as $object) { ?>	
			<tr>
				<td><?php echo $object; ?> </td>
				<td class='td-center'><a class='btn btn-primary btn-xs' href=''><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
				<td class='td-center'><a class='btn btn-warning btn-xs' href=''><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<a class='btn btn-primary' href='".$config["siteUrl"].$baseHref."/frm'>Ajouter...</a>