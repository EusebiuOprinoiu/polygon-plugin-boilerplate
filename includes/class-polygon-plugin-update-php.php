<?php
/**
 * The file that contains the class that checks for outdated software
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */





/**
 * Advise users to upgrade their PHP version.
 *
 * Check if the server is running an outdated version of PHP and display a warning
 * if it is.
 *
 * @since 1.0.0
 */
class Polygon_Plugin_Update_PHP {

	/**
	 * Minimum required version of PHP.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	protected $minimum_version;

	/**
	 * Minimum recommended version of PHP.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	protected $recommended_version;





	/**
	 * Set the minimum and recommended versions of PHP.
	 *
	 * Set the minimum version of PHP required to run the plugin, the minimum recommended version
	 * and display a warning if the current version is lower than the minimum version.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->minimum_version     = '5.3';
		$this->recommended_version = '5.5';

		if ( ! $this->check() ) {
			add_action( 'admin_notices', array( $this, 'update_php_warning' ) );
		}
	}





	/**
	 * Check PHP version.
	 *
	 * Check if the current PHP version is higher than the minimum accepted version.
	 * If the function returns true the plugin can run without problems.
	 *
	 * @since  1.0.0
	 * @return bool
	 */
	public function check() {
		if ( version_compare( PHP_VERSION, $this->minimum_version ) >= 0 ) {
			return true;
		} else {
			return false;
		}
	}





	/**
	 * Display PHP warning.
	 *
	 * If the server is running outdated software advise users to upgrade their PHP.
	 *
	 * @since 1.0.0
	 */
	public function update_php_warning() {
		if ( current_user_can( 'manage_options' ) ) {
			?>
				<div class="error polygon-warning">
					<p></p>
					<p>
						<b><?php echo esc_html__( 'WARNING: You server is running outdated software!', 'polygon-plugin' ); ?></b>
					</p>
					<p>
						<?php printf( esc_html__( 'Polygon Plugin can not run on PHP versions older than %1$s. You are running on version %2$s which has serious security and performance issues.', 'polygon-plugin' ), $this->minimum_version, PHP_VERSION ); ?>
						<br>
						<?php printf( esc_html__( 'Please ask your hosting provider to help you upgrade. We recommend PHP %1$s or newer.', 'polygon-plugin' ), $this->recommended_version ); ?>
					</p>
					<p></p>
				</div>
			<?php
		}
	}
}
