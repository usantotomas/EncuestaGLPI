<?php 
if(isset($_SERVER['HTTP_REFERER']))
{
	echo "Acceso negado!";
	die();
}
if($_REQUEST['tickets_id']==""){
	echo "Acceso negado!";
        die();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Encuesta de satisfacción</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="css/start-rating.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="lib/start-rating.js"></script>
<script language="javascript">
function validar()
{
	var valor = document.getElementById("comment").value;
	var califica = document.getElementById("input-2").value;
	if(valor == "" && califica < 4)
	{
		alert("Por favor ingrese un comentario");
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
    <div class="container center_div">
        <label for="input-2" class="control-label">Encuesta de satisfacci&oacute;n Ticket: <?php echo $_GET['tickets_id'];?></label>
        <div>
        <h3><?php echo $_GET['tickets_name'];?></h3>
        </div>
        <form action="encuesta_qos_db.php" method="POST" onsubmit="return validar()">
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
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
