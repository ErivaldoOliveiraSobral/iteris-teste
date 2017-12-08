<?php				
require_once('../config.php');		
require_once(DBAPI);				
$notas = null;		
$nota = null;				

/**		 *  Listagem de Notas		 */		
function index() {			
	global $notas;			
	$notas = find_all('notas');		
}

/**		 *  Cadastro de Notas		 */		
function add() {
  if (!empty($_POST['nota'])) {               
    $nota = ($_POST['nota']);
    save('notas', $nota);       
    header('location: index.php');
    }       
  } 

/**
 *	Atualizacao/Edicao de Notas
 */
function edit() {

  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
      if (isset($_POST['nota'])) {
        $nota = $_POST['nota'];
        $nota['modified'] = $now->format("Y-m-d H:i:s");
        update('notas', $id, $nota);
        header('location: index.php');
      } else {
        global $nota;
        $nota = find('notas', $id);
      } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um Notas
 */
function view($id = null) {
  global $nota;
  $nota = find('notas', $id);
}

/**
 *  Exclusão de um Notas
 */
function delete($id = null) {

  global $nota;
  $nota = remove('notas', $id);

  header('location: index.php');
}

/**
 *  Visualização de uma Nota por Número
 */
function buscaNumero($numero = null){
  global $nota;
  $nota = findByNumber($numero);
}