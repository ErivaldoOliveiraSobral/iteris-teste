<?php 
	require_once('functions.php'); 
	buscaNumero($_GET['numero']);
?>

<?php include(HEADER_TEMPLATE); ?>

<?php include('visualizar.php');?>

<?php include(FOOTER_TEMPLATE); ?>