<?php

require_once('../config.php');
require_once(DBAPI);

$projeto = null;

/**
 *  Listagem de tcc
 */
function index($id = null, $tipo = null) {
  if ($id != null){
    global $projeto;
    $projeto = find_relation('projeto', $id, 'ID_AREA', $tipo);
  }else{
    global $projeto;
    $projeto = find_all('projeto');
  }
  
}
/**
 *  Listagem de areas pra tag e areas
 */
function select() {
	global $tagareas;
  $tagareas = find_all('area');

  global $areastag;
	$areastag = find_all('tag');
}

/**
 *  Cadastro de tcc
 */
function add() {
    global $msg;
    $msg = false; 
  if (!empty($_POST['projeto'])) {

    // arquivo
    $arquivo = $_FILES['arquivo'];
      //Define o diretorio para onde enviaremos o arquivo
      $diretorio = "uploads/";
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $projeto = $_POST['projeto'];

          // verifica se arquivo foi enviado e sem erros
          if( $arquivo['error'] == UPLOAD_ERR_OK ){
            //$novo_nome  = md5(time()).".pdf";
            $hora = time();
            // faz o upload
            $enviou = move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$hora.".pdf");
  
            if($enviou){
              $msg = "<p class='alert-success'><strong>Sucesso!</strong> Informações enviadas corretamente.</p>";
            }else{
                $msg = "<p class='alert-danger'><strong>Erro!</strong> Falha ao enviar o arquivo.</p>";
            }
          }

    //$projeto["HORA"] = $hora;
    $projeto["PDF"] = $hora.".pdf";
    //$projeto['modified'] = $projeto['created'] = $today->format("Y-m-d H:i:s");
    
    save('projeto', $projeto);
    header('location: index.php?id_fk='.$_GET['id_fk'].'&tipo='.$_GET['tipo']);
  }
}

/**
 *	Atualizacao/Edicao de tcc
 */
function edit() {
  global $msg;
  $msg = false;  

    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    if (isset($_GET['id'])) {
  
      $id = $_GET['id'];
  
      if (isset($_POST['projeto'])) {
        try{
         
          $projeto = $_POST['projeto'];
          //$projeto['modified'] = $now->format("Y-m-d H:i:s");
          $diretorio = "uploads/";
          $arquivo = $_FILES['arquivo'];

            // verifica se arquivo foi enviado e sem erros
            if( $arquivo['error'] == UPLOAD_ERR_OK){
              //$novo_nome  = md5(time()).".pdf";
              $hora = time();
              // faz o upload
              $enviou = move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$hora.".pdf");
    
              if($enviou){
                  $msg = "<p class='alert-success'><strong>Sucesso!</strong> Informações enviadas corretamente.</p>";
              }else{
                  $msg = "<p class='alert-danger'><strong>Erro!</strong> Falha ao enviar o arquivo.</p>";
              }
            }
          $projeto["PDF"] = $hora.".pdf";
          update('projeto', $id, $projeto);
          //header('location: edit.php?id_fk='.$_GET['id_fk']);//id_fk=<?php echo $_GET['id_fk']
        } catch (Exception $e) {
          $_SESSION['message'] = $e->GetMessage();
          $_SESSION['type'] = 'danger';
        }
      } else {

        global $projeto;
        $projeto = find('projeto', $id);
      } 
    } else {
      $msg = "<p class='alert-danger'><strong>Erro!</strong> Projeto não encontrado.</p>";
      header('location: index.php?id_fk='.$_GET['id_fk'].'&tipo='.$_GET['tipo']);
    }
}

  /**
 *  Visualização de um tcc
 */
function view($id = null) {
    global $projeto;
    $projeto = find('projeto', $id);
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

    global $projeto;
    $projeto = remove('projeto', $id);
  
    header('location: index.php?id_fk='.$_GET['id_fk'].'&tipo='.$_GET['tipo']);
}