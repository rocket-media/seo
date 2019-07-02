<?php
/**
 * SEO for Craft CMS
 *
 * @link      https://ethercreative.co.uk
 * @copyright Copyright (c) 2019 Ether Creative
 */

namespace ether\seo\traits;


use craft\events\RegisterComponentTypesEvent;
use craft\services\Fields;
use ether\seo\fields\SeoField;
use yii\base\Event;

trait FieldTypeTrait
{

	// Initialize
	// =========================================================================

	/**
	 * Initialize the Field Type section
	 */
	public function initFieldType ()
	{
		Event::on(
			Fields::class,
			Fields::EVENT_REGISTER_FIELD_TYPES,
			[$this, 'onRegisterFieldTypes']
		);
	}

	// Events
	// =========================================================================

	/**
	 * Register the SEO Field
	 *
	 * @param RegisterComponentTypesEvent $event
	 */
	public function onRegisterFieldTypes (RegisterComponentTypesEvent $event)
	{
		$event->types[] = SeoField::class;
	}

}
