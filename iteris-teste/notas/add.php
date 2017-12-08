<?php 		  
	require_once('functions.php'); 		  
	add();		
?>		
<?php include(HEADER_TEMPLATE); ?>	

<h2>Nova Nota</h2>		
<form action="add.php" method="post">		  
	<!-- area de campos do form -->		  
	<hr />
	<div class="row">
		<div class="form-group col-md-2">		      
			<label for="numero">Número da Nota</label>		      
			<input type="text" class="form-control" name="nota['numero']">	 
		</div>
	</div>
	
	<div class="row">
		<div class="form-group col-md-3">		      
	    	<label for="descricao">Descrição</label>		      
	    	<textarea type="text" class="form-control" name="nota['descricao']" rows="3"></textarea> 		    
	    </div>
	</div>

	<div class="row">
		<div class="form-group col-md-2">		      
	    	<label for="dataFaturamento">Data de Faturamento</label>
	    	<input id="dataFaturamento" type="text" class="form-control" name="nota['dataFaturamento']" placeholder="00/00/0000">		    
	    </div>
	    <div class="form-group col-md-2">		      
	    	<label for="dataPagamento">Data de Pagamento</label>
	    	<input id="dataPagamento" type="text" class="form-control" name="nota['dataPagamento']" placeholder="00/00/0000">		    
	    </div>
	</div>
		
	<div class="radio">
    	<label><input id="status" type="radio" name="nota['status']" value="A pagar">A pagar</label>
    </div>
    <div class="radio">
    	<label><input id="status" type="radio" name="nota['status']" value="A Receber">A receber</label>
    </div>
	
		<!--
		<div class="form-group col-md-4">
			<label for="status">Status</label>
			<input type="text" class="form-control" name="nota['status']">
		</div>
		-->
	

	<div id="actions" class="row">		    
    	<div class="col-md-12">		      
    		<button type="submit" class="btn btn-primary">Salvar</button>		      
    		<a href="index.php" class="btn btn-default">Cancelar</a>		    
    	</div>		  
    </div>
</form>
<?php include(FOOTER_TEMPLATE); ?>