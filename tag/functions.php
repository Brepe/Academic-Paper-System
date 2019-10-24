<?php

require_once('../config.php');
require_once(DBAPI);

$tag = null;

/**
 *  Listagem de tcc
 */
function index() {
	global $tag;
	$tag = find_all('tag');
}
/**
 *  Listagem de areas pra tag
 */
function select() {
	global $areastag;
	$areastag = find_all('area');
}

/**
 *  Cadastro de tcc
 */
function add() {

  if (!empty($_POST['tag'])) {
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $tag = $_POST['tag'];
    //$tag['modified'] = $tag['created'] = $today->format("Y-m-d H:i:s");
    
    save('tag', $tag);
    header('location: index.php');
  }
}

/**
 *	Atualizacao/Edicao de tcc
 */
function edit() {

    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

    if (isset($_GET['id'])) {
  
      $id = $_GET['id'];
  
      if (isset($_POST['tag'])) {

        $tag = $_POST['tag'];
        //$tag['modified'] = $now->format("Y-m-d H:i:s");
  
        update('tag', $id, $tag);
        header('location: index.php');
      } else {

        global $tag;
        $tag = find('tag', $id);
      } 
    } else {

     header('location: index.php');
    }
}

  /**
 *  Visualização de um tcc
 */
function view($id = null) {
    global $tag;
    $tag = find('tag', $id);
}

  /**
 *  Visualização de um tcc
 */
function view_fk($id = null) {
  global $tagfk;
  $tagfk = find('area', $id);
}
  /**
 *  Exclusão de um tcc
 */
function delete($id = null) {

    global $tag;
    $tag = remove('tag', $id);
  
    header('location: index.php');
}