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

		return $this->renderTemplate(
			'seo/_settings/index',
			[ 'settings' => Seo::getInstance()->getSettings() ]
		);
	}

}
