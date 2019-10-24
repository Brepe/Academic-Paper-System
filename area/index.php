<?php
	require_once('functions.php');
	index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Áreas</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Nova área</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>
<script>
function Delete(id){

  //var id = button.data('customer');
    var modal = $('#delete-modals');
    modal.show();
    console.log(modal);

    modal.find('.modal-title').text('Excluir tcc #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id=' + id);

  }
  </script>
<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead  align="center">
	<tr>
		<th>ID</th>
		<th width="30%">Nome</th>
		<th width="30%">TAG</th>
		<th>Opções</th>
	</tr>
</thead>
<tbody  align="center">
<div class="modal fade" tabindex="-1" role="dialog" id="delete-modals">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Realmente deseja excluir este registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> 
        <a class="btn btn-danger text-white btn-excluir confirm">Excluir</a>
      </div>
    </div>
  </div>
</div>

<?php if ($area) : ?>
<?php foreach ($area as $area) : ?>
	<tr>
		<td><?php echo $area['ID']; ?></td>
		<td width="30%"><?php echo $area['NOME_AREA']; ?></td>
		<td width="30%">
			<?php view_fk($area['ID_TAG'], 'tag'); ?>
			<?php if ($tagfk) : ?>
				<?php echo $tagfk['NOME_TAG']; ?>
			<?php else : ?>
				-
			<?php endif; ?>
		</td>
		<td class="actions"><!--  text-right -->
			<a href="view.php?id=<?php echo $area['ID']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $area['ID']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<button class="btn btn-sm btn-danger" onClick="javascript:Delete(<?php echo $area['ID']; ?>);">
				<i class="fa fa-trash"></i> Excluir
			</button>
			<br/><br/>
			<a href="../projeto/index.php?id_fk=<?php echo $area['ID']; ?>&tipo=<?php echo $_GET['tipo']?>" class="btn btn-sm btn-secondary"><i class="fa fa-file-text-o"></i> Projetos da área</a>

		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>