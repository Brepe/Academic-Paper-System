<?php

/**
 *  Exclusão de um tcc
 */
function delete($id = null) {
  global $tag;
  $tag = remove('tag', $id);

  header('location: index.php');
}