<?php namespace Genetsis\Druid\Rest\Apis;

use Genetsis\Druid\Rest\Apis\Contracts\DeleteContract;
use Genetsis\Druid\Rest\Apis\Contracts\HalContract;
use Genetsis\Druid\Rest\Config\RestConfig;
use Genetsis\Druid\Rest\Exceptions\RestApiException;

class Delete extends HalApi implements HalContract
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
     * @param array $arguments['id'] id key is mandatory
     * @return \Genetsis\Druid\Rest\Resources\HalResponse
     * @throws RestApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $uri, array $arguments = null)
    {
        $this->getFullClass($uri);

        $endpoint = $arguments['link'] ?? '/{$uri}/'.$arguments['id'];

        $response = $this->rest_config->getHttp()->request(
            'DELETE',
            $endpoint,
            $this->http_options
        );

        if ($response->getStatusCode() !== 204) {
            throw new RestApiException('Error deleting: '. $response->getStatusCode());
        }
        return true;
    }

}
