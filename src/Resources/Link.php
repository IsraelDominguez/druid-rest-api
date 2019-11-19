<?php namespace Genetsis\Druid\Rest\Resources;

use JMS\Serializer\Annotation\Type;

class Link implements ResourceInterface {

    /**
     * @var $uri
     * @Type("string")
     */
    protected $uri;

    /**
     * @var $title
     * @Type("string")
     */
    protected $title;

    /**
     * Link constructor.
     * @param $uri
     * @param $title
     */
    public function __construct($title, $uri)
    {
        $this->uri = $uri;
        $this->title = $title;
    }


    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param mixed $uri
     * @return Links
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Links
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

}
