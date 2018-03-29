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
     * Set custom duration for the nonces fields - carefull this is global and applies to all nonces.
     * @param integer $time_in_secconds
     */
    public static function set_nonce_duration($time_in_secconds){
        add_filter( 'nonce_life', function () { return 4 * $time_in_secconds; } );
    }

     /**
     * Creates a secure Url for a specific ation.
     * @param string $actionurl The url of the action to secure
     * @param string $action nonce action name
     * @param string $name nonce name
     * @return string $secured_url a url with nonces
     */
    public static function create_nonce_url($actionurl, $action, $name){
        //action url is required
        if(!isset($actionurl)){
            return null;
        }
        $secured_url = wp_nonce_url($actionurl, $action, $name );
        return $secured_url;
    }


    /**
     * Validates a nonce field
     * @param string $nonce (required) Nonce to verify.
     * @param string $action Nonce to verify.
     * @return boolean/integer false if invalid, 1 (12 hours or less), 2 (12 and 24 hours) .
     */
    public static function nonce_verify($nonce, $action){    
        return wp_verify_nonce($nonce, $action);
    }

    /**
     * Creates a nonce hidden field to use within a form
     * @param string $action (optional) Action name
     * @param string $name (optional) Nonce name
     */
    public static function get_hidden_field($action, $name){
        $hiddenfied = wp_nonce_field($action, $name);
        return $hiddenfied; 
    }

    /**
     * Validates a nounce hidden field (this fucntion returns only true or die).
     * @param string $action (optional) Action name
     * @param string $name (optional) Nonce name
     */
    public static function check_nounce_field($action, $name){
        return check_admin_referer($action, $name);
    }

}