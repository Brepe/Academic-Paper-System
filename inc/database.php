<?php

mysqli_report(MYSQLI_REPORT_STRICT);

function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}

function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

/**
 *  Inclusão dos registros dinâmicos para tag cloud
 */
function tag_cloud() {
  
	$database = open_database();
	global $dinamic_tags;
	$dinamic_tags = null;

	try {
		$dinamic_tags = '[';

		$sql = "SELECT * FROM tag";
		$result = $database->query($sql);
		while ($row = $result->fetch_assoc()) {

			$sql_ = "SELECT * FROM projeto WHERE ID_TAG = " . $row['ID'];
			$result_ = $database->query($sql_);
			$num = $result_->num_rows + 2;
			$dinamic_tags .= '{"x": "'.$row['NOME_TAG'].'", value: '.$num.'},';
		  } 
		$dinamic_tags .= ']';
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $dinamic_tags;
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find( $table = null, $id = null, $relation = null, $tipo = null ) {
  
	$database = open_database();
	$found = null;

	try {
	  if ($relation){
		  if($tipo){
			$sql = "SELECT * FROM " . $table . " WHERE " . $relation . " = " . $id ." AND TIPO = '" . $tipo . "'";

		  }else{
			$sql = "SELECT * FROM " . $table . " WHERE " . $relation . " = " . $id;

		  }
		$result = $database->query($sql);
	    if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
	    }
	  }
	  else if ($id) {
		$sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
		$result = $database->query($sql);
	    if ($result->num_rows > 0) {
	      $found = $result->fetch_assoc();
	    }
	    
	  } else {
	    
	    $sql = "SELECT * FROM " . $table;
	    $result = $database->query($sql);
	    if ($result->num_rows > 0) {
		  $found = $result->fetch_all(MYSQLI_ASSOC);

        /* Metodo alternativo
        $found = array();

        while ($row = $result->fetch_assoc()) {
          array_push($found, $row);
        } */
	    }
	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $found;
}

/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function find_all( $table ) {
	return find($table);
}
  
function find_relation( $table, $id, $relation, $tipo ) {
	return find($table, $id, $relation, $tipo);
}
  
/**
*  Insere um registro no BD
*/
function save($table = null, $data = null) {

	$database = open_database();
  
	$columns = null;
	$values = null;
  
  
	foreach ($data as $key => $value) {
	  $columns .= trim($key, "'") . ",";
	  $values .= "'$value',";
	}
  
	// remove a ultima virgula
	$columns = rtrim($columns, ',');
	$values = rtrim($values, ',');
	
	$sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
  
	try {
	  $database->query($sql);
  
	  $_SESSION['message'] = 'Registro cadastrado com sucesso.';
	  $_SESSION['type'] = 'success';
	
	} catch (Exception $e) { 
	
	  $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
	  $_SESSION['type'] = 'danger';
	} 
  
	close_database($database);
}

/**
 *  Atualiza um registro em uma tabela, por ID
 */
function update($table = null, $id = 0, $data = null) {

	$database = open_database();
  
	$items = null;
  
	foreach ($data as $key => $value) {
	  $items .= trim($key, "'") . "='$value',";
	}
  
	// remove a ultima virgula
	//UPDATE area SET NOME_AREA='are4',ID_TAG='' WHERE id=2;

	$items = rtrim($items, ',');
  
	$sql  = "UPDATE " . $table;
	$sql .= " SET $items";
	$sql .= " WHERE id=" . $id . ";";
	try {
	  $database->query($sql);
  
	  $_SESSION['message'] = 'Registro atualizado com sucesso.';
	  $_SESSION['type'] = 'success';
  
	} catch (Exception $e) { 
  
	  $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
	  $_SESSION['type'] = 'danger';
	} 
  
	close_database($database);
}

  /**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
 function remove( $table = null, $id = null ) {

	$database = open_database();
	  
	try {
	  if ($id) {
  
		$sql = "DELETE FROM " . $table . " WHERE id = " . $id;
		$result = $database->query($sql);
  
		if ($result = $database->query($sql)) {   	
		  $_SESSION['message'] = "Registro Removido com Sucesso.";
		  $_SESSION['type'] = 'success';
		}
	  }
	} catch (Exception $e) { 
  
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
	}
  
	close_database($database);
}
/**
 *  Atualiza um registro em uma tabela, por ID
 */
function show_list($table = null, $id = 0) {

	$database = open_database();
	$found = null;

	try {
	  if ($id) {
	    $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
	    $result = $database->query($sql);
	    if ($result->num_rows > 0) {
	      $found = $result->fetch_assoc();
	    }
	    
	  } else {
	    
	    $sql = "SELECT * FROM " . $table;
	    $result = $database->query($sql);

	    if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
        /* Metodo alternativo
        $found = array();

        while ($row = $result->fetch_assoc()) {
          array_push($found, $row);
        } */
	    }
	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
  
	close_database($database);
}


/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function exist_db($table = null, $column = null, $value = null) {
  
	$database = open_database();
	$found = 0;

	try {
	  if ($table && $column && $value){
			$sql = "SELECT * FROM " . $table . " WHERE " . $column . " = " . $value;
			$result = $database->query($sql);
			if ($result->num_rows > 0) {
				$found = $result->fetch_all(MYSQLI_ASSOC);
			}
	  }

	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $found;
}