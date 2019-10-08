<?php namespace Genetsis\Druid\Rest;

use Cache\Adapter\Void\VoidCachePool;
use Genetsis\Druid\Rest\Apis\HalTransform;
use PHPUnit\Framework\TestCase;

final class CreateTest extends TestCase
{
    /**
     * @var HalTransform
     */
    protected $hal_response;

    protected $username = '609975803614572';
    protected $password = 'NIfbbB773AjEIaM8LAz4JuixR7XFZu';
    protected $api_host = 'https://rest.test.id.sevillafc.es';

    /**
     * @var \Genetsis\Druid\Rest\RestApi
     */
    public $api;

    private $entrypoints_data;

    public function setUp()
    {
        $this->api = new \Genetsis\Druid\Rest\RestApi([
            'username' => $this->username,
            'password' => $this->password,
            'api_host' => $this->api_host,
        ],[
            'cache' => new VoidCachePool()
        ]);

        $this->hal_response = new HalTransform();

        $this->entrypoints_data = [
            'default' => [
                'app' => '',
                'key' => '',
                'description' => '',
                'url' => '',
                'main' => false,
                'restrict_login_based_on_typology' => false,
                'register_in_two_steps' => false,
                'register_assisted' => false,
                'passwordless_register' => false,
                'live_event' => false,
                'platform' => $this->api_host.'/platforms/1',
                'workTypology' => $this->api_host.'/typologyes/1',
                'registerTypology' => $this->api_host.'/typologyes/1'
            ],
            'simple' => [
                'config_id' => [
                    [
                        'mandatory' => true,
                        'main' => true,
                        'need_confirmation' => true,
                        'used_as_validation_field_in_two_step_registration' => false,
                        'field_type' => 'email'
                    ]
                ],
                'config_field' => [
                    // Name
                    [
                        'mandatory' => true,
                        'used_as_validation_field_in_two_step_registration' => false,
                        'extra_field_in_two_step_registration' => false,
                        'typologyField' => $this->api_host.'/typologyFields/1'
                    ],
                    // Surname
                    [
                        'mandatory' => true,
                        'used_as_validation_field_in_two_step_registration' => false,
                        'extra_field_in_two_step_registration' => false,
                        'typologyField' => $this->api_host.'/typologyFields/2',
                    ],
                    // Birthday
                    [
                        'mandatory' => true,
                        'used_as_validation_field_in_two_step_registration' => false,
                        'extra_field_in_two_step_registration' => false,
                        'typologyField' => env('DRUID_REST_HOST').'/typologyFields/11'
                    ]
                ]
            ],
            'complete' => [
                'config_id' => [
                    [
                        'mandatory' => true,
                        'main' => true,
                        'need_confirmation' => true,
                        'used_as_validation_field_in_two_step_registration' => false,
                        'field_type' => 'email'
                    ]
                ],
                'config_field' => [
                    // Name
                    [
                        'mandatory' => true,
                        'used_as_validation_field_in_two_step_registration' => false,
                        'extra_field_in_two_step_registration' => false,
                        'typologyField' => $this->api_host.'/typologyFields/1'
                    ],
                    // Surname
                    [
                        'mandatory' => true,
                        'used_as_validation_field_in_two_step_registration' => false,
                        'extra_field_in_two_step_registration' => false,
                        'typologyField' => $this->api_host.'/typologyFields/2'
                    ],
                    // Gender
                    [
                        'mandatory' => true,
                        'used_as_validation_field_in_two_step_registration' => false,
                        'extra_field_in_two_step_registration' => false,
                        'typologyField' => $this->api_host.'/typologyFields/3'
                    ],
                    // Postal Code
                    [
                        'mandatory' => true,
                        'used_as_validation_field_in_two_step_registration' => false,
                        'extra_field_in_two_step_registration' => false,
                        'typologyField' => $this->api_host.'/typologyFields/10'
                    ],
                    // Birthday
                    [
                        'mandatory' => true,
                        'used_as_validation_field_in_two_step_registration' => false,
                        'extra_field_in_two_step_registration' => false,
                        'typologyField' => $this->api_host.'/typologyFields/11'
                    ]
                ]
            ]
        ];
    }

    /**
     * @expectedException \Genetsis\Druid\Rest\Exceptions\RestApiException
     */
    public function testCreateEntrypointFail() {
        $this->entrypoints_data['default']['app'] = $this->api_host.'/apps/14';
        $this->entrypoints_data['default']['key'] = 'una-key-de-prueba-simple';
        $this->entrypoints_data['default']['description'] = 'La Descripción del Entrypoint Simple';
        $this->entrypoints_data['default']['url'] = 'https://mi-app.com';

        $entrypoint_data = array_merge($this->entrypoints_data['default'], $this->entrypoints_data['simple']);
        $entrypoint = $this->api->createEntrypoints($entrypoint_data);

    }

    /**
     * @expectedException \Genetsis\Druid\Rest\Exceptions\RestApiException
     */
    public function testDeleteEntrypointFailNotExist() {
        $entrypoint = $this->api->deleteEntrypoints(['id' => 28232]);
    }

    public function testCreateEntrypointSimple() {
        $this->entrypoints_data['default']['app'] = $this->api_host.'/apps/14';
        $this->entrypoints_data['default']['key'] = $this->username.'-una-key-de-prueba-simple';
        $this->entrypoints_data['default']['description'] = 'La Descripción del Entrypoint Simple';
        $this->entrypoints_data['default']['url'] = 'https://mi-app.com';

        $entrypoint_data = array_merge($this->entrypoints_data['default'], $this->entrypoints_data['simple']);
        $entrypoint = $this->api->createEntrypoints($entrypoint_data);

        $this->assertStringStartsWith($this->api_host. '/entrypoints/', $entrypoint);
    }

    public function testDeleteEntrypoint() {
        $this->assertTrue($this->api->deleteEntrypoints(['id' => 31]));
    }

    /**
     * @expectedException \Genetsis\Druid\Rest\Exceptions\RestApiException
     */
    public function testDeleteEntrypointFail() {
        $this->assertTrue($this->api->deleteEntrypoints(['id' => 30]));
    }

    public function testCreateEntrypointComplete() {
        $this->entrypoints_data['default']['app'] = $this->api_host.'/apps/14';
        $this->entrypoints_data['default']['key'] = $this->username.'-una-key-de-prueba-complete';
        $this->entrypoints_data['default']['description'] = 'La Descripción del Entrypoint Complete';
        $this->entrypoints_data['default']['url'] = 'https://mi-app.com';

        $entrypoint_data = array_merge($this->entrypoints_data['default'], $this->entrypoints_data['complete']);

        $entrypoint = $this->api->createEntrypoints($entrypoint_data);

        $this->assertStringStartsWith($this->api_host. '/entrypoints/', $entrypoint);
    }

    public function readResource($filename)
    {
        return trim(file_get_contents(__DIR__ . '/resources/' . $filename));
    }
}
