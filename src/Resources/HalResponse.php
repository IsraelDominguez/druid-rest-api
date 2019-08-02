<?php namespace Genetsis\Druid\Rest\Resources;


class HalResponse
{
    /**
     * Self Link for the Resource
     * @var string $uri;
     */
    protected $uri;

    /**
     * @var Page $page
     */
    protected $page;

    /**
     * @var string $title;
     */
    protected $title;

    /**
     * Resources Deserialize with JMS
     * @var array<ResourceInterface> $resources
     */
    protected $resources;

    /**
     * The self Resource
     * @var ResourceInterface
     */
    protected $data;

    /**
     * @var string $class
     */
    protected $class;


    /**
     * HalResponse constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     * @return HalResponse
     */
    public function setUri(string $uri): HalResponse
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @return Page
     */
    public function getPage(): Page
    {
        return $this->page;
    }

    /**
     * @param Page $page
     * @return HalResponse
     */
    public function setPage(Page $page): HalResponse
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return HalResponse
     */
    public function setTitle(string $title): HalResponse
    {
        $this->title = $title;
        return $this;
    }


    /**
     * Get related Resource
     * @param $rel
     * @return array|Resource
     */
    public function getResources(string $rel = null)
    {
        if (isset($this->resources[$rel])) {
            //if (count($this->resources)>0)
            //    return $this->resources[$rel][0];

            return $this->resources[$rel];
        }
        return null;
    }

    /**
     * @param array $resources
     * @return HalResponse
     */
    public function setResources(array $resources): HalResponse
    {
        $this->resources = $resources;
        return $this;
    }


    public function addResource(string $rel, ResourceInterface $resource)
    {
        $this->resources[$rel] = $resource;
        return $this;
    }


    /**
     * @param string $rel
     * @param array<ResourceInterface> $resources
     * @return $this
     */
    public function addResources(string $rel, array $resources) {

        $this->resources[$rel] = $resources;

        return $this;
    }

    /**
     * @return ResourceInterface
     */
    public function getData(): ResourceInterface
    {
        return $this->data;
    }

    /**
     * @param ResourceInterface $data
     * @return HalResponse
     */
    public function setData(ResourceInterface $data): HalResponse
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param string $class
     * @return HalResponse
     */
    public function setClass(string $class): HalResponse
    {
        $this->class = $class;
        return $this;
    }


}