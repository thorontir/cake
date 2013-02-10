<?php
App::uses('Replay', 'Model');

/**
 * Replay Test Case
 *
 */
class ReplayTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.replay', 'app.match');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Replay = ClassRegistry::init('Replay');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Replay);

		parent::tearDown();
	}

}
