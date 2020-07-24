<?php
// namespace PHPTestException;

// require_once ("./getProperties.php");
require_once ("./Property.php");
require_once ("../config.php");

use PHPTestException\Property;

function connectDB()
{
	$servername = "localhost";
	$username = "sam";
	$password = "123456uk";
	$dbname = "MTC";


// 	define('SERVER_NAME', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'MTC');


	$options = [
		PDO::ATTR_EMULATE_PREPARES   => false,	// turn off emulation mode for "real" prepared statements
		PDO::ATTR_ERRMODE	     => PDO::ERRMODE_EXCEPTION,	// turn on errors in the form of exceptions
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,	// make the default fetch be an associative array
	];
	try{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);
		return $conn;
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		return NULL;
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		return NULL;
	}
}

function disconnectDB($conn)
{
	$conn = null;
}

function insertProperty(Property $property)
{
	try{
		$conn = connectDB();
		$stmt = $conn->prepare("INSERT INTO properties(town,																	description,																        address,									     							  imageFull,																	numBedrooms,
												      price,
											   propertyType)
				               VALUES(?, ?, ?, ?, ?, ?, ?)");

		$stmt->bindValue(1, $property->get_town(), PDO::PARAM_STR);
		$stmt->bindValue(2, $property->get_desc(), PDO::PARAM_STR);
		$stmt->bindValue(3, $property->get_address(), PDO::PARAM_STR);
		$stmt->bindValue(4, $property->get_imageFull(), PDO::PARAM_STR);
		$stmt->bindValue(5, $property->get_numBedrooms(), PDO::PARAM_INT);
		$stmt->bindValue(6, $property->get_price(), PDO::PARAM_INT);
		$stmt->bindValue(7, $property->get_propertyType(), PDO::PARAM_INT);
		$stmt->execute();
		$stmt = null;
		disconnectDB($conn);
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		disconnectDB($conn);
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		disconnectDB($conn);
	}

}

function deleteProperty(int $id)
{
	try{
		$conn = connectDB();
		$stmt = $conn->prepare("DELETE FROM properties WHERE id = ?");
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		$stmt = null;
		disconnectDB($conn);
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		disconnectDB($conn);
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		disconnectDB($conn);
	}
}

function deleteAllProperties()
{
	try{
		$conn = connectDB();
		$stmt = $conn->prepare("DELETE FROM properties");
		$stmt->execute();
		$stmt = null;
		disconnectDB($conn);
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		disconnectDB($conn);
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		disconnectDB($conn);
	}
}

function getAllPropertiesFromDB()
{

	try{
		$conn = connectDB();
		$stmt = $conn->prepare("SELECT id,
									   town,
									   description,
									   address,
									   imageFull,
									   numBedrooms,
									   price,
									   propertyType FROM properties");
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$i = 0;
		$arrProperties = array();
		$tmpProperty = NULL;

		foreach($stmt->fetchAll() as $property){

			$tmpProperty = new Property(
				$property["id"],
				$property["town"],
				$property["description"],
				$property["address"],
				$property["imageFull"],
				$property["numBedrooms"],
				$property["price"],
				$property["propertyType"],
				1);

			array_push($arrProperties, $tmpProperty);
		}
		$stmt = null;
		disconnectDB($conn);
		return $arrProperties;
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		disconnectDB($conn);
		return NULL;
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		disconnectDB($conn);
		return NULL;
	}
}

function getPropertyFromDB($id)
{
	try{
		$conn = connectDB();
		$stmt = $conn->prepare("SELECT id,
									 town,
							  description,
							      address,
								imageFull,
							  numBedrooms,
							     	price,
							 propertyType
						  FROM properties
						  WHERE id = ?");
		$stmt->bindValue(1, $id, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetch();

		$tmpProperty = NULL;
		$tmpProperty = new Property(
			$result["id"],
			$result["town"],
			$result["description"],
			$result["address"],
			$result["imageFull"],
			$result["numBedrooms"],
			$result["price"],
			$result["propertyType"],
			1);

		$stmt = null;
		disconnectDB($conn);
		return $tmpProperty;
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		disconnectDB($conn);
		return NULL;
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		disconnectDB($conn);
		return NULL;
	}
}

function updateProperty(Property $property)
{
	try{
		$conn = connectDB();
		$stmt = $conn->prepare("UPDATE properties SET
											town = ? ,
			                    		description = ? ,
											address = ? ,
								    	imageFull = ? ,
									  numBedrooms = ? ,
											price = ? ,
									 propertyType = ?
									   WHERE id = ?");

		$stmt->bindValue(1, $property->get_town(), PDO::PARAM_STR);
		$stmt->bindValue(2, $property->get_desc(), PDO::PARAM_STR);
		$stmt->bindValue(3, $property->get_address(), PDO::PARAM_STR);
		$stmt->bindValue(4, $property->get_imageFull(), PDO::PARAM_STR);
		$stmt->bindValue(5, $property->get_numBedrooms(), PDO::PARAM_INT);
		$stmt->bindValue(6, $property->get_price(), PDO::PARAM_INT);
		$stmt->bindValue(7, $property->get_propertyType(), PDO::PARAM_INT);
		$stmt->bindValue(8, $property->get_id(), PDO::PARAM_STR);
		$stmt->execute();
		$stmt = null;
		disconnectDB($conn);
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
		disconnectDB($conn);
	}catch(Exception $e){
		echo "General exception: " . $e->getMessage();
		disconnectDB($conn);
	}

}
