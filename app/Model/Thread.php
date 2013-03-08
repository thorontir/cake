<?php
App::uses('AppModel', 'Model');
/**
 * Thread Model
 *
 * @property Post $Post
 */
class Thread extends AppModel {
/**
 * Display field
 *
 * @var string
 */
    public function isOwnedBy($threadId, $user) {
        //return $this->field('id', $userId) === $user;
        return true;
    }

	public $displayField = 'title';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'thread_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
