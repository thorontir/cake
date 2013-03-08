<?php
/**
 * MatchFixture
 *
 */
class MatchFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'round_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'player1_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'player2_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'games' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'player1_score' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'player2_score' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'open' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'number_in_round' => array('type' => 'integer', 'null' => false, 'default' => NULL),
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
			'round_id' => 1,
			'player1_id' => 1,
			'player2_id' => 1,
			'games' => 1,
			'player1_score' => 1,
			'player2_score' => 1,
			'open' => 1,
			'number_in_round' => 1
		),
	);
}
