<?php 
/*
Plugin Name: WooCommerce Argentina
Plugin URI: http://www.globalset.com.ar/plugins
Description: Agrega provincias argentinas y $ Peso Argentino ( ARS )
Version: 1.0
License: CC BY 2.5
Author: Mariano Ferro
Author URI: http://www.globalset.com.ar/
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'sk_Woocommerce' ) ) {

	class woocommerceArgentina {
		private static $intancia;

		static public function init() {
			self::$intancia = new woocommerceArgentina();
		}

		public function __construct() {
			$this->config();
		}

		public function config() {
			add_filter( 'woocommerce_states',          array( $this, 'add_provincias')           );
			add_filter( 'woocommerce_currencies',      array( $this, 'add_moneda')               );
			add_filter( 'woocommerce_currency_symbol', array( $this, 'add_moneda_simbolo'), 10, 2);
		}

		public function add_provincias($states) {
			$states['AR'] = array(
				'AR-CF'	=> 'Capital Federal',	
				'AR-K'	=> 'Catamarca',	
				'AR-H'	=> 'Chaco',	
				'AR-U'	=> 'Chubut',	
				'AR-X'	=> 'Córdoba',	
				'AR-W'	=> 'Corrientes',	
				'AR-E'	=> 'Entre Ríos',	
				'AR-P'	=> 'Formosa',	
				'AR-Y'	=> 'Jujuy',	
				'AR-L'	=> 'La Pampa',	
				'AR-F'	=> 'La Rioja',	
				'AR-M'	=> 'Mendoza',
				'AR-N'	=> 'Misiones',	
				'AR-Q'	=> 'Neuquén',	
				'AR-R'	=> 'Río Negro',
				'AR-A'	=> 'Salta',
				'AR-J'	=> 'San Juan',	
				'AR-D'	=> 'San Luis',
				'AR-Z'  => 'Santa Cruz',
				'AR-S'  => 'Santa Fe',
				'AR-G'  => 'Santiago del Estero',
				'AR-V'  => 'Tierra del Fuego, Antártida e Islas del Atlántico Sur',
				'AR-T'  => 'Tucumán',
	/*
				'AR-B'	=> 'Buenos Aires',	

				'AR-X-cap'	=> 'Córdoba ( Capital )',	
				'AR-E-cap'	=> 'Entre Ríos ( Parana ) ',	
				'AR-S-cap'  => 'Santa Fe ( Capital y Rosario )',
				'AR-L-cap'	=> 'La Pampa ( Santa Rosa ) ',	
	/**/

			);
			return $states;		
		}

		function add_moneda( $currencies ) {
			 $currencies['ARS'] = __( 'Pesos Argentinos ($)', 'woocommerce' );
			 return $currencies;
		}

		function add_moneda_simbolo( $currency_symbol, $currency ) {
			 switch( $currency ) {
				  case 'ARS': $currency_symbol = '$'; break;
			 }
			 return $currency_symbol;
		}

	}

	woocommerceArgentina::init();

}




/**/