<?php namespace Genetsis\Druid\Rest\Resources;


abstract class Resource
{

    /**
     * Initializes to a list of all the available parameters to be Get Lists
     *
     * @var array
     */
    const availableResources = [
        'entrypoints' => 'Entrypoint',
        'apps' => 'Apps',
        'brands' => 'Brand',
        'typologyFields' => 'TypologyFields'
    ];

}