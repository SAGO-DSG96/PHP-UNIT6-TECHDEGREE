<?php
/**
 * Created by VSCode.
 * User: Daniel Salazar
 * Date: 2020-09-20
 */
require_once __DIR__ .'/../classes/ListingBasic.php';

use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase
{
    protected $data;

    protected function setUp(): void
    {
        $this->data = [
            "id" => "12",
            "title" => "MIDWEST PHP",
            "description" => null,
            "website" => "http://midwestphp.org",
            "email" => "sponsorships@midwestphp.org",
            "twitter" => "midwestphp",
            "status" => "basic",
            "coc" => null
        ];
    }

    /** @test */
    function exceptionConstructorNullParametersTest()
    {
        $this->expectExceptionMessage('Unable to create a listing, data unavailable');
        //Null array parameters for construct
        $data = array();
        return new ListingBasic($data);  
    }

    /** @test */
    function exceptionNullIDKeyTest()
    {
        $this->expectExceptionMessage('Unable to create a listing, invalid id');
        //Clone property before modication
        $data = $this->data;
        //Clear ID for testing, and keep property with values
        $data["id"] = null;  
        return new ListingBasic($data);
    }

    /** @test */
    function exceptionNullTitleKeyTest()
    {
        $this->expectExceptionMessage('Unable to create a listing, invalid title');
        //Clone property before modication
        $data = $this->data;
        //Clear title for testing, and keep property with values
        $data["title"] = null;  
        return new ListingBasic($data);
    }

    /** @test */
    function minimumValuesArraysKeyToCreateObject()
    {
        //Clone property before modication
        $data = $this->data;
        //Clear title for testing, and keep property with values
        $data["website"] = null;  
        $data["email"] = null;  
        $data["twitter"] = null;  
        $data["status"] = null;  
        $data["coc"] = null;  
        $listBasic = new ListingBasic($data);
        return $this->assertInstanceOf(ListingBasic::class, 
        $listBasic,
        'Is not a object of ListingBasic');
    }

    /** @test */
    function getStatusTest()
    {
        $listBasic = new ListingBasic($this->data);
        $this->assertEquals($listBasic->getStatus(), 
        'basic', 
        'Get Status property PREMIUM not working correctly');
    }

    /** @test */
    function getPropertiesTest()
    {
        $listBasic = new ListingBasic($this->data);
        $this->assertEquals(
            $listBasic->getId(), 
            $this->data['id'],
            'Get ID property not working correctly');
        $this->assertEquals(
            $listBasic->getTitle(), 
            $this->data['title'],
            'Get Title property not working correctly');
        $this->assertEquals(
            $listBasic->getWebsite(), 
            $this->data['website'],
            'Get Website property not working correctly');
        $this->assertEquals(
            $listBasic->getEmail(),
            $this->data['email'],
            'Get Email property not working correctly');
        $this->assertEquals(
            $listBasic->getTwitter(), 
            $this->data['twitter'],
            'Get Twitter property not working correctly');
        $this->assertEquals(
            $listBasic->getStatus(), 
            $this->data['status'],
            'Get Status property not working correctly');
    }

    /** @test */
    function toArrayTest()
    {
        $listBasic = new ListingBasic($this->data);
        foreach ($listBasic->toArray() as $key => $value) {
            $this->assertArrayHasKey($value, [$this->data[$key] => $value],
            "toArray is not retrieving correct data $key data incorrect");
        }
    }

    /** @test */
    function setWebsiteTest()
    {
        $listBasic = new ListingBasic($this->data);
        //With data without http://
        $url = 'google.com.mx';
        $listBasic->setWebsite($url);
        $this->assertEquals($listBasic->getWebsite(),
         "http://$url",
        "Is not adding http://");

        //With data without http://
        $listBasic->setWebsite('');
        $this->assertEquals($listBasic->getWebsite(), 
        null,
        'Problem with empty setWebsite');

        //With data and http://
        $listBasic->setWebsite("http://$url");
        $this->assertEquals($listBasic->getWebsite(), "http://$url",
        'Problem with parameter in http://');

    }

    /** @test */
    function setStatusTest()
    {
        $this->data['status'] = '';
        $listBasic = new ListingBasic($this->data);        
        $this->assertEquals($listBasic->getStatus(), 
        'basic',
        'Problem with set Status');
    }

}