<?php

/**
 *  Exclusão de um tcc
 */
function delete($id = null) {
  global $area;
  $area = remove('area', $id);

  header('location: index.php');
}