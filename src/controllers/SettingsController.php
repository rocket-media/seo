<?php
/**
 * SEO for Craft CMS
 *
 * @link      https://ethercreative.co.uk
 * @copyright Copyright (c) 2019 Ether Creative
 */

namespace ether\seo\controllers;

use Craft;
use craft\web\Controller;
use ether\seo\Seo;
use ether\seo\web\assets\SeoFieldSettingsAsset;

/**
 * Class SettingsController
 *
 * @author  Ether Creative
 * @package ether\seo\controllers
 */
class SettingsController extends Controller
{

	public function actionIndex ()
	{
		$view = Craft::$app->getView();

		$view->registerAssetBundle(SeoFieldSettingsAsset::class);
		$view->registerJs('new Vue({ el: "#content" })');
		$view->registerTranslations('seo', [
			'Create a token for each part of your title. Clicking the lock will prevent the user from editing the contents of that token. Tokens use the same syntax as [Dynamic Entry Titles](https://docs.craftcms.com/v3/sections-and-entries.html#dynamic-entry-titles). They can be dragged to re-order.',
			'Description',
			'Image',
			'This supports the same syntax as [Dynamic Entry Titles](https://docs.craftcms.com/v3/sections-and-entries.html#dynamic-entry-titles).',
			'Title',
		]);

		return $this->renderTemplate(
			'seo/_settings/index',
			[ 'settings' => Seo::getInstance()->getSettings() ]
		);
	}

}
