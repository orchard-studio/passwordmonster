<?php

	if(!defined('__IN_SYMPHONY__')) die('<h2>Error</h2><p>You cannot directly access this file</p>');

	Final Class datasourcePasswordmonster_showpassword Extends DataSource{

		function about(){
			return array(
				'name' => 'Password Monster: Show Password',
				'author' => array(
					'name'	  => 'Michael Eichelsdoerfer',
					'website' => 'http://www.michael-eichelsdoerfer.de',
					'email'	  => 'info@michael-eichelsdoerfer.de',
				),
				'version' => '1.0',
				'release-date' => '2010-12-19',
			);
		}

		public function grab(){
			session_start();
			if(!is_array($_SESSION['passwordmonster']) || empty($_SESSION['passwordmonster'])) return NULL;
			$xml = new XMLElement('password-monster');
			$xml->setAttribute('password', $_SESSION['passwordmonster']['password']);
	    	return $xml;
		}
	}
