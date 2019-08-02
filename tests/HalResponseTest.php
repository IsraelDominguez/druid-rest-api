<?php namespace Genetsis\Druid\Rest;

use Genetsis\Druid\Rest\Apis\HalTransform;
use Genetsis\Druid\Rest\Resources\Apps;
use Genetsis\Druid\Rest\Resources\Entrypoint;
use Genetsis\Druid\Rest\Resources\HalResponse;
use Genetsis\Druid\Rest\Resources\Page;

final class HalResponseTest extends InitTest
{
    /**
     * @var HalTransform
     */
    protected $hal_response;

    public function setUp()
    {
        $this->hal_response = new HalTransform();
    }

    public function testGetLinksAndPages() {
        $result = $this->hal_response->transform($this->readResource('entrypoint.json'));
        $this->assertEquals('http://rest-test.pernod-ricard-espana.com/entrypoints/search/byApp?app=358938161304888&page=0&size=20', $result->getUri());

        $this->assertInstanceOf(Page::class, $result->getPage());
        $this->assertEquals(20, $result->getPage()->getSize());
        $this->assertEquals(1, $result->getPage()->getTotalElements());
        $this->assertEquals(1, $result->getPage()->getTotalPages());
    }

    public function testGetOneEntryPoint() {
        $result = $this->hal_response->transform($this->readResource('entrypoint.json'));
        $this->assertInstanceOf(HalResponse::class, $result);
        $this->assertInstanceOf(Entrypoint::class, $result->getResources('entrypoints')[0]);

        $this->assertNotEmpty($result->getResources('entrypoints')[0]->getConfigField());
        $this->assertNotEmpty($result->getResources('entrypoints')[0]->getConfigId());

        $this->assertNull($result->getResources('nothingToGet'));
    }

    public function testGetAllResources() {
        $result = $this->hal_response->transform($this->readResource('apps.json'));
        $this->assertIsArray($result->getResources('apps'));
        $this->assertInstanceOf(Apps::class, $result->getResources('apps')[0]);
    }


    public function readResource($filename)
    {
        return trim(file_get_contents(__DIR__ . '/resources/' . $filename));
    }
}