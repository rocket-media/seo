<?php
/**
 * SEO for Craft CMS
 *
 * @link      https://ethercreative.co.uk
 * @copyright Copyright (c) 2019 Ether Creative
 */

namespace ether\seo\web\twig;

use ether\seo\web\twig\tokenparsers\SeoTokenParser;
use Twig\Extension\AbstractExtension;

/**
 * Class Extension
 *
 * @author  Ether Creative
 * @package ether\seo\web\twig
 */
class Extension extends AbstractExtension
{

	public function getTokenParsers ()
	{
		return [
			new SeoTokenParser(),
		];
	}

}
