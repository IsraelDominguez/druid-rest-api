<?php


namespace Genetsis\Druid\Rest\Apis\Contracts;


interface HalContract
{
    public function get(string $uri, array $arguments = null);
}
