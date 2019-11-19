<?php namespace Genetsis\Druid\Rest;

use Cache\Adapter\Void\VoidCachePool;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\Exception\InvalidParameterException;

abstract class InitTest extends TestCase
{

    protected $username = "609975803614572";
    protected $password = "NIfbbB773AjEIaM8LAz4JuixR7XFZu";
    protected $api_host = "https://rest.test.id.sevillafc.es";

    // Pernod: 358938161304888-rotationpartiesapp
    public $entrypoint_key = '609975803614572-promocion-simple-de-sevilla-fc';

    public $app_id = '609975803614572';

    public $app_link = 'https://rest.test.id.sevillafc.es/apps/14';

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
