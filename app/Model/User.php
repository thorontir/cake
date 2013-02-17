<?php
App::uses('AppModel', 'Model', 'AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Comment $Comment
 * @property Post $Post
 * @property Ranking $Ranking
 * @property Signup $Signup
 * @property Tournament $Tournament
 */
class User extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
            'length' => array(
                'rule'      => array('minLength', 3),
                'message'   => 'Please enter your full name (more than 3 chars)',
                'required'  => true,
            ),
        ),
        'username' => array(
            'length' => array(
                'rule'      => array('minLength', 3),
                'message'   => 'Must be more than 3 characters',
                'required'  => true,
            ),
            'alphanum' => array(
                'rule'      => 'alphanumeric',
                'message'   => 'May only contain letters and numbers',
            ),
            'unique' => array(
                'rule'      => 'isUnique',
                'message'   => 'Already taken',
            ),
        ),
        'email' => array(
            'email' => array(
                'rule'      => 'email',
                'message'   => 'Must be a valid email address',
            ),
            'unique' => array(
                'rule'      => 'isUnique',
                'message'   => 'Already taken',
            ),
        ),
        'password' => array(
            'empty' => array(
                'rule'      => 'notEmpty',
                'message'   => 'Must not be blank',
                'required'  => true,
            ),
        ),
        'password_confirm' => array(
            'compare'    => array(
                'rule'      => array('password_match', 'password'),
                'message'   => 'The password you entered does not match',
                'required'  => true,
            ),
            'length' => array(
                'rule'      => array('between', 6, 20),
                'message'   => 'Use between 6 and 20 characters',
            ),
            'empty' => array(
                'rule'      => 'notEmpty',
                'message'   => 'Must not be blank',
            ),
        ),
		'bnetaccount' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'bnetcode' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'race' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	 /**
     * Ensure two password fields match
     *
     * @param   array   data provided by the controller
     * @param   string  the original (already hashed) password fieldname
     * @param   bool    whether the password field has been hashed,
     *                  only hashed when a username input is present
     */
    function password_match($data, $password_field)
    {
        $password         = $this->data[$this->alias][$password_field];
        $keys             = array_keys($data);
        $password_confirm = $data[$keys[0]];
        return $password === $password_confirm;
    }
	/**
     * Extra form dependent validation rules
     */
    public $validateChangePassword = array(
        '_import' => array('password', 'password_confirm'),
        'password_old' => array(
            'correct' => array(
                'rule'      => 'password_old',
                'message'   => 'Does not match',
                'required'  => true,
            ),
            'empty' => array(
                'rule'      => 'notEmpty',
                'message'   => 'Must not be blank',
            ),
        ),
    );

// HASH PASSWORDS!
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

    /**
     * Dynamically adjust our validation behaviour
     *
     * Look for an _import key in new ruleset, and import
     * those rules from the base validation ruleset
     *
     * @param   string  array key of the validation ruleset to use
     */
    /*function useValidationRules($key)
    {
        $variable = 'validate' . $key;
        $rules = $this->$variable;

        if (isset($rules['_import'])) {
            foreach ($rules['_import'] as $key) {
                $rules[$key] = $this->validate[$key];
            }
            unset($rules['_import']);
        }

        $this->validate = $rules;
    }*/

    /**
     * Ensure password matches the user session
     *
     * @param   array   data provided by the controller
     */
    function password_old($data)
    {
        $password = $this->field('password',
            array('User.id' => $this->id));
        return $password ===
            Security::hash($data['password_old'], null, true);
    }

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Comment' => array(
            'className' => 'Comment',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Ranking' => array(
            'className' => 'Ranking',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Signup' => array(
            'className' => 'Signup',
            'foreignKey' => 'user_id',
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


    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Tournament' => array(
            'className' => 'Tournament',
            'joinTable' => 'users_tournaments',
            'foreignKey' => 'user_id',
            'associationForeignKey' => 'tournament_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        )
    );

}
