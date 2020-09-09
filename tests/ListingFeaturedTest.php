<?php
/**
 * Created by VSCode.
 * User: Daniel Salazar
 * Date: 2020-09-20
 */
require_once __DIR__ .'/../classes/ListingFeatured.php';

use PHPUnit\Framework\TestCase;

class ListingFeaturedTest extends TestCase
{
    protected $data;

    protected function setUp(): void
    {
        $this->data = [
            "id" => "16",
            "title" => "Cascadia PHP",
            "description" => "The Pacific Northwest (also known as Cascadia) is a magical land covered in Rain Forests, Deserts, Coasts, Mountains, Rivers, and People. Its expansive forests have traditionally powered the industries in this area, but with the last century, more and more it has had a focus on Tech.",
            "website" => "https://www.cascadiaphp.com",
            "email" => "leadership@cascadiaphp.com",
            "twitter" => "cascadiaphp",
            "status" => "featured",
            "coc" => "<p><em>Cascadia PHP</em> is dedicated to providing a harassment-free conference experience for everyone,
            regardless of gender, gender identity and expression, sexual orientation, disability, physical</p>"
        ];
    }

    /** @test */
    function getStatusTest()
    {
        $listFeatured= new ListingFeatured($this->data);
        $this->assertEquals($listFeatured->getStatus(), 
        'featured',
        'Get Status property PREMIUM not working correctly');
    }

    /** @test */
    function getCocTest()
    {
        $listFeatured = new ListingFeatured($this->data);
        $this->assertEquals(
            $listFeatured->getCoc(), 
            $this->data['coc'],
            'Get Description property not working correctly');
    }
}