<?php		    
	require_once('functions.php');		    
	indexGestor();		
?>	
<?php include('modal.php'); ?>	
<?php include(HEADER_TEMPLATE); ?>		

<header>		
	<div class="col-sm-6">					
		<h2>Notas</h2>				
	</div>
</header>		

<?php 
	if (!empty($_SESSION['message'])) : ?>			
		<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">				
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>				
			<?php echo $_SESSION['message']; ?>			
		</div>			
		<?php clear_messages(); ?>		
	<?php endif; ?>		
<hr>		
<table class="table table-hover">		
	<thead>			
		<tr>						
			<th>Numero</th>				
			<th>Descrição</th>				
			<th>Data de Faturamento</th>				
			<th>Data de Pagamento</th>				
			<th>Status</th>			
		</tr>		
	</thead>		
	<tbody>		
		<?php if ($notas) : ?>		
			<?php foreach ($notas as $nota) : ?>			
				<tr>							
					<td width="10%"><?=$nota['numero'];?></td>				
					<td width="30%"><?=$nota['descricao'];?></td>				
					<td width="10%"><?=$nota['dataFaturamento']?></td>				
					<td width="10%"><?=$nota['dataPagamento'];?></td>
					<td width="10%";><?=$nota['status']?></td>				
					<td class="actions text-center">					
						<a href="aprovar.php?id=<?php echo $nota['id']; ?>" class="btn btn-sm btn-success">
							<i class="glyphicon glyphicon-thumbs-up"></i> Aprovar</a>
						<a href="reprovar.php?id=<?php echo $nota['id']; ?>" class="btn btn-sm btn-danger">
							<i class="glyphicon glyphicon-thumbs-down"></i> Reprovar</a>	
						
					</td>			
				</tr>		
			<?php endforeach; ?>		
		<?php else : ?>			
			<tr>				
				<td colspan="6">Nenhum registro encontrado.</td>
			</tr>		<?php endif; ?>		
	</tbody>		
	</table>		

<?php include(FOOTER_TEMPLATE); ?>