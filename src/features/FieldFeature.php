<?php
/**
 * SEO for Craft CMS
 *
 * @link      https://ethercreative.co.uk
 * @copyright Copyright (c) 2019 Ether Creative
 */

namespace ether\seo\features;

use craft\events\RegisterComponentTypesEvent;
use craft\services\Fields;
use ether\seo\fields\SeoField;
use ether\seo\interfaces\FeatureInterface;
use yii\base\Event;

/**
 * Class FieldFeature
 *
 * @author  Ether Creative
 * @package ether\seo\features
 */
class FieldFeature implements FeatureInterface
{

	// Feature
	// =========================================================================

	/**
	 * Initialize the feature during plugin init
	 *
	 * @return void
	 */
	public function init ()
	{
		Event::on(
			Fields::class,
			Fields::EVENT_REGISTER_FIELD_TYPES,
			[$this, 'onRegisterFieldTypes']
		);
	}

	/**
	 * Return the CP nav items for this feature
	 *
	 * @return array
	 */
	public function getCpNavItem ()
	{
		return [];
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

	/**
	 * @inheritDoc
	 */
	public function registerPermissions ()
	{
		return [];
	}
}
