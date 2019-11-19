<?php namespace Genetsis\Druid\Rest\Apis;


use Doctrine\Common\Annotations\AnnotationRegistry;
use Genetsis\Druid\Rest\Resources\Entrypoint;
use Genetsis\Druid\Rest\Resources\HalResponse;
use Genetsis\Druid\Rest\Resources\Link;
use Genetsis\Druid\Rest\Resources\Page;
use Genetsis\Druid\Rest\Resources\Resource;
use Genetsis\Druid\Rest\Resources\ResourceInterface;
use JMS\Serializer\SerializerBuilder;
use Psr\Http\Message\StreamInterface;

class HalTransform
{

    const KEY_LINKS = '_links';
    const KEY_EMBEDDED = '_embedded';
    const LINK_SELF = 'self';
    const PAGE = 'page';

    const LINK_KEY_HREF = 'href';
    const LINK_KEY_TEMPLATED = 'templated';
    const LINK_KEY_NAME = 'name';
    const LINK_KEY_LANG = 'hreflang';
    const LINK_KEY_TITLE = 'title';

    const PAGE_SIZE = 'size';
    const PAGE_TOTAL = 'totalElements';
    const PAGE_PAGES = 'totalPages';
    const PAGE_NUMBER = 'number';

    protected $serializer;

    /**
     * @param string $class (resource call)
     * @param StreamInterface $response
     * @return HalResponse
     */
    public function transform(string $class, $response) {
        AnnotationRegistry::registerLoader('class_exists');
        $this->serializer = SerializerBuilder::create()->build();

        $hal_response = new HalResponse();
        $hal_response->setClass($class);

        $this->transformMetaData($hal_response, json_decode($response, true));

        return $hal_response;
    }

    /**
     * @param HalResponse $hal_response
     * @param array $response
     */
    protected function transformMetaData($hal_response, $response) {
        isset($response[self::KEY_LINKS]) && $this->transformLinks($hal_response, $response[self::KEY_LINKS]);
        isset($response[self::PAGE]) && $this->transformPage($hal_response, $response[self::PAGE]);
        isset($response[self::KEY_EMBEDDED]) && $this->transformEmbedded($hal_response, $response[self::KEY_EMBEDDED]);

        $hal_response->setData($this->doTransformEmbedded($hal_response->getClass(), $response));
    }

    /**
     * @param HalResponse $hal_response
     * @param $data
     */
    protected function transformEmbedded(HalResponse $hal_response, array $data) {
        foreach ($data as $key => $value) {
            $embeddeds = $this->doTransformEmbeddeds($key,$data);
            $hal_response->addResources($key, $embeddeds);
        }
    }

    protected function doTransformEmbeddeds(string $key, array $data)
    {
        $embeddeds = [];
        foreach ($data[$key] as $embedded) {
            $embeddeds[] = $this->doTransformEmbedded($key, $embedded);
        }

        return $embeddeds;
    }


    /**
     * @param array $data
     * @return ResourceInterface
     */
    protected function doTransformEmbedded(string $key, array $data){

        $jsonObject = $this->serializer->serialize($data, 'json');
        $resource = $this->serializer->deserialize($jsonObject, $this->getResourceClass($key),'json');
        if (isset($data[self::KEY_LINKS])) {
            $links = [];
            foreach ($data[self::KEY_LINKS] as $rel => $data) {
                $links[$rel] = new Link($rel, $data['href']);
            }
            $resource->setLinks($links);
        }

        return $resource;
    }


    /**
     * @param HalResponse $hal_response
     * @param array $pages
     */
    protected function transformPage($hal_response, $data) {
        $page_response = new Page();
        isset($data[self::PAGE_SIZE]) && $page_response->setSize($data[self::PAGE_SIZE]);
        isset($data[self::PAGE_TOTAL]) && $page_response->setTotalElements($data[self::PAGE_TOTAL]);
        isset($data[self::PAGE_PAGES]) && $page_response->setTotalPages($data[self::PAGE_PAGES]);
        isset($data[self::PAGE_NUMBER]) && $page_response->setNumber($data[self::PAGE_NUMBER]);

        $hal_response->setPage($page_response);
    }

    /**
     * @param HalResponse $hal_response
     * @param array $linksByRel
     */
    protected function transformLinks($hal_response, $linksByRel)
    {
        foreach ($linksByRel as $rel => $data) {
            if ($rel == self::LINK_SELF) {
                $this->transformSelfLink($hal_response, $data);
                continue;
            }
        }
    }

    /**
     * @param HalResponse $hal_response
     * @param array $data
     */
    protected function transformSelfLink($hal_response, array $data)
    {
        isset($data[self::LINK_KEY_HREF]) && $hal_response->setUri($data[self::LINK_KEY_HREF]);
        isset($data[self::LINK_KEY_TITLE]) && $hal_response->setTitle($data[self::LINK_KEY_TITLE]);
    }

    /**
     * Gets the fully qualified name for a resource.
     *
     * @param string $resource
     * @return string
     * @throws \BadMethodCallException
     */
    protected function getResourceClass(string $resource)
    {
        if (empty(Resource::availableResources[$resource])) {
            throw new \BadMethodCallException('Resource ' . $resource . ' not defined');
        } else {
            return 'Genetsis\\Druid\\Rest\\Resources\\' . Resource::availableResources[$resource];
        }
    }
}
