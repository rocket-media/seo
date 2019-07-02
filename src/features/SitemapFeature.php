<?php
/**
 * SEO for Craft CMS
 *
 * @link      https://ethercreative.co.uk
 * @copyright Copyright (c) 2019 Ether Creative
 */

namespace ether\seo\features;

use Craft;
use ether\seo\interfaces\FeatureInterface;
use ether\seo\Seo;

/**
 * Class SitemapFeature
 *
 * @author  Ether Creative
 * @package ether\seo\features
 */
class SitemapFeature implements FeatureInterface
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
		// TODO: Implement init() method.
	}

	/**
	 * Return the CP nav items for this feature
	 *
	 * @return array
	 */
	public function getCpNavItem ()
	{
		$user = Craft::$app->getUser();

		if (!$user->getIsAdmin()/* TODO: Check permissions */)
			return [];

		return [
			'sitemap' => [
				'label' => Seo::t('Sitemap'),
				'url'   => 'seo/sitemap',
			],
		];
	}

}
