<?php		    
	require_once('functions.php');		    
	index();		
?>	
<?php include('modal.php'); ?>	
<?php include(HEADER_TEMPLATE); ?>		

<header>
			
	<div class="row">				
		<div class="col-sm-6">					
			<h2>Notas</h2>				
		</div>
		
		<div class="col-sm-6 text-right h2">			    	
			<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Nova Nota</a>			    	
			<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
		</div>
		<div class="container">
			<form action="buscaPorNumero.php">
				<div class="input-group">
		  			<input type="text" class="form-control" placeholder="Buscar por Número da Nota" name="numero">
		  			<div class="input-group-btn">
		    			<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		  			</div>
				</div>
			</form>
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
			<th>ID</th>				
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
					<td width="1%"><?=$nota['id'];?></td>				
					<td width="10%"><?=$nota['numero'];?></td>				
					<td width="30%"><?=$nota['descricao'];?></td>				
					<td width="10%"><?=$nota['dataFaturamento']?></td>				
					<td width="10%"><?=$nota['dataPagamento'];?></td>
					<td width="10%";><?=$nota['status']?></td>				
					<td class="actions text-center">					
						<a href="view.php?id=<?php echo $nota['id']; ?>" class="btn btn-sm btn-success">
							<i class="fa fa-eye"></i> Visualizar</a>
						<a href="edit.php?id=<?php echo $nota['id']; ?>" class="btn btn-sm btn-warning">
							<i class="fa fa-pencil"></i> Editar</a>	
						<a href="delete.php?id=<?=$nota['id']?>" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?=$nota['id']?>">
							<i class="fa fa-trash"></i> Excluir					
						</a>				
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