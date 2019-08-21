<?php namespace Genetsis\Druid\Rest;

use Cache\Adapter\Void\VoidCachePool;
use Genetsis\Druid\Rest\Apis\HalTransform;
use PHPUnit\Framework\TestCase;

final class CreateTest extends TestCase
{
    /**
     * @var HalTransform
     */
    protected $hal_response;

    protected $username = "358938161304888";
    protected $password = "v6LnFa9wPujyd1nuFdz2mziaaVvznq";
    protected $api_host = "https://rest-test.pernod-ricard-espana.com";

    /**
     * @var \Genetsis\Druid\Rest\RestApi
     */
    public $api;

    public function setUp()
    {
        $this->api = new \Genetsis\Druid\Rest\RestApi([
            'username' => $this->username,
            'password' => $this->password,
            'api_host' => $this->api_host,
        ],[
            'cache' => new VoidCachePool()
        ]);

        $this->hal_response = new HalTransform();
    }

    public function testCreateEntrypoint() {
        $entrypoint_data = $this->readResource('createentrypoint.json');

        $entrypoints = $this->api->createEntrypoints(json_decode($entrypoint_data, true));

        $this->assertEquals(1, 1);
    }

    public function readResource($filename)
    {
        return trim(file_get_contents(__DIR__ . '/resources/' . $filename));
    }
}
