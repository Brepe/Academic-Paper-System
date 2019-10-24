<?php 
  require_once('functions.php');
  select();
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Nova área</h2>
<?php if ($msg){ echo $msg ?>
  <script>
      window.setTimeout(function(){
      // Move to a new location or you can do something else
      //window.location.href = "index.php";

      }, 3000);
  </script>
 <?php }?>
<script type="text/javascript" language="javascript">
      function checkForm() {
        console.log("=");
        // Fetching values from all input fields and storing them in variables.
        var nome = $('[name="area[\'NOME_AREA\']"]').val();
        var fk = $('[name="area[\'ID_TAG\']"]').val();
        console.log(nome);
        console.log(fk);

        //Check input Fields Should not be blanks.
        if (nome == '' || fk == '' ) {
            alert("Por favor preencha todos os campos.");
        } else {
            //Submit Form When All values are valid.
            document.getElementById("formarea").submit();
        }
    }

</script>
<div id="status"></div>
<form id="formarea" action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="area['NOME_AREA']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Tag</label>

      <select name="area['ID_TAG']" class="form-control">
      <option value="">Selecione</option>
        <?php if ($tagareas) : ?>
            <?php foreach ($tagareas as $atag) : ?>
            <option value="<?php echo $atag['ID']; ?>"><?php echo $atag['NOME_TAG']; ?></option>
            <?php endforeach; ?>
        <?php else : ?>
        
        <?php endif; ?>

      </select>
    </div>

  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="button" class="btn btn-primary" onclick="checkForm()">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>