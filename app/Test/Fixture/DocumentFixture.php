<?php
/**
 * DocumentFixture
 *
 */
class DocumentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'topic_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'summary' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pages' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'likes' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'body' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'size' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'author' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'views' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'downloads' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'visible' => array('type' => 'boolean', 'null' => false, 'default' => null, 'comment' => '1 for only me, 2 for member only, 3 for public'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0),
			'topic_id' => array('column' => 'topic_id', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'topic_id' => 1,
			'summary' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'pages' => 1,
			'likes' => 1,
			'body' => 1,
			'size' => 1,
			'author' => 'Lorem ipsum dolor ',
			'views' => 1,
			'downloads' => 1,
			'created' => '2015-03-25 23:32:03',
			'modified' => '2015-03-25 23:32:03',
			'visible' => 1
		),
	);

}
