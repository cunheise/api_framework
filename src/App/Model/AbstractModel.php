<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/5
 * Time: 18:03
 */

namespace Api\Model;

/**
 * Class AbstractObject
 * @package Api\Model
 */
abstract class AbstractModel
{
    /**
     * @var string $url
     */
    protected $url;
    /**
     * @var array $data
     */
    protected $data = [];

    /**
     * AbstractObject constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            $methodName = 'set' . $this->convertName($key);
            if (method_exists($this, $methodName)) {
                $this->{$methodName}($value);
            } else {
                $this->data[$key] = $value;
            }
        }
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $methodName = 'get' . $this->convertName($name);
        if (method_exists($this, $methodName)) {
            return $this->{$methodName}();
        }
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return mixed
     */
    public function __set($name, $value)
    {
        $methodName = 'set' . $this->convertName($name);
        if (method_exists($this, $methodName)) {
            return $this->{$methodName}($value);
        }
        if (array_key_exists($name, $this->data)) {
            $this->data[$name] = $value;
        }
    }

    /**
     * @param string $name
     * @return string
     */
    protected function convertName($name)
    {
        return implode('', array_map('ucfirst', explode('_', $name)));
    }

    /**
     * @param $name
     * @return string
     */
    protected function revertName($name)
    {
        return strtolower(str_replace('get_', '', preg_replace("/([A-Z])/", "_$0", $name)));
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param array $keys
     * @return array
     */
    public function toArray(array $keys)
    {
        $data = [];
        foreach ($keys as $key) {
            $data[$key] = $this->{$key};
        }
        return $data;
    }
}