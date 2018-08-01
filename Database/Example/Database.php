<?php

namespace Controller;

class Database{
	
	//Abre uma conexão com o banco de Dados especifico e retorna a conexão 'link'
	public function connectToDatabase(){
		$link = mysqli_connect($GLOBALS['configs']['host'], $GLOBALS['configs']['username'], $GLOBALS['configs']['password']);
		if(!$link) {
			die("Connection failed: " . mysqli_connect_error());
			return;
		}
		else echo "Connected successfully";
		return $link;
	}

	//Fecha a conexão
	public function closeConnection($link){
		mysqli_close($link);
	}

	//Com uma conexão ativa executa uma linha SQL não tratada e retorna a resposta
	public function executeSQL($sql, $link)
	{
        mysqli_select_db($GLOBALS['configs']['database']);
		$ret = mysqli_query( $sql, $link );
   		return $ret;
	}
		
}

?>