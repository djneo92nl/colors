<?php
require("../vendor/autoload.php");

for ($i = 0; $i < 360; $i++){

	$test = new  djneo\colorz(['type' => 'hsl', 'h' => rand(0,360), 's' =>'100', 'l' => rand(40,60), 'a' => 1 ]);

	//echo $test->getHue().PHP_EOL ;
	//echo $test->getSaturation().PHP_EOL ;
	//echo $test->getCSS().PHP_EOL ;
	//echo $test->getHex().PHP_EOL ;


	echo '<p style="color:'. $test->getHex() .';">' .$test->getCSS() . '</p>';
	unset($test);
}