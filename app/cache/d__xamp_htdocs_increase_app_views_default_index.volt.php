<?php if (isset($q['alertResult'])) { ?> 
	<?php echo $q['alertResult']; ?>
<?php } ?>
<table class='table table-striped'>
	<thead><tr><th colspan="2"><span class="glyphicon glyphicon-<?php echo $controllerIcon; ?>" aria-hidden="true"></span>&nbsp;<?php echo $title; ?></th></tr></thead>
	<tbody>
		<?php foreach ($objects as $object) { ?>	
			<tr>
				<td><?php echo $object; ?> </td>
				<td class='td-center'><a class='btn btn-primary btn-xs pull-right editBtn' id="<?php echo $object->getId(); ?>" href='' data-toggle="tooltip" data-placement="top" title="Afficher les Détails"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<a class='btn btn-primary editBtn' href='' id="0">Ajouter...</a>

<?php echo $script_foot; ?>