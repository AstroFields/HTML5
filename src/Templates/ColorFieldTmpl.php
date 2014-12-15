<?php

namespace WCM\AstroFields\HTML5\Templates;

use WCM\AstroFields\Core\Templates;
use WCM\AstroFields\Core\Providers;

class ColorFieldTmpl implements
	Templates\TemplateInterface,
	Templates\PrintableInterface
{
	/** @type Providers\EntityProviderInterface | Providers\AttributeAwareInterface */
	private $data;

	/**
	 * @param Providers\EntityProviderInterface | Providers\AttributeAwareInterface $data
	 * @return $this
	 */
	public function attach( $data )
	{
		$this->data = $data;

		return $this;
	}

	/**
	 * @return string
	 */
	public function display()
	{
		return $this->getMarkUp();
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->display();
	}

	/**
	 * @return string
	 */
	public function getMarkUp()
	{
		return sprintf(
			'<input type="color" id="%s" name="%s" value="%s" %s />',
			$this->data->getKey(),
			$this->data->getKey(),
			$this->data->getValue(),
			$this->data->getAttributes()
		);
	}
}