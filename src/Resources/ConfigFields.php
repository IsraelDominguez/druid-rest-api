<?php namespace Genetsis\Druid\Rest\Resources;

use JMS\Serializer\Annotation\Type;

class ConfigFields extends Resource implements ResourceInterface
{
    /**
     * @var TypologyFields $field
     * @Type("Genetsis\Druid\Rest\Resources\TypologyFields")
     */
    protected $field;

    /**
     * @var boolean $mandatory
     * @Type("boolean")
     */
    protected $mandatory;

    /**
     * @var boolean $editable
     * @Type("boolean")
     */
    protected $editable;

    /**
     * @return TypologyFields
     */
    public function getField(): TypologyFields
    {
        return $this->field;
    }

    /**
     * @param TypologyFields $field
     * @return ConfigFields
     */
    public function setField(TypologyFields $field): ConfigFields
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMandatory(): bool
    {
        return $this->mandatory;
    }

    /**
     * @param bool $mandatory
     * @return ConfigFields
     */
    public function setMandatory(bool $mandatory): ConfigFields
    {
        $this->mandatory = $mandatory;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEditable(): bool
    {
        return $this->editable;
    }

    /**
     * @param bool $editable
     * @return ConfigFields
     */
    public function setEditable(bool $editable): ConfigFields
    {
        $this->editable = $editable;
        return $this;
    }



}