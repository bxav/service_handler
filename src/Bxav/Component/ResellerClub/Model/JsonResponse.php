<?php
namespace Bxav\Component\ResellerClub\Model;

class JsonResponse implements Response
{

    private $response = [];

    public function __construct($json)
    {
        $response = json_decode($json, true);
        if (is_scalar($response)) {
            $this->response[0] = $response;
        } else {
            $this->response = $response;
        }
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->response[] = $value;
        } else {
            $this->response[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->response[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->response[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->response[$offset]) ? $this->response[$offset] : null;
    }
}
