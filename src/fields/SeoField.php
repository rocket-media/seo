<?php
/**
 * SEO for Craft CMS
 *
 * @link      https://ethercreative.co.uk
 * @copyright Copyright (c) 2019 Ether Creative
 */

namespace ether\seo\fields;

use craft\base\Field;
use ether\seo\Seo;

/**
 * Class SeoField
 *
 * @author  Ether Creative
 * @package ether\seo\fields
 */
class SeoField extends Field
{

	// Static Methods
	// =========================================================================

	public static function displayName (): string
	{
		return Seo::t('SEO');
	}

}
