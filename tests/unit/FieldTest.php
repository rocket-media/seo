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
use UnitTester;

/**
 * Class FIeldTest
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

}
