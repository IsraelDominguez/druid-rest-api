<?php namespace Genetsis\Druid\Rest\Apis;

use Genetsis\Druid\Rest\Config\RestConfig;
use JMS\Serializer\SerializerBuilder;
use PhpHal\Format\Reader\Hal\JsonReader;

class Search extends HalApi implements HalContract
{


    /**
     * Initializes to a list of all the available parameters to be Get Lists
     *
     * @var array
     */
    const availableMethods = [
        'entrypoints' => 'Entrypoint',
        'apps' => 'Apps'
    ];

    /**
     * List Api
     */
    public function __construct(RestConfig $config)
    {
        parent::__construct($config);
    }

    /**
     * @param string $uri
     * @param array $arguments
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $uri, array $arguments = null)
    {
        $this->getFullClass($uri);

        $response = $this->rest_config->getHttp()->request(
            'GET',
            $this->appendQuery("/{$uri}/search/by".ucfirst(array_key_first($arguments)), array_merge($this->getAllParams(), $arguments)),
            $this->http_options
        );

        return $this->hal_transform->transform($uri, $response->getBody());

    }

}