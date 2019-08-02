<?php namespace Genetsis\Druid\Rest\Security;

/**
 * Represents a resource owner password credentials grant.
 *
 */
trait UserPasswordGrantTrait
{
    /**
     * @inheritdoc
     */
    protected function getRequiredRequestParameters()
    {
        return [
            'username',
            'password',
        ];
    }
}