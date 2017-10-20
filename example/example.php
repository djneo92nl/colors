<?php
require("../vendor/autoload.php");



	$test = new  djneo\colorz(['type' => 'hex', 'hex' =>'40bf6a' ]);

	//echo $test->getHue().PHP_EOL ;
	//echo $test->getSaturation().PHP_EOL ;
	//echo $test->getCSS().PHP_EOL ;
	//echo $test->getHex().PHP_EOL ;


	var_dump( json_encode($test));
