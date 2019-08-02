<?php namespace Genetsis\Druid\Rest;

use Genetsis\Druid\Rest\Config\Security;
use Genetsis\Druid\Rest\Exceptions\RestApiAuthException;
use Genetsis\Druid\Rest\Security\Authentication;
use Genetsis\Druid\Rest\Security\JWT;

final class SecurityTest extends InitTest
{


    public function testRestCheckAuthorization() {
        $this->assertInstanceOf(JWT::class, Authentication::build($this->api->getConfig())->authorize());
    }


    /**
     * @expectedException Genetsis\Druid\Rest\Exceptions\RestApiAuthException
     */
    public function testRestCheckNotConnectToAuthorization() {
        $config = $this->api->getConfig();
        $config->getAuthCredentials()->setUsername('notValid');

        Authentication::build($this->api->getConfig())->authorize();
    }



    public function testRestCheckGetJwt()
    {
        $security = new Security($this->api->getConfig());

        $this->assertInstanceOf(JWT::class, $security->getJwt());
    }

}