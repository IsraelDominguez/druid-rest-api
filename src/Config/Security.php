<?php namespace Genetsis\Druid\Rest\Config;

use Genetsis\Druid\Rest\Exceptions\RestApiException;
use Genetsis\Druid\Rest\Security\AuthCredentials;
use Genetsis\Druid\Rest\Security\Authentication;
use Genetsis\Druid\Rest\Security\JWT;
use GuzzleHttp\Exception\ConnectException;

class Security
{
    /**
     * @var JWT
     *
     */
    protected $jwt;

    /**
     * @var RestConfig $config
     */
    protected $rest_config;

    /**
     * Security constructor.
     * @param JWT $jwt
     */
    public function __construct(RestConfig $config)
    {
        $this->rest_config = $config;
    }


    public function getJwt()
    {
        $this->jwt = $this->rest_config->getCache('cache')->getItem('JWT')->get();

        if ((empty($this->jwt))||($this->jwt->isExpired())) {
            try {
                $this->rest_config->getLogger()->debug('JWT empty or expired');

                $this->jwt = Authentication::build($this->rest_config)->authorize();

                $this->rest_config->getCache()->set('JWT', $this->jwt);
            } catch (ConnectException $e) {
                $this->rest_config->getLogger()->error($e->getMessage());
                throw new RestApiException($e->getMessage());
            }
        } else {
            $this->rest_config->getLogger()->debug('Get JWT from cache');
        }

        return $this->jwt;
    }
}