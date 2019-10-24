<?php 
  require_once('functions.php');
  select();
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar área</h2>
<?php if ($msg){ echo $msg ?>
  <script>
      window.setTimeout(function(){
      // Move to a new location or you can do something else
     // window.location.href = "index.php";

      }, 3000);
  </script>
 <?php }?>
<form action="edit.php?id=<?php echo $area['ID']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="area['NOME_AREA']" value="<?php echo $area['NOME_AREA']; ?>">
    </div>


    <div class="form-group col-md-3">
      <label for="campo2">Tag</label>

      <select name="area['ID_TAG']" class="form-control">
      <option value="">Selecione</option>
        <?php if ($tagareas) : ?>
            <?php foreach ($tagareas as $atag) : ?>
            <option value="<?php echo $atag['ID']; ?>" 
              <?php if ($area['ID_TAG'] == $atag['ID']) : ?> selected <?php endif; ?>>
              <?php echo $atag['NOME_TAG']; ?>
            </option>
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