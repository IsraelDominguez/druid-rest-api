<?php namespace Genetsis\Druid\Rest\Resources;

use JMS\Serializer\Annotation\Type;

class Entrypoint extends Resource implements ResourceInterface
{
    /**
     * @var string $description
     * @Type("string")
     */
    protected $description;

    /**
     * @var string $url
     * @Type("string")
     */
    protected $url;

    /**
     * @var string $key
     * @Type("string")
     */
    protected $key;

    /**
     * @var boolean $register_in_two_steps
     * @Type("boolean")
     */
    protected $register_in_two_steps;

    /**
     * @var boolean $register_assisted
     * @Type("boolean")
     */
    protected $register_assisted;

    /**
     * @var boolean $passwordless_register
     * @Type("boolean")
     */
    protected $passwordless_register;

    /**
     * @var boolean $live_event
     * @Type("boolean")
     */
    protected $live_event;

    /**
     * @var boolean $main
     * @Type("boolean")
     */
    protected $main;


    /**
     * @var array<ConfigIds> $config_ids
     * @Type("array<Genetsis\Druid\Rest\Resources\ConfigIds>")
     */
    protected $config_id;

    /**
     * @var array<ConfigFields> $config_field
     * @Type("array<Genetsis\Druid\Rest\Resources\ConfigFields>")
     */
    protected $config_field;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Entrypoint
     */
    public function setDescription(string $description): Entrypoint
    {
        $this->description = $description;
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
     * @return Entrypoint
     */
    public function setUrl(string $url): Entrypoint
    {
        $this->url = $url;
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
     * @return Entrypoint
     */
    public function setKey(string $key): Entrypoint
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRegisterInTwoSteps(): bool
    {
        return $this->register_in_two_steps;
    }

    /**
     * @param bool $register_in_two_steps
     * @return Entrypoint
     */
    public function setRegisterInTwoSteps(bool $register_in_two_steps): Entrypoint
    {
        $this->register_in_two_steps = $register_in_two_steps;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRegisterAssisted(): bool
    {
        return $this->register_assisted;
    }

    /**
     * @param bool $register_assisted
     * @return Entrypoint
     */
    public function setRegisterAssisted(bool $register_assisted): Entrypoint
    {
        $this->register_assisted = $register_assisted;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPasswordlessRegister(): bool
    {
        return $this->passwordless_register;
    }

    /**
     * @param bool $passwordless_register
     * @return Entrypoint
     */
    public function setPasswordlessRegister(bool $passwordless_register): Entrypoint
    {
        $this->passwordless_register = $passwordless_register;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLiveEvent(): bool
    {
        return $this->live_event;
    }

    /**
     * @param bool $live_event
     * @return Entrypoint
     */
    public function setLiveEvent(bool $live_event): Entrypoint
    {
        $this->live_event = $live_event;
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
     * @return Entrypoint
     */
    public function setMain(bool $main): Entrypoint
    {
        $this->main = $main;
        return $this;
    }

    /**
     * @return array
     */
    public function getConfigId(): array
    {
        return $this->config_id;
    }

    /**
     * @param array $config_id
     * @return Entrypoint
     */
    public function setConfigId(array $config_id): Entrypoint
    {
        $this->config_id = $config_id;
        return $this;
    }

    /**
     * @return array
     */
    public function getConfigField(): array
    {
        return $this->config_field;
    }

    /**
     * @param array $config_field
     * @return Entrypoint
     */
    public function setConfigField(array $config_field): Entrypoint
    {
        $this->config_field = $config_field;
        return $this;
    }


}