<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 23/04/15
 * Time: 12:15
 */

class UkPostCodeTest  extends PHPUnit_Framework_TestCase{

	/**
	 * @var \Talv\Support\Validation\ValidatorInterface
	 */
	private $validator;

	public function setUp()
	{
		$this->validator = new \Talv\Support\Validation\UkPostCodeValidator;
	}

	public function testSpaces()
	{
		$response = $this->validator->validate('B27 6BY');
		$this->assertTrue( $response );
	}

	public function testNoSpaces()
	{
		$response = $this->validator->validate('B276BY');
		$this->assertTrue( $response );
	}

	public function testAllowNorthernIreland()
	{
		$response = $this->validator->validate('BT276BY');
		$this->assertTrue( $response );
	}

	public function testInvalidPostCode()
	{
		$response = $this->validator->validate('111111');
		$this->assertFalse( $response );
	}

}