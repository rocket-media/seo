<?php
/**
 * SEO for Craft CMS
 *
 * @link      https://ethercreative.co.uk
 * @copyright Copyright (c) 2019 Ether Creative
 */

namespace ether\seo;

use Craft;
use craft\base\Plugin;
use ether\seo\traits\FieldTypeTrait;
use ether\seo\traits\RedirectsTrait;
use ether\seo\traits\SitemapTrait;

/**
 * Class Seo
 *
 * @author  Ether Creative
 * @package ether\seo
 */
class Seo extends Plugin
{

	use FieldTypeTrait;
	use SitemapTrait;
	use RedirectsTrait;

	// Properties
	// =========================================================================

	public $hasCpSection = true;

	// Craft
	// =========================================================================

	/**
	 * Initialize the SEO Plugin
	 */
	public function init ()
	{
		parent::init();

		$this->initFieldType();
		$this->initSitemap();
		$this->initRedirects();
	}

	// Helpers
	// =========================================================================

	/**
	 * Translates a message to the specified language.
	 *
	 * This is a shortcut method of [[\yii\Yii::t()]].
	 *
	 * The translation will be conducted according to the message category and the target language will be used.
	 *
	 * You can add parameters to a translation message that will be substituted with the corresponding value after
	 * translation. The format for this is to use curly brackets around the parameter name as you can see in the following example:
	 *
	 * ```php
	 * $username = 'Alexander';
	 * echo \Seo::t('Hello, {username}!', ['username' => $username]);
	 * ```
	 *
	 * Further formatting of message parameters is supported using the
	 * [PHP intl extensions](https://secure.php.net/manual/en/intro.intl.php)
	 * message formatter. See [[\yii\i18n\I18N::translate()]] for more details.
	 *
	 * @param string $message The message to be translated.
	 * @param array $params The parameters that will be used to replace the
	 *                      corresponding placeholders in the message.
	 *
	 * @return string The translated message.
	 */
	public static function t ($message, $params = [])
	{
		return Craft::t('seo', $message, $params);
	}

}
