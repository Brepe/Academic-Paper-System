<?php

require_once('../config.php');
require_once(DBAPI);

$area = null;

/**
 *  Listagem de tcc
 */
function index() {
	global $area;
	$area = find_all('area');
}
/**
 *  Listagem de areas pra tag
 */
function select() {
	global $tagareas;
	$tagareas = find_all('tag');
}

/**
 *  Cadastro de tcc
 */
function add() {
    global $msg;
    $msg = false;
  if (!empty($_POST['area'])) {

    $area = $_POST['area'];
    foreach ($area as $key => $value) {
      $column = trim($key, "'") ;
      $value = "'$value'";
      if($column == 'NOME_AREA' && exist_db('area', $column, $value) > 0)
        $msg .= "<p class='alert-danger'><strong>Erro!</strong> ". $column ." com valor ". $value ." já existe no banco de dados.</p>";
        
    }
    if (!$msg){
      save('area', $area);
      $msg = "<p class='alert-success'><strong>Sucesso!</strong> Informações enviadas corretamente.</p>";
    }

    //header('location: index.php');
  }
}
//Array ( ['NOME_AREA'] => are41 ['ID_TAG'] => 1 ) Array ( ['NOME_AREA'] => are41 ['ID_TAG'] => 1 )

/**
 *	Atualizacao/Edicao de tcc
 */
function edit() {
    global $msg;
    $msg = false;
    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

    if (isset($_GET['id'])) {
  
      $id = $_GET['id'];
  
      if (isset($_POST['area'])) {

        $area = $_POST['area'];
        
        foreach ($area as $key => $value) {
          $column = trim($key, "'") ;
          $value = "'$value'";
          $existe = exist_db('area', $column, $value);
          if($column == 'NOME_AREA' && $existe > 0 && $existe[0]['ID'] != $id)
            $msg .= "<p class='alert-danger'><strong>Erro!</strong> ". $column ." com valor ". $value ." já existe no banco de dados.</p>";
          
            
        }
        if (!$msg){
          //$tag['modified'] = $now->format("Y-m-d H:i:s");
          update('area', $id, $area);
          $msg = "<p class='alert-success'><strong>Sucesso!</strong> Informações enviadas corretamente.</p>";
          //header('location: index.php');
        }
      } else {

        global $area;
        $area = find('area', $id);
      } 
    } else {

     header('location: index.php');
    }
}

  /**
 *  Visualização de um tcc
 */
function view($id = null) {
    global $area;
    $area = find('area', $id);
}

  /**
 *  Visualização de um tcc
 */
function view_fk($id = null, $table=null) {
  global $tagfk;
  $tagfk = find($table, $id);

}

  /**
 *  Exclusão de um tcc
 */
function delete($id = null) {

    global $area;
    $area = remove('area', $id);
  
    header('location: index.php');
}