<?php
require("../vendor/autoload.php");

for ($i = 0; $i < 254; $i++){

	$test = new  djneo\colorz(['type' => 'hsl', 'h' => $i, 's' =>'100', 'l' => '50', 'a' => 1 ]);

	//echo $test->getHue().PHP_EOL ;
	//echo $test->getSaturation().PHP_EOL ;
	//echo $test->getCSS().PHP_EOL ;
	//echo $test->getHex().PHP_EOL ;


	echo '<p style="color:'. $test->getHex() .';">' .$test->getCSS() . '</p>';
	unset($test);
}