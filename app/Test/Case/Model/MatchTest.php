<?php
App::uses('Match', 'Model');

/**
 * Match Test Case
 *
 */
class MatchTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.match', 'app.round', 'app.tournament', 'app.ranking', 'app.user', 'app.comment', 'app.post', 'app.thread', 'app.original_poster', 'app.last_poster', 'app.signup', 'app.users_tournament', 'app.replay');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Match = ClassRegistry::init('Match');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Match);

		parent::tearDown();
	}

}
