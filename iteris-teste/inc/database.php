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
*  Pesquisa um Registro pelo ID em uma Tabela		 
*/		
function find( $table = null, $id = null ) {		  			

$database = open_database();			
$found = null;					

try {			  
	if ($id) {			    
		$sql = "SELECT id,numero,descricao,date_format(dataFaturamento,'%d/%m/%Y') as dataFaturamento,date_format(dataPagamento,'%d/%m/%Y') as dataPagamento,status FROM " . $table . " WHERE id = " . $id;			    
		$result = $database->query($sql);			    			    	    			  
		if ($result->num_rows > 0) {			      
			$found = $result->fetch_assoc();			    
		}
	} else {			    
		$sql = "SELECT id,numero,descricao,date_format(dataFaturamento,'%d/%m/%Y') as dataFaturamento,date_format(dataPagamento,'%d/%m/%Y') as dataPagamento,status FROM " . $table;
		//var_dump($sql);
		//die();

		$result = $database->query($sql);
		if ($result->num_rows > 0) {			      
			$found = $result->fetch_all(MYSQLI_ASSOC);	        		        
			/* Metodo alternativo		        
			$found = array();				        
			while ($row = $result->fetch_assoc()) {	          
				array_push($found, $row);	        
			}  */
		}			  
	}
	/*var_dump($found);
	die();*/
	return $found;	
} catch (Exception $e) {			  
	$_SESSION['message'] = $e->GetMessage();			  
	$_SESSION['type'] = 'danger';		  }						
	close_database($database);			
	return $found;		
}
				
/**		 
*  Pesquisa Todos os Registros de uma Tabela		 
*/		
function find_all( $table ) {		  
	return find($table);		
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
  
  //Pegar valores $arrayValues e colocar em variavel
	  $numero = $data["'numero'"];
	  $descricao = $data["'descricao'"];
	  $dataFaturamento = $data["'dataFaturamento'"];
	  $dataPagamento = $data["'dataPagamento'"];
	  $status = $data["'status'"];

  $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "('$numero','$descricao',STR_TO_DATE(\"$dataFaturamento\",\"%m/%d/%Y\"),STR_TO_DATE(\"$dataPagamento\",\"%m/%d/%Y\"),'$status');";

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

  $columns = null;
  $values = null;

  foreach ($data as $key => $value) {
    $columns .= trim($key, "'") . ",";
    $values .= "'$value',";
  }

  // remove a ultima virgula
  $columns = rtrim($columns, ',');
  $values = rtrim($values, ',');
  
  //Pegar valores $arrayValues e colocar em variavel

	  $numero = $data["'numero'"];
	  $descricao = $data["'descricao'"];
	  $dataFaturamento = $data["'dataFaturamento'"];
	  $dataPagamento = $data["'dataPagamento'"];
	  $status = $data["'status'"];

  $sql = "UPDATE ".$table." SET numero='".$numero."',descricao='".$descricao."',dataFaturamento=STR_TO_DATE(\"$dataFaturamento\",\"%m/%d/%Y\"),dataPagamento=STR_TO_DATE(\"$dataPagamento\",\"%m/%d/%Y\"),status='".$status."' WHERE id=".$id.";";

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

function findByNumber($numero = null) {
  $database = open_database();      
  $found = null;          

  try {       
    if ($numero) {
      $sql = "SELECT id,numero,descricao,date_format(dataFaturamento,'%d/%m/%Y') as dataFaturamento,date_format(dataPagamento,'%d/%m/%Y') as dataPagamento,status FROM notas WHERE numero=" . "'$numero'";
      $result = $database->query($sql);                                 
      if ($result->num_rows > 0) {            
        $found = $result->fetch_assoc();          
      }
    } 
    return $found;  
  } catch (Exception $e) {        
    $_SESSION['message'] = $e->GetMessage();        
    $_SESSION['type'] = 'danger';     
  }           
  close_database($database);      
  return $found;    
}

/**
*   Atecipação de Pagamento DB
*/
function antecipated($id = 0, $data = null){
  $database = open_database();
  $dataPagamento = $data["'dataPagamento'"];
  $sql = "UPDATE notas SET status='Antecipação Solicitada',dataPagamento=STR_TO_DATE(\"$dataPagamento\",\"%m/%d/%Y\") WHERE id=".$id.";";
  try {
    $database->query($sql);

    $_SESSION['message'] = 'Solicitação de antecipação efetuada com sucesso.';
    $_SESSION['type'] = 'success';
  
  } catch (Exception $e) { 
  
    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

  close_database($database);
}

function find_pendentes( $table = null, $id = null ) {            

$database = open_database();      
$found = null;          

try {       
  if ($id) {          
    $sql = "SELECT id,numero,descricao,date_format(dataFaturamento,'%d/%m/%Y') as dataFaturamento,date_format(dataPagamento,'%d/%m/%Y') as dataPagamento,status FROM " . $table . " WHERE status = 'Antecipação Solicitada'";         
    $result = $database->query($sql);                                 
    if ($result->num_rows > 0) {            
      $found = $result->fetch_assoc();          
    }
  } else {          
    $sql = "SELECT id,numero,descricao,date_format(dataFaturamento,'%d/%m/%Y') as dataFaturamento,date_format(dataPagamento,'%d/%m/%Y') as dataPagamento,status FROM " . $table . " WHERE status='Antecipação Solicitada'";
    //var_dump($sql);
    //die();

    $result = $database->query($sql);
    if ($result->num_rows > 0) {            
      $found = $result->fetch_all(MYSQLI_ASSOC);                      
      /* Metodo alternativo           
      $found = array();               
      while ($row = $result->fetch_assoc()) {           
        array_push($found, $row);         
      }  */
    }       
  }
  /*var_dump($found);
  die();*/
  return $found;  
} catch (Exception $e) {        
  $_SESSION['message'] = $e->GetMessage();        
  $_SESSION['type'] = 'danger';     }           
  close_database($database);      
  return $found;    
}
        
/**    
*  Pesquisa Todos os Registros de uma Tabela     
*/    
function find_all_pendentes( $table ) {     
  return find_pendentes($table);    
}

/**
*   Aprovar Antecipação de Nota
*/
function aprovar($id = null){
  $database = open_database();
  $sql = "UPDATE notas SET status='Antecipação Aprovada' WHERE id=".$id.";";
  try {
    $database->query($sql);

    $_SESSION['message'] = 'Solicitação de antecipação efetuada com sucesso.';
    $_SESSION['type'] = 'success';
  
  } catch (Exception $e) { 
  
    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

  close_database($database);
}