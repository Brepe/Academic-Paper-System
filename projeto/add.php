<?php 
  require_once('functions.php');
  select(); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo projeto</h2>
<?php if ($msg){ echo $msg ?>
  <script>
      window.setTimeout(function(){
      // Move to a new location or you can do something else
      window.location.href = "index.php?id_fk=<?php echo $_GET['id_fk']?>&tipo=<?php echo $_GET['tipo']?>";

      }, 3000);
  </script>
 <?php }?>
<form action="add.php?id_fk=<?php echo $_GET['id_fk']?>&tipo=<?php echo $_GET['tipo']?>" method="post" enctype="multipart/form-data">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="name">Nome discente</label>
      <input type="text" class="form-control" name="projeto['NOME_DISCENTE']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Curso discente</label>
      <input type="text" class="form-control" name="projeto['CURSO_DISCENTE']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Título</label>
      <input type="text" class="form-control" name="projeto['TITULO']">
    </div>

  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo4">Ano</label>
      <input type="text" class="form-control" name="projeto['ANO']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo5">Orientador</label>
      <input type="text" class="form-control" name="projeto['ORIENTADOR']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo6">Co-orientador</label>
      <input type="text" class="form-control" name="projeto['CO_ORIENTADOR']">
    </div>
    
  </div>  
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo7">Resumo</label>
      <input type="text" class="form-control" name="projeto['RESUMO']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo8">Palavras chave</label>
      <input type="text" class="form-control" name="projeto['PALAVRAS_CHAVE']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo9">Instituição de ensino </label>
      <input type="text" class="form-control" name="projeto['INSTITUTO_ENSINO']">
    </div>
    
  </div>  
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo10">Área</label>

      <select name="projeto['ID_AREA']" class="form-control">
      <option value="">Selecione</option>
        <?php if ($tagareas) : ?>
            <?php foreach ($tagareas as $atag) : ?>
            <option value="<?php echo $atag['ID']; ?>"><?php echo $atag['NOME_AREA']; ?></option>
            <?php endforeach; ?>
        <?php else : ?>
        
        <?php endif; ?>

      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="campo11">Tag</label>

      <select name="projeto['ID_TAG']" class="form-control">
      <option value="">Selecione</option>
        <?php if ($areastag) : ?>
            <?php foreach ($areastag as $atag) : ?>
            <option value="<?php echo $atag['ID']; ?>"><?php echo $atag['NOME_TAG']; ?></option>
            <?php endforeach; ?>
        <?php else : ?>
        
        <?php endif; ?>

      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="campo12">Tipo</label>

      <select name="projeto['TIPO']" class="form-control">
      <option value="TCC">TCC</option>
      <option value="IC">IC</option>
      </select>
    </div>

  </div>

  <div class="row">
    <div class="form-group col-md-3">
    <label for="campo13">PDF</label>

    <input type="file" name="arquivo">

    </div>
  </div>

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php?id_fk=<?php echo $_GET['id_fk']?>&tipo=<?php echo $_GET['tipo']?>" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>