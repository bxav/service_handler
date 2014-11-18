<?php
namespace Bxav\Bundle\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;

class User extends BaseUser
{

    protected $id;
    
    protected $apiToken = null;

    public function __construct()
    {
        parent::__construct();
        $this->generateApiToken();
    }
    
    public function hasApiToken()
    {
        return ! is_null($this->apiToken);
    }
    
    public function generateApiToken()
    {
        $this->apiToken = md5("uniq_".uniqid());
    }
    
    public function getApiToken()
    {
        return $this->apiToken;
    }
}