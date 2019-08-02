<?php namespace Genetsis\Druid\Rest\Resources;

use JMS\Serializer\Annotation\Type;

class Field extends Resource implements ResourceInterface
{
    /**
     * @var string $key
     * @Type("string")
     */
    protected $key = '';

    /**
     * @var string $maxlength
     * @Type("int")
     */
    protected $maxlength;


    /**
     * @var $name
     * @Type("string");
     */
    protected $name;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return Field
     */
    public function setKey(string $key): Field
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getMaxlength(): string
    {
        return $this->maxlength;
    }

    /**
     * @param string $maxlength
     * @return Field
     */
    public function setMaxlength(string $maxlength): Field
    {
        $this->maxlength = $maxlength;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Field
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }



}