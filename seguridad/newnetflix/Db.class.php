<?php

	class DB {

		private $IP = "127.0.0.1";
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
		 *	@param $usr - Nombre de usuario del que descargar la password.
		 */
		public function getPassword($usr) {
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
		 *	usuario logueado, y a su vez, toda la informacion de los videos correspondientes.
		 *	Ademas, comprueba si la pelicula ya ha sido vista por el usuario.
		 *
		 *	@param $dni - Dni del usuario
		 */
		public function getUserVideos($dni) {
			$video_info = array();
			$query = $this->CON->prepare( 'select * from videos where codigo_perfil in (select codigo_perfil from perfil_usuario where dni=?) order by titulo' );
			$query->bind_param('s', $dni);
			$query->execute();
			$res = $query->get_result();
			while ($vid = $res->fetch_assoc()) {

				$query2 = $this->CON->prepare( 'select count(*) from visionado where dni=? and codigo_video=?' );
				$query2->bind_param('ss', $dni, $vid['codigo']);
				$query2->bind_result($count);
				$query2->execute();
				$query2->fetch();
				$query2->close();
				$vid['vista'] = ($count != 0) ? true : false;
				array_push($video_info, $vid);

			}
			$query->close();

			return $video_info;
		}

		/**
		 *	Comprueba si un usuario determinado tiene permiso para ver la película que se
		 *	pasa como parámetro.
		 *	
		 *	@param $cod - Codigo de la pelicula a comprobar
		 *	@param $dni - Dni del usuario a comprobar
		 */
		public function isUserAuthorized($cod, $dni) {
			$query = $this->CON->prepare( 'select count(*) from videos where codigo=? and codigo_perfil in (select codigo_perfil from perfil_usuario where dni=?)' );
			$query->bind_param('ss', $cod, $dni);
			$query->bind_result($count);
			$query->execute();
			$query->fetch();
			$query->close();

			return ($count == 1) ? true : false;
	    }

		/**
		 *	Devuelve el nombre con el que se guarda la pelicula.
		 *	
		 *	@param $cod - Codigo de la pelicula a comprobar
		 */
	    public function getVideoName($cod) {
			$query = $this->CON->prepare( 'select video from videos where codigo=?' );
			$query->bind_param('s', $cod);
			$query->bind_result($enlace);
			$query->execute();
			$query->fetch();
			$query->close();

			return $enlace;
	    }

		/**
		 *	Descarga toda la información del video indicado.
		 *	
		 *	@param $codigo - Codigo de la pelicula a comprobar.
		 */
		public function getVideoData($codigo) {
			$query = $this->CON->prepare( 'select * from videos where codigo=?' );
			$query->bind_param('s', $codigo);
			$query->execute();
			$res = $query->get_result();
			$video = $res->fetch_assoc();
			$query->close();

			return $video;
		}

		/**
		 *	Inserta en la tabla de visionado el momento en el que el usuario a visto
		 *	una pelicula.
		 *
		 *	@param $dni - Dni del usuario.
		 *	@param $codigo - Codigo de la pelicula vista.
		 */
	    public function markAsView($dni, $codigo) {
	    	$query = $this->CON->prepare( 'insert into visionado (dni,codigo_video,fecha) values (?,?,CURRENT_TIMESTAMP)' );
			$query->bind_param('ss', $dni, $codigo);
			$query->execute();
			$query->close();
	    }

		/**
		 *	Se cierra la conexion actual.
		 *
		 */
		public function close() {
			$this->CON->close();
		}
	}

?>