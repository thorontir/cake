<?php
App::uses('UsersTournament', 'Model');

/**
 * UsersTournament Test Case
 *
 */
class UsersTournamentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.users_tournament', 'app.user', 'app.comment', 'app.match', 'app.post', 'app.thread', 'app.ranking', 'app.tournament', 'app.round', 'app.signup');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UsersTournament = ClassRegistry::init('UsersTournament');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersTournament);

		parent::tearDown();
	}

}
