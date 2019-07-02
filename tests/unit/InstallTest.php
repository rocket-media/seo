<?php

namespace ether\seo\tests;

use Codeception\Test\Unit;

use UnitTester;
use Craft;

class InstallTest extends Unit
{

	/**
	 * @var UnitTester
	 */
	protected $tester;

	public function testSeoInstall ()
	{
		$this->assertTrue(Craft::$app->getPlugins()->installPlugin('seo'));
	}

	public function testSeoEnable ()
	{
		$this->assertTrue(Craft::$app->getPlugins()->enablePlugin('seo'));
	}

	public function testSeoInstalledAndEnabled ()
	{
		$plugins = Craft::$app->getPlugins();

		$this->assertTrue(
			$plugins->isPluginEnabled('seo') && $plugins->isPluginEnabled('seo')
		);
	}

}
