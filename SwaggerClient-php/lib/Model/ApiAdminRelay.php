<?php
/**
 * ApiAdminRelay
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * AzuraCast
 *
 * AzuraCast is a standalone, turnkey web radio management tool. Radio stations hosted by AzuraCast expose a public API for viewing now playing data, making requests and more.
 *
 * OpenAPI spec version: 0.17.4
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.36
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * ApiAdminRelay Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ApiAdminRelay implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Api_Admin_Relay';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
'name' => 'string',
'shortcode' => 'string',
'description' => 'string',
'url' => 'string',
'genre' => 'string',
'type' => 'string',
'port' => 'int',
'relay_pw' => 'string',
'admin_pw' => 'string',
'mounts' => '\Swagger\Client\Model\ApiNowPlayingStationMount[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
'name' => null,
'shortcode' => null,
'description' => null,
'url' => null,
'genre' => null,
'type' => null,
'port' => null,
'relay_pw' => null,
'admin_pw' => null,
'mounts' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
'name' => 'name',
'shortcode' => 'shortcode',
'description' => 'description',
'url' => 'url',
'genre' => 'genre',
'type' => 'type',
'port' => 'port',
'relay_pw' => 'relay_pw',
'admin_pw' => 'admin_pw',
'mounts' => 'mounts'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
'name' => 'setName',
'shortcode' => 'setShortcode',
'description' => 'setDescription',
'url' => 'setUrl',
'genre' => 'setGenre',
'type' => 'setType',
'port' => 'setPort',
'relay_pw' => 'setRelayPw',
'admin_pw' => 'setAdminPw',
'mounts' => 'setMounts'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
'name' => 'getName',
'shortcode' => 'getShortcode',
'description' => 'getDescription',
'url' => 'getUrl',
'genre' => 'getGenre',
'type' => 'getType',
'port' => 'getPort',
'relay_pw' => 'getRelayPw',
'admin_pw' => 'getAdminPw',
'mounts' => 'getMounts'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['shortcode'] = isset($data['shortcode']) ? $data['shortcode'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['url'] = isset($data['url']) ? $data['url'] : null;
        $this->container['genre'] = isset($data['genre']) ? $data['genre'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['port'] = isset($data['port']) ? $data['port'] : null;
        $this->container['relay_pw'] = isset($data['relay_pw']) ? $data['relay_pw'] : null;
        $this->container['admin_pw'] = isset($data['admin_pw']) ? $data['admin_pw'] : null;
        $this->container['mounts'] = isset($data['mounts']) ? $data['mounts'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id Station ID
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Station name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets shortcode
     *
     * @return string
     */
    public function getShortcode()
    {
        return $this->container['shortcode'];
    }

    /**
     * Sets shortcode
     *
     * @param string $shortcode Station \"short code\", used for URL and folder paths
     *
     * @return $this
     */
    public function setShortcode($shortcode)
    {
        $this->container['shortcode'] = $shortcode;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description Station description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url Station homepage URL
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->container['genre'];
    }

    /**
     * Sets genre
     *
     * @param string $genre The genre of the station
     *
     * @return $this
     */
    public function setGenre($genre)
    {
        $this->container['genre'] = $genre;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type Which broadcasting software (frontend) the station uses
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets port
     *
     * @return int
     */
    public function getPort()
    {
        return $this->container['port'];
    }

    /**
     * Sets port
     *
     * @param int $port The port used by this station to serve its broadcasts.
     *
     * @return $this
     */
    public function setPort($port)
    {
        $this->container['port'] = $port;

        return $this;
    }

    /**
     * Gets relay_pw
     *
     * @return string
     */
    public function getRelayPw()
    {
        return $this->container['relay_pw'];
    }

    /**
     * Sets relay_pw
     *
     * @param string $relay_pw The relay password for the frontend (if applicable).
     *
     * @return $this
     */
    public function setRelayPw($relay_pw)
    {
        $this->container['relay_pw'] = $relay_pw;

        return $this;
    }

    /**
     * Gets admin_pw
     *
     * @return string
     */
    public function getAdminPw()
    {
        return $this->container['admin_pw'];
    }

    /**
     * Sets admin_pw
     *
     * @param string $admin_pw The administrator password for the frontend (if applicable).
     *
     * @return $this
     */
    public function setAdminPw($admin_pw)
    {
        $this->container['admin_pw'] = $admin_pw;

        return $this;
    }

    /**
     * Gets mounts
     *
     * @return \Swagger\Client\Model\ApiNowPlayingStationMount[]
     */
    public function getMounts()
    {
        return $this->container['mounts'];
    }

    /**
     * Sets mounts
     *
     * @param \Swagger\Client\Model\ApiNowPlayingStationMount[] $mounts *_/
     *
     * @return $this
     */
    public function setMounts($mounts)
    {
        $this->container['mounts'] = $mounts;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange] 
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange] 
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange] 
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange] 
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}