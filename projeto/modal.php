<?php

/**
 *  Exclusão de um tcc
 */
function delete($id = null) {
  global $projeto;
  $projeto = remove('projeto', $id);

  header('location: index.php?id_fk='.$_GET['id_fk']);
}