<?php

	if(!defined('__IN_SYMPHONY__')) die('<h2>Error</h2><p>You cannot directly access this file</p>');

	Final Class eventPasswordmonster_unsetpassword extends Event{

		public static function about(){
			return array(
				'name' => 'Password Monster: Unset Password',
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
			return $this->__trigger();
		}

		public static function documentation(){
			return 'Unsets a session password.';
		}

		protected function __trigger(){
			$xml = new XMLElement('password-monster');
			session_start();
			if ($_SESSION['passwordmonster']){
				unset($_SESSION['passwordmonster']);
				if (!$_SESSION['passwordmonster']){
					$xml->setAttribute('unset', 'success');
				}
				else{
					$xml->setAttribute('unset', 'error');
				}
			}
			else{
				// 'idle' means: there is no password to unset
				$xml->setAttribute('unset', 'idle');
			}
		    return $xml;
		}
	}
