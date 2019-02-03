<?php

	class Cipher {

		/**
		 *	Fuente:
		 *	https://odan.github.io/2017/08/10/aes-256-encryption-and-decryption-in-php-and-csharp.html
		 *
		 */
		private static $KEY = "CLAVESUPERSEGURA";
		private static $IV = "JAJAJAJNO";
		private static $METHOD = 'aes-256-cbc';

		function __construct() {
		}


		/**
		 *	Encripta los datos que se le pasen por parámetro a la función
		 *	y devuelve el string encriptado y en base64.
		 *
		 */
		public static function encrypt($data) {

	        $key = hash('sha256', self::$KEY);
	        $iv = substr(hash('sha256', self::$IV), 0, 16);

	        $encoded = base64_encode(openssl_encrypt($data, self::$METHOD, $key, OPENSSL_RAW_DATA, $iv));
	        return $encoded;

	    }

		/**
		 *	Desencripta los datos que se le pasen por parámetro a la función
		 *	y devuelve el string desencriptada.
		 *
		 */
	    public static function decrypt($data) {

	        $key = hash('sha256', self::$KEY);
	        $iv = substr(hash('sha256', self::$IV), 0, 16);

	        $decrypt = openssl_decrypt(base64_decode($data), self::$METHOD, $key, OPENSSL_RAW_DATA, $iv);
	        return $decrypt;

	    }

	}

?>