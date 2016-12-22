<?php

namespace Options\Legend;

use Halfpastfour\PHPChartJS\Options\Legend\Labels;
use Test\TestUtils;

/**
 * Class LabelsTest
 * @package Options\Legend
 */
class LabelsTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Labels $labels
	 */
	private $labels;

	/**
	 * data serves to determine types
	 *
	 * @var array
	 */
	private $data_types = [
		'boxWidth'       => 1,
		'fontSize'       => 1,
		'fontStyle'      => '',
		'fontColor'      => '',
		'fontFamily'     => '',
		'generateLabels' => '',
		'padding'        => 1,
		'usePointStyle'  => false,
	];

	/**
	 * @var array
	 */
	private $input_data_1 = [
		'boxWidth'       => 12,
		'fontSize'       => 13,
		'fontStyle'      => 'fontStyle',
		'fontColor'      => 'fontColor',
		'fontFamily'     => 'fontFamily',
		'generateLabels' => null,
		'padding'        => 14,
		'usePointStyle'  => true,
	];

	/**
	 * @var array
	 */
	private $input_data_2 = [
		'boxWidth'       => 12,
		'fontSize'       => 13,
		'fontStyle'      => 'fontStyle',
		'fontColor'      => 'fontColor',
		'fontFamily'     => 'fontFamily',
		'generateLabels' => 'generateLabels',
		'padding'        => 14,
		'usePointStyle'  => true,
	];

	/**
	 * @var array
	 */
	private $empty_data = [
		'boxWidth'       => null,
		'fontSize'       => null,
		'fontStyle'      => null,
		'fontColor'      => null,
		'fontFamily'     => null,
		'generateLabels' => null,
		'padding'        => null,
		'usePointStyle'  => null,
	];

	/**
	 *
	 */
	public function setUp()
	{
		$this->labels = new Labels();
	}

	/**
	 *
	 */
	public function testEmptyData()
	{
		$expected = $this->empty_data;
		$result   = TestUtils::getAttributes( $this->labels, $this->data_types );
		self::assertSame( $expected, $result );
	}

	/**
	 *
	 */
	public function testGetAndSetWithoutExpr()
	{
		$expected = $this->input_data_1;
		TestUtils::setAttributes( $this->labels, $this->input_data_1 );
		$result = TestUtils::getAttributes( $this->labels, $this->data_types );
		self::assertSame( $expected, $result );
	}

	/**
	 *
	 */
	public function testExpr()
	{
		TestUtils::setAttributes( $this->labels, $this->input_data_2 );
		$result   = $this->labels->getGenerateLabels()->__toString();
		$expected = $this->input_data_2['generateLabels'];
		self::assertSame( $expected, $result );
	}
}
