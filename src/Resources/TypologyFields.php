<?php namespace Genetsis\Druid\Rest\Resources;

use JMS\Serializer\Annotation\Type;

class TypologyFields extends Resource implements ResourceInterface
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
     * @var string $field
     * @Type("Genetsis\Druid\Rest\Resources\Field")
     */
    protected $field = '';

    /**
     * @var string $maxlength
     * @Type("int")
     */
    protected $maxlength;
//
//    /**
//     * @var string $type
//     * @Type("string")
//     */
//    protected $type;

    /**
     * @var string $order
     * @Type("int")
     */
    protected $order;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return TypologyFields
     */
    public function setKey(string $key): TypologyFields
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @param string $field
     * @return TypologyFields
     */
    public function setField(string $field): TypologyFields
    {
        $this->field = $field;
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
     * @return TypologyFields
     */
    public function setMaxlength(string $maxlength): TypologyFields
    {
        $this->maxlength = $maxlength;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrder(): string
    {
        return $this->order;
    }

    /**
     * @param string $order
     * @return TypologyFields
     */
    public function setOrder(string $order): TypologyFields
    {
        $this->order = $order;
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
     * @return TypologyFields
     */
    public function setName(string $name): TypologyFields
    {
        $this->name = $name;
        return $this;
    }

}