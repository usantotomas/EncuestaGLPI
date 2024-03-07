<?php
include("clases/class.php");
extract($_POST);
$obj_conectar = new conectar();

$query="SELECT satisfaction from glpi_ticketsatisfactions WHERE tickets_id =:tickets_id";
$param_user =  array(':tickets_id'=>$tickets_id);
$contestada = $obj_conectar->consulta($query,$param_user,1);

$valor=$contestada[0]; 

if ($valor['satisfaction'] != "")
{
	echo "<script>
			alert('El ticket numero: '+$tickets_id+' ya ha sido calificado');
			window.location='http://www.usta.edu.co';
		  </script>";
}
else
{
$query="UPDATE glpi_ticketsatisfactions SET date_answered=NOW(), satisfaction=:satisfaction, comment=:comment WHERE tickets_id =:tickets_id";
		
$param_user =  array(':tickets_id'=>$tickets_id,':satisfaction'=>$satisfaction,':comment'=>$comment);
$insert = $obj_conectar->consulta($query,$param_user,2);

	echo "<script>
			alert('Gracias por su tiempo. ticket numero:'+$tickets_id+'');
			window.location='http://www.usta.edu.co';
		  </script>";
}

?>