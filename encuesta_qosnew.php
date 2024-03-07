<?php 
if(isset($_SERVER['HTTP_REFERER']))
{
	echo "Acceso negado!";
	die();
}?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Encuesta de satisfacción</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="css/start-rating.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="lib/start-rating.js"></script>
<script language="javascript">
function validar()
{
	var valor = document.getElementById("comment").value;
	var califica = document.getElementById("input-2").value;
	if(valor == "" && califica < 4)
	{
		$('#mensaje').show();
		return false;
	}
}
</script>
<style>
.center_div{
    margin: 0 auto;
    width:80% /* value of your choice which suits your alignment */
}
</style>
</head>

<body>
  
	
	
	<div id="wrapper">

	
	<div class="container contact-form">
            <div class="contact-image">
                <img src="Escudo_Usta.png" alt="rocket_contact"/>
            </div>
            <form action="encuesta_qos_db.php" method="POST" onsubmit="return validar()">
				<h3>Encuensta de satisfacción Ticket No. <strong><?php echo $_GET['tickets_id'];?></strong></h3>
				<br><br><br>
				<h3><?php echo $_GET['tickets_name'];?></h3>
                
				
				<div id="mensaje"  style="display: none" class="alert alert-warning alert-dismissible" >
				Por favor ingrese un comentario  
				</div>
				
               <div class="row">
			
                   <div class="form-group">
        <input id="input-2" value="3" class="rating-loading" name="satisfaction">
        <script>
        $(document).on('ready', function(){
            $('#input-2').rating({
                step: 1,
                starCaptions: {1: 'Muy malo', 2: 'Malo', 3: 'Bueno', 4: 'Muy bueno', 5: 'Excelente'},
                starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
            });
        });
        </script>
        </div>
        <div class="form-group">
        <textarea class="form-control" rows="3" cols="10" name="comment" id="comment"></textarea>
        <input type="hidden" name="tickets_id" value="<?php echo $_REQUEST['tickets_id'];?>">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button> 
				   
				   
                </div>
						
				
				
				
            </form>
</div>
	</div>
	
</body>
</html>
