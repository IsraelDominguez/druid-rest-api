<?php namespace Genetsis\Druid\Rest;

use Cache\Adapter\Void\VoidCachePool;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\Exception\InvalidParameterException;

abstract class InitTest extends TestCase
{

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
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testRestCheckNotRequiredParams()
    {
        $api_rest = new RestApi([
            'username' => $this->username,
            'password' => $this->password
        ]);
    }
}