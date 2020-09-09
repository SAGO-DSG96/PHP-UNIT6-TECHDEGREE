<?php
/**
 * Created by VSCode.
 * User: Daniel Salazar
 * Date: 2020-09-20
 */
require_once __DIR__ .'/../classes/ListingPremium.php';

use PHPUnit\Framework\TestCase;

class ListingPremiumTest extends TestCase
{
    protected $data;
    protected $allowed_tags = '<p><br><b><strong><em><u><ol><ul><li>';

    protected function setUp(): void
    {
        $this->data = [
            "id" => "11",
            "title" => "php[world]",
            "description" => "php[world] is a conference like no other.  Designed to bring together all the communities that are linked by the PHP programming language.  Together as the PHP community, the sum is greater than the whole.",
            "website" => "https://world.phparch.com",
            "email" => "demo@demo.com",
            "twitter" => "phparch",
            "status" => "premium",
            "coc" => null
        ];
    }

    /** @test */
    function getStatusTest()
    {
        $listPremium = new ListingPremium($this->data);
        $this->assertEquals($listPremium->getStatus(), 
        'premium',
        'Get Status property PREMIUM not working correctly');
    }

    /** @test */
    function getDescriptionTest()
    {
        $listPremium = new ListingPremium($this->data);
        $this->assertEquals(
            $listPremium->getDescription(), 
            $this->data['description'],
            'Get Description property not working correctly');
    }

    /** @test */
    function displayAllowedTagsTest()
    {
        $listPremium = new ListingPremium($this->data);
        $this->assertEquals(
            $listPremium->displayAllowedTags(),
            htmlspecialchars($this->allowed_tags),
            'Different allowed tags'
        );
    }
}