<?php
App::uses('Report', 'Model');

/**
 * Report Test Case
 *
 */
class ReportTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.report',
		'app.user',
		'app.comment',
		'app.document',
		'app.topic'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Report = ClassRegistry::init('Report');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Report);

		parent::tearDown();
	}

}
