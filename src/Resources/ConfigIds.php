<?php namespace Genetsis\Druid\Rest\Resources;

use JMS\Serializer\Annotation\Type;

class ConfigIds extends Resource implements ResourceInterface
{
    /**
     * @var TypologyFields $field
     * @Type("Genetsis\Druid\Rest\Resources\TypologyFields")
     */
    protected $field;

    /**
     * @var boolean $main
     * @Type("boolean")
     */
    protected $main;

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
     * @return ConfigIds
     */
    public function setField(TypologyFields $field): ConfigIds
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMain(): bool
    {
        return $this->main;
    }

    /**
     * @param bool $main
     * @return ConfigIds
     */
    public function setMain(bool $main): ConfigIds
    {
        $this->main = $main;
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
     * @return ConfigIds
     */
    public function setMandatory(bool $mandatory): ConfigIds
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
     * @return ConfigIds
     */
    public function setEditable(bool $editable): ConfigIds
    {
        $this->editable = $editable;
        return $this;
    }



}