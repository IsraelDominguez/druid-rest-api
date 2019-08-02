<?php namespace Genetsis\Druid\Rest\Resources;

use JMS\Serializer\Annotation\Type;

class Image
{

    /**
     * @var string $mediaType
     * @Type("string")
     */
    protected $mediaType = '';

    /**
     * @var string $data
     * @Type("string")
     */
    protected $data = '';

    /**
     * @var string $dataBase64
     * @Type("string")
     */
    protected $dataBase64 = '';

    /**
     * @var string $html
     * @Type("string")
     */
    protected $html = '';

    /**
     * Image constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    /**
     * @param string $mediaType
     * @return Image
     */
    public function setMediaType(string $mediaType): Image
    {
        $this->mediaType = $mediaType;
        return $this;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return Image
     */
    public function setData(string $data): Image
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataBase64(): string
    {
        return $this->dataBase64;
    }

    /**
     * @param string $dataBase64
     * @return Image
     */
    public function setDataBase64(string $dataBase64): Image
    {
        $this->dataBase64 = $dataBase64;
        return $this;
    }

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    /**
     * @param string $html
     * @return Image
     */
    public function setHtml(string $html): Image
    {
        $this->html = $html;
        return $this;
    }


}