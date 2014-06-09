<?php

	if(!defined('__IN_SYMPHONY__')) die('<h2>Error</h2><p>You cannot directly access this file</p>');

	Final Class eventPasswordmonster_setpassword extends Event{

		public static function about(){
			return array(
				'name' => 'Password Monster: Set Password',
				'author' => array(
					'name'    => 'Michael Eichelsdoerfer',
					'website' => 'http://www.michael-eichelsdoerfer.de',
					'email'	  => 'info@michael-eichelsdoerfer.de',
				),
				'version' => '1.0',
				'release-date' => '2010-12-19',
			);
		}

		public function load(){
			
			if(is_array($_POST) && !empty($_POST['password'])) return $this->__trigger();
			
		}

		public static function documentation(){
			return 'Adds a password to the user session.';
		}

		protected function __trigger(){
			session_start();
			
			$_SESSION['passwordmonster']['password'] = $_POST['password'];
			
			return;
		}
	}
