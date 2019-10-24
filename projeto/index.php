<?php
	require_once('functions.php');
	index($_GET['id_fk'], $_GET['tipo']);

?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Projetos</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php?id_fk=<?php echo $_GET['id_fk']?>&tipo=<?php echo $_GET['tipo']?>"><i class="fa fa-plus"></i> Novo Projeto</a>
	    	<a class="btn btn-default" href="index.php?id_fk=<?php echo $_GET['id_fk']?>&tipo=<?php echo $_GET['tipo']?>"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>
<script>
function Delete(id){

  //var id = button.data('customer');
    var modal = $('#delete-modals');
    modal.show();
    console.log(modal);

    modal.find('.modal-title').text('Excluir projeto #' + id);
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
<thead>
	<tr>
		<th>Tipo</th>
		<th width="20%">Título</th>
		<th width="5%">Ano</th>
		<th width="20%">Discente</th>
		<th width="10%">Tags</th>
		<th width="10%">Área</th>

		<th>Opções</th>
	</tr>
</thead>
<tbody>
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

<?php if ($projeto) : ?>
<?php foreach ($projeto as $p) : ?>
	<tr>
		<td><?php echo $p['TIPO']; ?></td>
		<td width="20%"><?php echo $p['TITULO']; ?></td>
		<td width="5%"><?php echo $p['ANO']; ?></td>
		<td width="20%"><?php echo $p['NOME_DISCENTE']; ?></td>
		<td>
			<?php view_fk($p['ID_TAG'], 'tag'); ?>
			<?php if ($tagfk) : ?>
				<?php echo $tagfk['NOME_TAG']; ?>
			<?php else : ?>
				-
			<?php endif; ?>
		</td>
		<td>
			<?php view_fk($p['ID_AREA'], 'area'); ?>
			<?php if ($tagfk) : ?>
				<?php echo $tagfk['NOME_AREA']; ?>
			<?php else : ?>
				-
			<?php endif; ?>
		</td>
		<td class="actions"><!--  text-right -->
			<a href="view.php?id_fk=<?php echo $_GET['id_fk']?>&tipo=<?php echo $_GET['tipo']?>&id=<?php echo $p['ID']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id_fk=<?php echo $_GET['id_fk']?>&tipo=<?php echo $_GET['tipo']?>&id=<?php echo $p['ID']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<button class="btn btn-sm btn-danger" onClick="javascript:Delete(<?php echo $p['ID']; ?>);">
				<i class="fa fa-trash"></i> Excluir
			</button>
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