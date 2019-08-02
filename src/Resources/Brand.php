<?php namespace Genetsis\Druid\Rest\Resources;

use JMS\Serializer\Annotation\Type;

class Brand extends Resource implements ResourceInterface
{
    /**
     * @var string $key
     * @Type("string")
     */
    protected $key = '';

    /**
     * @var string $name
     * @Type("string")
     */
    protected $name = '';

    /**
     * @var bool $published
     * @Type("string")
     */
    protected $published = true;

    /**
     * @var Image $image
     * @Type("Genetsis\Druid\Rest\Resources\Image")
     */
    protected $image;

    /**
     * Brand constructor.
     */
    public function __construct()
    {
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
     * @return Brand
     */
    public function setKey(string $key): Brand
    {
        $this->key = $key;
        return $this;
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
     * @return Brand
     */
    public function setName(string $name): Brand
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->published;
    }

    /**
     * @param bool $published
     * @return Brand
     */
    public function setPublished(bool $published): Brand
    {
        $this->published = $published;
        return $this;
    }

    /**
     * @return Image
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @param Image $image
     * @return Brand
     */
    public function setImage(Image $image): Brand
    {
        $this->image = $image;
        return $this;
    }

}