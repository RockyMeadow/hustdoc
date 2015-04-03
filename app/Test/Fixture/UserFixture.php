<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false, 'key' => 'primary'),
		'user_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'full_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 8, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'gmail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sex' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => false, 'comment' => '1 for male, 2 for female'),
		'date_of_birth' => array('type' => 'date', 'null' => false, 'default' => null),
		'city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'role' => array('type' => 'boolean', 'null' => false, 'default' => '2', 'comment' => '1 for admin, 2 for users'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
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
			'user_name' => 'Lorem ipsum dolor ',
			'full_name' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ',
			'gmail' => 'Lorem ipsum dolor ',
			'sex' => 1,
			'date_of_birth' => '2015-03-27',
			'city' => 'Lorem ipsum dolor ',
			'role' => 1,
			'created' => '2015-03-27 12:03:30',
			'modified' => '2015-03-27 12:03:30'
		),
	);

}
