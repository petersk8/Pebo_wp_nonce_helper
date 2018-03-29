<?
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Manage nonce operations
 */
class Pebo_wp_nonce_helper{

    /**
     * Set custom duration for the nonce field
     * @param integer $time_in_secconds
     */
    public function set_nonce_duration($time_in_secconds){
        add_filter( 'nonce_life', function () { return 4 * $time_in_secconds; } );
    }

}