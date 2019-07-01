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

	public function testSeoExists ()
	{
		$this->assertTrue(class_exists(\ether\seo\Seo::class));
	}

	public function testSeoInstall ()
	{
		$this->assertTrue(Craft::$app->getPlugins()->installPlugin('seo'));
	}

	public function testSeoEnable ()
	{
		$this->assertTrue(Craft::$app->getPlugins()->enablePlugin('seo'));
	}

	public function testSeoInstalled ()
	{
		$this->assertTrue(Craft::$app->getPlugins()->isPluginEnabled('seo'));
	}

}
