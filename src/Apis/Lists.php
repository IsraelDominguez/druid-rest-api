<?php namespace Genetsis\Druid\Rest\Apis;

use Genetsis\Druid\Rest\Config\RestConfig;

class Lists extends HalApi implements HalContract
{

    /**
     * Initializes to a list of all the available parameters to be Get Lists
     *
     * @var array
     */
    const availableMethods = [
        'brands' => 'Brand',
        'entrypoints' => 'Entrypoint',
        'apps' => 'Apps',
        'typologyFields' => 'TypologyFields'
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
            $this->appendQuery("/{$uri}", array_merge($this->getAllParams(), $arguments)),
            $this->http_options
        );

        return $this->hal_transform->transform($uri, $response->getBody());
    }


}