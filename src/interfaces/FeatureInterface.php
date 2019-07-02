<?php
/**
 * SEO for Craft CMS
 *
 * @link      https://ethercreative.co.uk
 * @copyright Copyright (c) 2019 Ether Creative
 */

namespace ether\seo\interfaces;

/**
 * Interface FeatureInterface
 *
 * @author  Ether Creative
 * @package ether\seo\interfaces
 */
interface FeatureInterface
{

	/**
	 * Initialize the feature during plugin init
	 *
	 * @return void
	 */
	public function init ();

	/**
	 * Return the CP nav items for this feature
	 *
	 * @return array
	 */
	public function getCpNavItem ();

}
