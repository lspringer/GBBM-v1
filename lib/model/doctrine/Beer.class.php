<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Beer extends BaseBeer
{
	public function __toString()
	{
		return $this->label;
	}

	public function getShopLink()
	{
		$term = rawurlencode(sprintf('%s beer',$this->label));
		return sprintf('https://www.google.com/search?q=%s&ie=utf-8&oe=utf-8&tbm=shop', $term);
	}
}
