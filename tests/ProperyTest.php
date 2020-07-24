<?php declare(strict_types=1);

require_once realpath("vendor/autoload.php");

use PHPTestException\Property;
use PHPUnit\Framework\TestCase;

final class ProperyTest extends TestCase
{
  public function testCanTestStringEqual(): void
  {
      $this->assertEquals('john', 'john');
  }

  public function testCanGetID(): void
  {
    $property = new Property(
      1,
      "town",
  		"description",
  	  "address",
  		"imageFull",
      1,
  		180000,
      1,
  		1);

    $this->assertEquals(1, $property->get_id());

  }

  public function testCanUseDefaultValue(): void
  {
    $property = new Property(
      null,
      "town",
      "description",
      "address",
      "imageFull",
      1,
      180000,
      1,
      1);

    $this->assertEquals(null, $property->get_id());
    
  }

}
