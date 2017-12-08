<?php 
  require_once('functions.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Cliente</h2>

<form action="edit.php?id=<?php echo $nota['id']; ?>" method="post">
  <hr />
    <div class="row">
    <div class="form-group col-md-2">         
      <label for="numero">Número da Nota</label>          
      <input type="text" class="form-control" name="nota['numero']" value="<?=$nota['numero']?>">   
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-3">         
        <label for="descricao">Descrição</label>          
        <textarea type="text" class="form-control" name="nota['descricao']" rows="3"><?=$nota['descricao']?></textarea>        
      </div>
  </div>

  <div class="row">
    <div class="form-group col-md-2">         
        <label for="dataFaturamento">Data de Faturamento</label>
        <input id="dataFaturamento" type="text" class="form-control" name="nota['dataFaturamento']" value="<?=$nota['dataFaturamento']?>">       
      </div>
      <div class="form-group col-md-2">         
        <label for="dataPagamento">Data de Pagamento</label>
        <input id="dataPagamento" type="text" class="form-control" name="nota['dataPagamento']" value="<?=$nota['dataPagamento']?>">       
      </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      <label for="status">Status</label>
      <input type="text" class="form-control" name="nota['status']" value="<?=$nota['status']?>">
    </div>
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>