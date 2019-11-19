<?php namespace Genetsis\Druid\Rest\Apis;

use Genetsis\Druid\Rest\Apis\Contracts\HalContract;
use Genetsis\Druid\Rest\Config\RestConfig;
use Genetsis\Druid\Rest\Exceptions\RestApiException;
use JMS\Serializer\SerializerBuilder;

class Create extends HalApi implements HalContract
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
     * @param array|null $arguments
     * @return \Genetsis\Druid\Rest\Resources\HalResponse
     * @throws RestApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $uri, array $arguments = null)
    {
        $this->getFullClass($uri);

        $this->http_options['body'] = \GuzzleHttp\json_encode($arguments);

        $response = $this->rest_config->getHttp()->request(
            'POST',
            "/{$uri}",
            $this->http_options
        );

        if ($response->getStatusCode() !== 201) {
            throw new RestApiException('Error creating EntryPoint: '. $response->getBody());
        }

        return $response->getHeaderLine('Location');
    }

}
