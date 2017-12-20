<?php

namespace djneo;

use Primal\Color;

class colorz implements \JsonSerializable{

	/**
	 * @var \Primal\Color\RGBColor
	 */
	private $colorObject;

	/**
     * ['type' => 'hsl', 'h' => rand(0,360), 's' =>'100', 'l' => rand(40,60), 'a' => 1 ]
	 * @param null $colorObject
	 */
	function __construct ($colorObject = null)
	{
		if (is_array($colorObject) && isset($colorObject['type'])){
			switch (strtolower($colorObject['type'])){
				case 'hsv':
					$color = new Color\HSVColor($colorObject['h'],
						$colorObject['s'], $colorObject['v'], $colorObject['a']);
					break;
				case 'hsl':
					$color = new Color\HSLColor($colorObject['h'],
						$colorObject['s'], $colorObject['l'], $colorObject['a']);
					break;
				case 'rgb':
					$color = new Color\RGBColor($colorObject['r'],
						$colorObject['g'], $colorObject['b'], $colorObject['a']);
					break;
				case 'hex':
					list($r, $g, $b) = sscanf($colorObject['hex'], "%02x%02x%02x");
					$color = new Color\RGBColor($r, $g, $b, 1);
					break;
				default:
					$color = new Color\RGBColor();
					break;
			}
		
		}

		$this->colorObject = $color;
	}


	/**
	 * @return int
	 */
	public function getHue()
	{
		return (int) $this->colorObject->toHSV()->hue;
	}

	/**
	 * @return int
	 */
	public function getSaturation()
	{
		return (int) $this->colorObject->toHSV()->saturation;
	}

	public function getValue()
	{
		return (int) $this->colorObject->toHSV()->value;
	}

	public function getLuminance()
	{
		return  $this->colorObject->toHSL()->luminance;
	}

	public function getCSS()
	{
		return $this->colorObject->toRGB()->toCSS();
	}
	public function getHex()
	{
		return $this->colorObject->toRGB()->toHex();
	}

	public function toArray()
	{
		return ['color' => [
				'hex' => $this->getHex(),
	 			'css' => $this->getCSS(),
	 			'hsv' => [
	 				'h' => $this->getHue(),
	 				's' => $this->getSaturation(),
	 				'v' => $this->getValue()	
	 			],
	 			'hsl' => [
	 				'h' => $this->colorObject->toHSL()->hue,
	 				's' =>  $this->colorObject->toHSL()->saturation,
	 				'l' => $this->getLuminance()	
	 			]
			]
		];
	}

	public function jsonSerialize()
	{
        return $this->toArray();
	}


	//Color change functions
	public function getComplementaryColor()
	{

	    $Hue = $this->colorObject->toHSL()->hue;
	    $InvertedHue = abs(($Hue - 180));

	    return new colorz([
	        'type' => 'hsl',
            'h' => $InvertedHue,
            's' => $this->colorObject->toHSL()->saturation,
            'l' => $this->getLuminance(),
            'a' => 1
        ]);
	}

	public function hexToRgb($hex)
	{
		list($r, $g, $b) = sscanf($hex, "%02x%02x%02x");
		return ['r' => $r, 'g' => $g, 'b' => $b];
	}
	


}