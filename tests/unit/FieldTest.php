<?php
/**
 * SEO for Craft CMS
 *
 * @link      https://ethercreative.co.uk
 * @copyright Copyright (c) 2019 Ether Creative
 */

namespace ether\seo\tests;

use Codeception\Test\Unit;
use Craft;
use ether\seo\fields\SeoField;
use ether\seo\models\SeoData;
use UnitTester;

/**
 * Class FieldTest
 *
 * @author Ether Creative
 */
class FieldTest extends Unit
{

	/**
	 * @var UnitTester
	 */
	protected $tester;

	public function testCanCreateSEOField ()
	{
		$field = Craft::$app->getFields()->createField([
			'type' => SeoField::class,
		]);

		$this->assertTrue($field instanceof SeoField);
	}

	public function testCanRenderSEOMarkup ()
	{
		$data = new SeoData([
			'title' => 'Hello world!',
			'description' => 'Nullam quis risus eget urna mollis ornare vel eu leo.'
		]);

		$markup = Craft::$app->getView()->renderString('{% seo %}', [
			'seo' => $data,
		]);

		$target = <<<HTML
<title>Hello world!</title>
<meta name="description" content="Nullam quis risus eget urna mollis ornare vel eu leo."/>

<meta name="generator" content="SEO for Craft CMS" />
HTML;

		$this->assertTrue($markup === $target);
	}

}
