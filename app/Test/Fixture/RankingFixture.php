<?php
/**
 * RankingFixture
 *
 */
class RankingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'tournament_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'match_points' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'elo' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'bye' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'wins' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'draws' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'defeats' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'away' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'tournament_id' => 1,
			'user_id' => 1,
			'match_points' => 1,
			'elo' => 1,
			'bye' => 1,
			'wins' => 1,
			'draws' => 1,
			'defeats' => 1,
			'away' => 1
		),
	);
}
