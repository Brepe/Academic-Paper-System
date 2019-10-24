<?php 
  require_once('functions.php');
  select();
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar tag</h2>

<form action="edit.php?id=<?php echo $tag['ID']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="tag['NOME_TAG']" value="<?php echo $tag['NOME_TAG']; ?>">
    </div>


    <div class="form-group col-md-3">
      <label for="campo2">Área</label>

      <select name="tag['ID_AREA']" class="form-control">
      <option value="">Selecione</option>
        <?php if ($areastag) : ?>
            <?php foreach ($areastag as $atag) : ?>
            <option value="<?php echo $atag['ID']; ?>"><?php echo $atag['NOME_AREA']; ?></option>
            <?php endforeach; ?>
        <?php else : ?>
        
        <?php endif; ?>

      </select>
    </div>



  </div>

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>