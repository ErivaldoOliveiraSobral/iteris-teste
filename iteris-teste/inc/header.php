<!DOCTYPE html>		
<html>		
<head>		    
	<meta charset="utf-8">		    
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		    
	<title>Iteris</title>		    
	<meta name="description" content="">		    
	<meta name="viewport" content="width=device-width, initial-scale=1">		
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo BASEURL; ?>js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo BASEURL; ?>js/jquery.mask.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/bootstrap.min.js"></script>       
    <script src="<?php echo BASEURL; ?>js/main.js"></script>        
    <script type="text/javascript">
        $(document).ready(function(){
            $('#dataFaturamento').mask('00/00/0000');
            $('#dataPagamento').mask('00/00/0000');
            $('#novaDataPagamento').mask('00/00/0000');
        });
    </script>	    
    <style>		        
        body {		            
        padding-top: 50px;		            
        padding-bottom: 20px;		        
    }		    
</style>		    

</head>		
<body>		
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">		      
    	<div class="container">		        
    		<div class="navbar-header">		          
    			<a href="<?php echo BASEURL; ?>index.php" class="navbar-brand">Iteris</a>
    		</div>    
    	</div>  		    
    </nav>		
    <main class="container">
        