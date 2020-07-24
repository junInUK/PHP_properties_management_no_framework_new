<?php

namespace PHPTestException;

class Property
{
	private $id;
	private $town;
	private $desc;			//	full description
	private $address;
	private $imageFull;		//	full image address
	private $numBedrooms;
	private $price;
	private $propertyType;		//	flat/detached house/semi-detached/villa
	private $propertyStatus;	//	for sale/for rent

	public function __construct(
		int $id=null,
		string $town,
	    string $desc,
		string $address,
		string $imageFull,
		int $numBedrooms,
		int $price,
		int $propertyType,
		int $propertyStatus)
	{
		if($id != null){
			$this->id = $id;
		}
		$this->town = $town;
		$this->desc = $desc;
		$this->address = $address;
		$this->imageFull = $imageFull;
		$this->numBedrooms = $numBedrooms;
		$this->price = $price;
		$this->propertyType = $propertyType;
		$this->propertyStatus = $propertyStatus;
	}

	public function get_id()
	{
		return $this->id;
	}

	public function get_town()
	{
		return $this->town;
	}

	public function get_desc()
	{
		return $this->desc;
	}

	public function get_address()
	{
		return $this->address;
	}

	public function get_imageFull()
	{
		return $this->imageFull;
	}

	public function get_numBedrooms()
	{
		return $this->numBedrooms;
	}

	public function get_price()
	{
		return $this->price;
	}

	public function get_propertyType()
	{
		return $this->propertyType;
	}

	public function get_propertyStatus()
	{
		return $this->propertyStatus;
	}

}
