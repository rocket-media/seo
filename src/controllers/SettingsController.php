<?php
/**
 * SEO for Craft CMS
 *
 * @link      https://ethercreative.co.uk
 * @copyright Copyright (c) 2019 Ether Creative
 */

namespace ether\seo\controllers;

use craft\web\Controller;
use ether\seo\Seo;

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
		return $this->renderTemplate(
			'seo/_settings/index',
			[ 'settings' => Seo::getInstance()->getSettings() ]
		);
	}

}
