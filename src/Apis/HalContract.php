<?php


namespace Genetsis\Druid\Rest\Apis;


interface HalContract
{
    public function get(string $uri, array $arguments = null);
}