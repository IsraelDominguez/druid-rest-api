<?php namespace Genetsis\Druid\Rest;


use Genetsis\Druid\Rest\Config\ConfigFactory;
use Genetsis\Druid\Rest\Config\RestConfig;
use Genetsis\Druid\Rest\Config\Security;
use Genetsis\Druid\Rest\Resources\HalResponse;
use Genetsis\Druid\Rest\Security\AuthCredentials;

/**
 * Class RestApi
 *
 * The main interface for the clients, it relies heavily in magic methods exposing
 * an interface with method tags.
 *
 * ==== GET LISTS ====
 *
 * @method \Genetsis\Druid\Rest\RestApi getBrands()
 * @method \Genetsis\Druid\Rest\RestApi getApps()
 * @method \Genetsis\Druid\Rest\RestApi getEntrypoints()
 * @method \Genetsis\Druid\Rest\RestApi getTypologyFields()
 * @method \Genetsis\Druid\Rest\RestApi searchEntrypointsBy($array_search)
 * @method \Genetsis\Druid\Rest\RestApi searchAppsBy($array_search)
 * @method \Genetsis\Druid\Rest\RestApi createEntrypoints($array_data)
 * @method \Genetsis\Druid\Rest\RestApi deleteEntrypoints($array_data)
 *
 *
 *
 **/

class RestApi
{
    /**
     * @var RestConfig
     */
    protected $config = null;

    public function __construct(array $config = [], array $options = [])
    {
        $this->apiConfiguration($config, $options);
    }

    private function apiConfiguration(array $config, array $options)
    {
        $configFactory = new ConfigFactory();
        $configFactory->assertRequiredOptions($config);

        if (empty($options['logger'])) {
            // Define default LogginInterface library (Monolog)
            $options['logger'] = $configFactory->getConfig('logger')->set([
                'logLevel' => (empty($options['logLevel'])) ? '' : $options['logLevel'],
                'logDir' => (empty($options['logPath'])) ? '' : $options['logPath']
            ]);
        }

        if (empty($options['cache'])) {
            // Define default Cache (File System)
            $options['cache'] = $configFactory->getConfig('cache')->set([
                'cachePath' => (empty($options['cachePath'])) ? '' : $options['cachePath'],
            ]);
        }
        if (empty($options['httpClient'])) {
            // Define de Default Http Client (Guzzle)
            $options['httpClient'] = $configFactory->getConfig('http')->set([
                'logger' => $options['logger'],
                'api_host' => $config['api_host']
            ]);
        }

        $this->config = new RestConfig(new AuthCredentials($config['username'], $config['password']), $options['logger'], $options['cache'], $options['httpClient']);
    }

    /**
     * @return RestConfig
     */
    public function getConfig(): RestConfig
    {
        return $this->config;
    }

    /**
     * Routes the method call to the adequate protected method.
     *
     * @param $methodName
     * @param array $methodArguments
     * @return HalResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function __call($methodName, array $methodArguments)
    {
        if (isset($methodArguments[0])) {
            $methodArguments = $methodArguments[0];
        }

        $uri = '';
        if (preg_match('/^get(\w+)/', $methodName, $matches)) {
            $hal_api = new \Genetsis\Druid\Rest\Apis\Lists($this->getConfig());
            $uri = $matches[1];
        }

        if (preg_match('/^search(\w+)By/', $methodName, $matches)) {
            $hal_api = new \Genetsis\Druid\Rest\Apis\Search($this->getConfig());
            $uri = $matches[1];
        }

        if (preg_match('/^create(\w+)/', $methodName, $matches)) {
            $hal_api = new \Genetsis\Druid\Rest\Apis\Create($this->getConfig());
            $uri = $matches[1];
        }

        if (preg_match('/^delete(\w+)/', $methodName, $matches)) {
            $hal_api = new \Genetsis\Druid\Rest\Apis\Delete($this->getConfig());
            $uri = $matches[1];
        }
        return $hal_api->get(lcfirst($uri), $methodArguments);
    }

}
