<?php
//include_once dirname(__FILE__).'/Pebo_wp_nonce_helper.php';

/**
 * Test Pebo_wp_nonce_helper over phpUnit and wordpress-developoer
 */
class Nonce extends WP_UnitTestCase{
    const  TEST_URL = "https://pebo.pro";
    const  TEST_ACTION = "test_action_name";
    const  TEST_NAME = "test_nonce_name";

    /**
     * Verifyes that nonce url is not empty
     */
    public function testCreateNonceUrl() {
		$nonce_url = Pebo_wp_nonce_helper::create_nonce_url(self::TEST_URL, self::TEST_ACTION, self::TEST_NAME);
		$this->assertNotEmpty($nonce_url);
    }
    
    /**
     * Verifyes that the generated url contains the correct parameter and a value asignation.
     */
	public function testVerifyNonceUrl() {
        $complete_url = Pebo_wp_nonce_helper::create_nonce_url(self::TEST_URL, self::TEST_ACTION, self::TEST_NAME);        
        $valid_url = (strpos($complete_url, self::TEST_NAME.'=') !== false);
		$this->assertEquals( $valid_url, true );
    }
    
    /**
     * Verifies hidden fields generation
     */
	public function testVerifyHiddenField() {
        $hiddenfields = Pebo_wp_nonce_helper::get_hidden_field(self::TEST_ACTION, self::TEST_NAME);
        $verification = (strpos($hiddenfields, self::TEST_NAME) !== false) 
                        && (strpos($hiddenfields, '_wp_http_referer') !== false);
		$this->assertEquals( $verification, true );
	}
	
}