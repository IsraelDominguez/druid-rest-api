<?php namespace Genetsis\Druid\Rest\Security;

/**
 * Enables `Bearer` header authorization for providers.
 *
 * @link http://tools.ietf.org/html/rfc6750 Bearer Token Usage (RFC 6750)
 */
trait BearerAuthorizationTrait
{

    use JsonHeadersTrait;

    /**
     * Returns authorization headers for the 'bearer' grant.
     *
     * @param  mixed|null $token Either a string or an access token instance
     * @return array
     */
    protected function getAuthorizationHeaders($token = null)
    {
        return array_merge(
            $this->getJsonHeaders(),
            ['Authorization' =>  $token->getBearer()]
        );
        //return ['Authorization' => 'Bearer ' . $token];
        //return ['Authorization' =>  $token];
    }
}