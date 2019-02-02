<?php

	class DB {

		private $IP = "80.211.46.139";
		private $USER = "videos";
		private $PW = "videos";
		private $DB = "videos";
		private $CON;
	
		/**
		 *	Cuando se llama a la clase se ejecuta el constructor, el cual crea
		 *	una conexion con la base de datos con los datos correspondientes.
		 *
		 */
		function __construct() {
			$this->CON = new mysqli($this->IP, $this->USER, $this->PW, $this->DB);
			mysqli_set_charset($this->CON,'utf8');
		}

		/**
		 *	Llama a la base de datos, y descarga la clave y el nombre del usuario seleccionado.
		 *
		 */
		function getPassword($usr) {
	        $query = $this->CON->prepare( 'select clave,nombre from usuarios where dni=?' );
	        $query->bind_param('s', $usr);
	        $query->execute();
	        $res = $query->get_result();
	        $end = $res->fetch_assoc();
	        $query->fetch();
	        $query->close();

	        return $end;
		}

		/**
		 *	Hace una peticion a la base de datos, pidiendo los codigos correspondientes al
		 *	usuario logueado, y a su vez, los carteles de las peliculas que este puede ver.
		 *
		 */
		function getUserPosters($dni) {

			$tmp_array = array();
			$query = $this->CON->prepare( 'select codigo_perfil from perfil_usuario where dni=?' );
	        $query->bind_param('s', $dni);
	        $query->execute();
	        $query->bind_result($cod);
		    while ($query->fetch()) {
		    	array_push($tmp_array, $cod);
		    }
	        $query->close();

	        $carteles = array();
	        foreach ($tmp_array as $codigo) {	
				$query = $this->CON->prepare( 'select cartel from videos where codigo_perfil=?' );
		        $query->bind_param('s', $codigo);
		        $query->execute();
		        $query->bind_result($cod);
			    while ($query->fetch()) {
			    	array_push($carteles, $cod);
			    }
		        $query->close();
			}

	        return $carteles;
		}

		
		/**
		 *	Se cierra la conexion actual.
		 *
		 */
		function close() {
			$this->CON->close();
		}
	}

?>