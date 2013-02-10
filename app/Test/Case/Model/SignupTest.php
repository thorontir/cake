<?php
App::uses('Signup', 'Model');

/**
 * Signup Test Case
 *
 */
class SignupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.signup');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Signup = ClassRegistry::init('Signup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Signup);

		parent::tearDown();
	}

}
