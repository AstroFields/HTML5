<?php

namespace WCM\AstroFields\HTML5\Templates;

use WCM\AstroFields\Core\Templates;
use WCM\AstroFields\Core\Receivers;

class UrlFieldTmpl implements
	Templates\TemplateInterface,
	Templates\PrintableInterface
{
	/** @type Receivers\AttributeAwareInterface */
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
		return sprintf(
			'<input type="url" id="%s" name="%s" value="%s" %s />',
			$this->data->getKey(),
			$this->data->getKey(),
			$this->data->getValue(),
			$this->data->getAttributes()
		);
	}
}