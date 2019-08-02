<?php namespace Genetsis\Druid\Rest\Apis;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Genetsis\Druid\Rest\Config\RestConfig;
use Genetsis\Druid\Rest\Config\Security;
use Genetsis\Druid\Rest\Security\BearerAuthorizationTrait;
use JMS\Serializer\SerializerBuilder;

class HalApi
{
    use BearerAuthorizationTrait;
    use QueryBuilderTrait;


    /**
     * @var RestConfig $config
     */
    protected $rest_config;


    protected $http_options = [];

    /**
     * @var HalTransform $hal_transform
     */
    protected $hal_transform;

    /**
     * List Api
     */
    public function __construct(RestConfig $config)
    {
        AnnotationRegistry::registerLoader('class_exists');

        $this->rest_config = $config;

        $security = new Security($this->rest_config);
        $this->http_options['headers'] = $this->getAuthorizationHeaders($security->getJwt());

        $this->hal_transform = new HalTransform();
    }

    /**
     * Gets the fully qualified name for a uri.
     *
     * @param $uri
     * @return string
     * @throws \BadMethodCallException
     */
    protected function getFullClass($uri)
    {
        if (empty($this::availableMethods[$uri])) {
            throw new \BadMethodCallException('Method ' . $uri . ' not defined for Druid RestApi');
        } else {
            return 'Genetsis\\Druid\\Rest\\Resources\\' . $this::availableMethods[$uri];
        }
    }

    public function getAllParams() {
        return ['size' => 999999];
    }
}