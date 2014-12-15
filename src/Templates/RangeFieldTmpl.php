<?php

namespace WCM\AstroFields\HTML5\Templates;

use WCM\AstroFields\Core\Templates;
use WCM\AstroFields\Core\Receivers;

class RangeFieldTmpl implements
	Templates\TemplateInterface,
	Templates\PrintableInterface
{
	/** @type Receivers\AttributeAwareInterface | Receivers\OptionAwareInterface */
	private $data;

	/**
	 * @param Receivers\EntityProviderInterface $data
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
		$options = $this->data->getOptions();

		return sprintf(
			'<input type="range" id="%s" name="%s" value="%s" min="%d" max="%d" %s />',
			$this->data->getKey(),
			$this->data->getKey(),
			$this->data->getValue(),
			$options['min'],
			$options['max'],
			$this->data->getAttributes()
		);
	}
}