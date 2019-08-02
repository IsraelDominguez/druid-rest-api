<?php


namespace Genetsis\Druid\Rest\Config;


use Cache\Adapter\Common\AbstractCachePool;
use Genetsis\Druid\Rest\Security\AuthCredentials;
use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerInterface;

class RestConfig
{
    /**
     * @var AuthCredentials
     */
    protected $auth_credentials;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var AbstractCachePool
     */
    protected $cache;

    /**
     * @var ClientInterface
     */
    protected $http;


    /**
     * RestConfig constructor.
     * @param $logger
     * @param $cache
     * @param $http
     */
    public function __construct(AuthCredentials $auth_credentials, LoggerInterface $logger, AbstractCachePool $cache, ClientInterface $http)
    {
        $this->logger = $logger;
        $this->cache = $cache;
        $this->http = $http;
        $this->auth_credentials = $auth_credentials;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param LoggerInterface $logger
     * @return RestConfig
     */
    public function setLogger(LoggerInterface $logger): RestConfig
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @return AbstractCachePool
     */
    public function getCache(): AbstractCachePool
    {
        return $this->cache;
    }

    /**
     * @param AbstractCachePool $cache
     * @return RestConfig
     */
    public function setCache(AbstractCachePool $cache): RestConfig
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * @return ClientInterface
     */
    public function getHttp(): ClientInterface
    {
        return $this->http;
    }

    /**
     * @param ClientInterface $http
     * @return RestConfig
     */
    public function setHttp(ClientInterface $http): RestConfig
    {
        $this->http = $http;
        return $this;
    }

    /**
     * @return AuthCredentials
     */
    public function getAuthCredentials(): AuthCredentials
    {
        return $this->auth_credentials;
    }

    /**
     * @param AuthCredentials $auth_credentials
     * @return RestConfig
     */
    public function setAuthCredentials(AuthCredentials $auth_credentials): RestConfig
    {
        $this->auth_credentials = $auth_credentials;
        return $this;
    }
}