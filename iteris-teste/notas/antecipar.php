<?php 
  require_once('functions.php'); 
  antecipar();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Solicitar antecipação de pagamento</h2>

<form action="antecipar.php?id=<?php echo $nota['id']; ?>" method="POST">
  <hr />
  <div class="row">
    <div class="form-group col-md-2">         
      <label for="numero">Número da Nota</label>          
      <input readonly="true" type="text" class="form-control" name="nota['numero']" value="<?=$nota['numero']?>">
    </div>
    <div>
      <label for="dataPagamento">Atual data de pagamento</label>
        <input readonly="true" id="dataPagamento" type="text" class="form-control" name="nota['dataPagamento']" value="<?=$nota['dataPagamento']?>">
    </div>        
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      <label for="status">Status</label>
      <input readonly="true" type="text" class="form-control" name="nota['status']" value="<?=$nota['status']?>">
    </div>
  </div>

  <div class="row">
  	<div class="form-group col-md-3">
      <label for="dataPagamento">Nova data de pagamento</label>
        <input id="novaDataPagamento" type="text" class="form-control" name="nota['dataPagamento']" value="<?=$nota['dataPagamento']?>">
    </div>
  </div>    
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Solicitar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>