<?php

namespace djneo;

use Primal\Color;

class colorz {

	/**
	 * @var \Primal\Color\RGBColor
	 */
	private $RGBcolorobject;

	/**
	 * @var \Primal\Color\HSVColor
	 */
	private $HSVcolorobject;

	/**
	 * @var \Primal\Color\HSLColor
	 */
	private $HSLcolorobject;

	/**
	 * @param null $colorObject
	 */
	function __construct ($colorObject = null)
	{

		$color = new Color\RGBColor();

		if (is_array($colorObject)){
			if (isset($colorObject['type'])){
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
					default:
						$color = new Color\RGBColor();
						break;
				}
			}
		}

		$this->RGBcolorobject = $color->toRGB();
		$this->HSVcolorobject = $color->toHSV();
		$this->HSLcolorobject = $color->toHSL();



	}


	/**
	 * @return int
	 */
	public function getHue()
	{
		//var_dump($this);
		return (int) $this->HSVcolorobject->hue;
	}

	/**
	 * @return int
	 */
	public function getSaturation()
	{
		return (int) $this->HSVcolorobject->saturation;
	}

	public function getCSS()
	{
		return $this->RGBcolorobject->toCSS();
	}
	public function getHex()
	{
		return $this->RGBcolorobject->toHex();
	}



}