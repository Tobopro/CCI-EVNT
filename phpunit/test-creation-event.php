<?php

use PHPUnit\Framework\TestCase;

class EventCreationTest extends TestCase
{

    public function validateEventData($data)
{
    $event_name = isset($data["title"]) ? $data["title"] : "";
    $event_description = isset($data["description"]) ? $data["description"] : "";
    $event_price = isset($data["price"]) ? $data["price"] : 0;
    $event_address = isset($data["adress"]) ? $data["adress"] : "";

    // Replace single and double quotes in the input data
    $event_name = str_replace("'", "\'", $event_name);
    $event_name = str_replace('"', '\"', $event_name);
    $event_description = str_replace("'", "\'", $event_description);
    $event_description = str_replace('"', '\"', $event_description);
    $event_address = str_replace("'", "\'", $event_address);
    $event_address = str_replace('"', '\"', $event_address);

    if (strlen($event_name) < 5 || !preg_match('/^[A-Za-z0-9\'"]+$/', $event_name)) {
        return false;
    } elseif (strlen($event_description) < 10 || !preg_match('/^[A-Za-z0-9\'"]+$/', $event_description)) {
        return false;
    } elseif ($event_price < 0) {
        return false;
    } elseif (empty($event_address)) {
        return false;
    }

    return true;
}


    public function testInvalidTitle()
    {
        $postData = [
            "title" => "abc",  // Less than 5 characters
            // ... Other required fields with valid values
        ];

        $this->assertFalse(validateEventData($postData));
    }

    public function testInvalidDescription()
    {
        $postData = [
            "title" => "Valid Title",
            "description" => "abc",  // Less than 10 characters
            // ... Other required fields with valid values
        ];

        $this->assertFalse(validateEventData($postData));
    }

    public function testNegativePrice()
    {
        $postData = [
            "title" => "Valid Title",
            "description" => "Valid Description",
            "price" => -10,  // Negative price
            // ... Other required fields with valid values
        ];

        $this->assertFalse(validateEventData($postData));
    }

    public function testEmptyAddress()
    {
        $postData = [
            "title" => "Valid Title",
            "description" => "Valid Description",
            "price" => 20,
            "adress" => "",  // Empty address
            // ... Other required fields with valid values
        ];

        $this->assertFalse(validateEventData($postData));
    }

    public function testValidEvent()
    {
        $postData = [
            "title" => "Valid Title",
            "description" => "Valid Description",
            "price" => 20,
            "adress" => "Valid Address",
            // ... Other required fields with valid values
        ];

        $this->assertTrue(validateEventData($postData));
    }
}
