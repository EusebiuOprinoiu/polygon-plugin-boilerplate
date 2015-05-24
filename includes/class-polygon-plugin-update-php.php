<?php

// Advise users to upgrade their PHP version




class Polygon_Plugin_Update_PHP {

	// Variables
	protected $minimum_version; // Minimum required version of PHP


	

	// Construct
	public function __construct() {
		$this->minimum_version = '5.4';

		if ( ! $this->check() ) {
			add_action( 'admin_notices', array( $this, 'update_php_warning' ) );
		}
	}




	// Check PHP version
	public function check() {
		if( version_compare( PHP_VERSION, $this->minimum_version ) >= 0 ) {
			return true;
		}
		else {
			return false;
		}
	}




	// Warning
	public function update_php_warning() {
		if ( current_user_can( 'manage_options' ) ) {
			?>
				<div class="error polygon-warning">
					<p></p>
					<p>
						<b><?php echo __( 'WARNING: You server is running outdated software!', 'polygon-plugin' ); ?></b>
					</p>
					<p>
						<?php printf( __( 'Polygon Plugin can not run on PHP versions older than %1$s. You are running on version %2$s. Upgrade your PHP version or switch to a decent host.', 'polygon-plugin' ), $this->minimum_version, PHP_VERSION); ?>
					</p>
					<p></p>
				</div>
			<?php
		}
	}
	
}