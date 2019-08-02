<?php namespace Genetsis\Druid\Rest\Config;

use Genetsis\Druid\Rest\Exceptions\RestApiException;

class ConfigFactory
{
    /**
     * Returns a Config singleton by name.
     *
     * @param $name
     * @return AbstractConfig
     * @throws RestApiException
     */
    public function getConfig($name)
    {
        $class = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $name)));
        $class = 'Genetsis\\Druid\\Rest\\Config\\' . $class;
        $this->checkConfig($class);
        return new $class;
    }

    /**
     * Determines if a variable is a valid grant.
     *
     * @param  mixed $class
     * @return boolean
     */
    public function isConfig($class)
    {
        return is_subclass_of($class, AbstractConfig::class);
    }

    /**
     * Checks if a config exist
     *
     * @throws RestApiException
     * @param  mixed $class
     * @return void
     */
    public function checkConfig($class)
    {
        if (!$this->isConfig($class)) {
            throw new RestApiException(sprintf(
                'Config "%s" must extend AbstractConfig',
                is_object($class) ? get_class($class) : $class
            ));
        }
    }

    /**
     * Verifies that all required options have been passed.
     *
     * @param  array $options
     * @return void
     * @throws InvalidArgumentException
     */
    public function assertRequiredOptions(array $options)
    {
        $missing = array_diff_key(array_flip($this->getRequiredOptions()), $options);
        if (!empty($missing)) {
            throw new \InvalidArgumentException(
                'Required options not defined: ' . implode(', ', array_keys($missing))
            );
        }
    }

    /**
     * Returns all options that are required.
     *
     * @return array
     */
    protected function getRequiredOptions()
    {
        return [
            'username',
            'password',
            'api_host'
        ];
    }

}