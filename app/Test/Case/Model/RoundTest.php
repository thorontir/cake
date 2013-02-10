<?php
App::uses('Round', 'Model');

/**
 * Round Test Case
 *
 */
class RoundTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.round', 'app.tournament', 'app.ranking', 'app.user', 'app.comment', 'app.match', 'app.post', 'app.thread', 'app.signup', 'app.users_tournament');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Round = ClassRegistry::init('Round');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Round);

		parent::tearDown();
	}

}
