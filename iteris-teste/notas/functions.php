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

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
      if (isset($_POST['nota'])) {
        $nota = $_POST['nota'];
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

/**
*   Solicitaçãod de Antecipação de pagamento
*/
function antecipar($id = null){
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
      if (isset($_POST['nota'])) {
        $nota = $_POST['nota'];
        antecipated($id, $nota);
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
*   Lista de Notas aguardando aprovação da antecipação
*/
function indexGestor() {      
  global $notas;      
  $notas = find_all_pendentes('notas'); 
}

function aprove($id = null){
  global $notas;
  $notas = aprovar($id);

  header('location: gestor.php');
}