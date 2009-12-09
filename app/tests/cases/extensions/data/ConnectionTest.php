<?php

namespace app\tests\cases\extensions\data;

use \lithium\data\Connections;

class ConnectionTest extends \lithium\test\Unit {

	public function testDefaultConnection() {
		$conn = Connections::get('default');
		$this->assertFalse($conn === null, "Default connection not present");
	}

}

?>