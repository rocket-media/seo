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
use craft\events\RegisterUrlRulesEvent;
use craft\helpers\UrlHelper;
use craft\web\UrlManager;
use ether\seo\features\FieldFeature;
use ether\seo\features\RedirectFeature;
use ether\seo\features\SitemapFeature;
use ether\seo\interfaces\FeatureInterface;
use ether\seo\models\Settings;
use yii\base\Event;

/**
 * Class Seo
 *
 * @author  Ether Creative
 * @package ether\seo
 */
class Seo extends Plugin
{

	// Properties
	// =========================================================================

	public $hasCpSettings = true;
	public $hasCpSection = true;

	/**
	 * @var FeatureInterface[]
	 */
	private $_features = [];

	// Craft
	// =========================================================================

	/**
	 * Initialize the SEO Plugin
	 */
	public function init ()
	{
		parent::init();

		// Events
		// ---------------------------------------------------------------------

		Event::on(
			UrlManager::class,
			UrlManager::EVENT_REGISTER_CP_URL_RULES,
			[$this, 'onRegisterCpUrlRules']
		);

		// Features
		// ---------------------------------------------------------------------

		$this->_features = [
			new FieldFeature(),
			new SitemapFeature(),
			new RedirectFeature(),
		];

		foreach ($this->_features as $feature)
			$feature->init();
	}

	/**
	 * Returns the CP nav item definition for this plugin’s CP section.
	 *
	 * @inheritDoc
	 * @return array
	 */
	public function getCpNavItem ()
	{
		$item = parent::getCpNavItem();
		$user = Craft::$app->getUser();
		$allowSettings = Craft::$app->getConfig()->getGeneral()->allowAdminChanges;

		$subNav = [
			'dashboard' => [
				'label' => self::t('Dashboard'),
				'url' => 'seo',
			],
		];

		foreach ($this->_features as $feature)
			$subNav += $feature->getCpNavItem();

		if ($user->getIsAdmin() && $allowSettings)
		{
			$subNav['settings'] = [
				'label' => Craft::t('app', 'Settings'),
				'url' => 'seo/settings',
			];
		}

		$item['subnav'] = $subNav;

		return $item;
	}

	// Settings
	// =========================================================================

	/**
	 * Creates and returns the model used to store the plugin’s settings.
	 *
	 * @return Settings
	 */
	protected function createSettingsModel (): Settings
	{
		return new Settings();
	}

	/**
	 * Returns the model that the plugin’s settings should be stored on, if the
	 * plugin has settings.
	 *
	 * @return Settings
	 */
	public function getSettings (): Settings
	{
		return parent::getSettings();
	}

	/**
	 * Returns the settings page response.
	 *
	 * @return void
	 */
	public function getSettingsResponse ()
	{
		Craft::$app->controller->redirect(
			UrlHelper::cpUrl('seo/settings')
		);
	}

	// Events
	// =========================================================================

	/**
	 * Register CP rules for SEO
	 *
	 * @param RegisterUrlRulesEvent $event
	 */
	public function onRegisterCpUrlRules (RegisterUrlRulesEvent $event)
	{
		$event->rules['seo/settings'] = 'seo/settings/index';
	}

	// Helpers
	// =========================================================================

	/**
	 * Translates a message to the specified language.
	 *
	 * This is a shortcut method of [[\yii\Yii::t()]].
	 *
	 * The translation will be conducted according to the message category and
	 * the target language will be used.
	 *
	 * You can add parameters to a translation message that will be substituted
	 * with the corresponding value after translation. The format for this is
	 * to use curly brackets around the parameter name as you can see in the
	 * following example:
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
