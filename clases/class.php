<?php
//clase para la conexion blindando los parametros para evitar sql inyeccion
ini_set('display_errors', 1);
class conectar
{ 
	//función de consultar para blindar parametros
	function consulta($consulta,$parametros,$tp)
	{
		$HOST="mariadb.usantotomas.red";
		$USER_NAME="glpi_prod";
		$PASSWORD="0SwJMQ18C8S";
		$SERVICE_NAME="glpi_prod";
		try {
		$gbd = new PDO('mysql:host='.$HOST.';dbname='.$SERVICE_NAME.'', $USER_NAME, $PASSWORD);
		//echo "Conectado\n";
		} catch (Exception $e) {
		die("No se pudo conectar: " . $e->getMessage());
		}
		
		try {  
		$gbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$gbd->beginTransaction();
		
		if($tp == 1)
		{
			$data_til = $gbd->prepare("SET NAMES 'utf8'");
			$data_til->execute();
			$sth = $gbd->prepare($consulta, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$sth->execute($parametros);
			$resultado = $sth->fetchAll();
			return $resultado;
			
		}
		else
		{
			$sth = $gbd->prepare($consulta, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$sth->execute($parametros);
		}
		$gbd->commit();
		$sth->closeCursor();
		
		
		} catch (Exception $e) {
		$gbd->rollBack();
		echo "Fallo: " . $e->getMessage();
		}		

	}
}
?>
