<?php namespace Genetsis\Druid\Rest\Security;


use Genetsis\Druid\Rest\Config\RestConfig;
use Genetsis\Druid\Rest\Exceptions\RestApiAuthException;

class Authentication
{
    use RequiredParameterTrait;
    use UserPasswordGrantTrait;
    use JsonHeadersTrait;

    /**
     * @var AuthCredentials $credentials
     */
    private $credentials;

    /**
     * @var JWT $jwt
     */
    protected $jwt;

    /**
     * @var RestConfig $rest_config
     */
    protected $rest_config;

    public static function build(RestConfig $config) {
        return new Authentication($config);
    }

    /**
     * AuthCredentials constructor.
     */
    public function __construct(RestConfig $config) {
        $this->rest_config = $config;
    }

    /**
     * @return JWT
     */
    public function getJwt(): JWT
    {
        return $this->jwt;
    }

    /**
     * @param JWT $jwt
     */
    public function setJwt(JWT $jwt)
    {
        $this->jwt = $jwt;
    }


    public function authorize() {

        $this->checkRequiredParameters($this->getRequiredRequestParameters(), $this->rest_config->getAuthCredentials()->jsonSerialize());

        $options['body'] = \GuzzleHttp\json_encode($this->rest_config->getAuthCredentials());
        $options['headers'] = $this->getJsonHeaders();

        $response = $this->rest_config->getHttp()->request('POST', '/auth', $options);

        if (($response->hasHeader('Authorization')) && ($response->hasHeader('Expires'))) {
            $this->setJwt(new JWT($response->getHeaderLine('Authorization'), strtotime($response->getHeaderLine('Expires'))));
        } else {
            throw new RestApiAuthException("Not Auth Response from Server");
        }

        return $this->getJwt();
    }

}