<?php

class dbpdo
{
	var $host;
	var $database;
	var $user;
	var $password;

	private $connection = null;

	function db($_host,$_user,$_password,$_database)
	{
		$this->host = $_host;
		$this->user = $_user;
		$this->password = $_password;
		$this->database = $_database;
	}

  //configuracion de la conexion a la bbdd
	function connect()
	{
		//$this->connection = new PDO('mysql:host=127.0.0.1;dbname=sgi_pfc', 'sgi_admin', '12345');
		$this->connection = new PDO('mysql:host='._CONFIG_DB_HOST.';dbname='._CONFIG_DB_NAME.';charset=utf8mb4', ''._CONFIG_DB_USER.'', ''._CONFIG_DB_PASS.'');

		return ($this->connection);
	}

  //cerrar conexion bbdd
	function close()
	{
		if (!is_null($this->connection)){$this->connection=null;}
	}

  //ejecutar la consulta deseada
	function query($_sql)
	{
		if (is_null($this->connection))
		{
			$this->connect();
		}

		if (
			(strpos(strtoupper($_sql), 'INSERT ') === 0) OR
			(strpos(strtoupper($_sql), 'DELETE ') === 0) OR
			(strpos(strtoupper($_sql), 'UPDATE ') === 0)
		)
		{
			//metodo para insert, uptade o delete...debemos devolver el numero de lineas afectadas
			//preparamos consulta y la ejecutamos
				$stm = $this->connection->prepare($_sql);
				$stm->execute();

			//devolver el número de filas editadas/eliminadas/insertadas
				$cnt = $stm->rowCount();
				return $cnt;
		}
		else
		{
      //Debe de ser un select o una sentencia de extraccion de datos
					$stm = $this->connection->query($_sql);
					//print_r($stm);
					//return null;
					$rows = $stm->fetchAll();
					return $rows;
		}

  }
}

?>
