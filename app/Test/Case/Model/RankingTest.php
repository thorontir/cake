<?php
App::uses('Ranking', 'Model');

/**
 * Ranking Test Case
 *
 */
class RankingTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.ranking', 'app.tournament', 'app.round', 'app.match', 'app.signup', 'app.user', 'app.comment', 'app.post', 'app.thread', 'app.users_tournament');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ranking = ClassRegistry::init('Ranking');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ranking);

		parent::tearDown();
	}

}
