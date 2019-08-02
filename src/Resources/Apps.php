<?php namespace Genetsis\Druid\Rest\Resources;

use JMS\Serializer\Annotation\Type;

class Apps extends Resource implements ResourceInterface
{
    /**
     * @var string $name
     * @Type("string")
     */
    protected $name = '';

    /**
     * @var string $name
     * @Type("string")
     */
    protected $key = '';

    /**
     * @var string $name
     * @Type("string")
     */
    protected $status = '';

    /**
     * @var string $name
     * @Type("string")
     */
    protected $url = '';

    /**
     * Apps constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Apps
     */
    public function setName(string $name): Apps
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return Apps
     */
    public function setKey(string $key): Apps
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Apps
     */
    public function setStatus(string $status): Apps
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Apps
     */
    public function setUrl(string $url): Apps
    {
        $this->url = $url;
        return $this;
    }

}