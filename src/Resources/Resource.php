<?php namespace Genetsis\Druid\Rest\Resources;


abstract class Resource
{

    /**
     * @var array Link
     */
    protected $links = [];

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

    /**
     * @return array
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * @param array $links
     * @return Resource
     */
    public function setLinks(array $links): Resource
    {
        $this->links = $links;
        return $this;
    }

    /**
     * @param string $title
     * @return string
     */
    public function getLinkByType($title = '') {
        $link = $this->links[$title] ?? null;
        return ($link) ? $link->getUri() : '';
    }
}
