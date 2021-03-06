<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 01/07/2015
 * Time: 05:43 PM
 */

namespace Sistema\ColegioBundle\Security\Authentication\Token;

use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

class JWTUserToken extends AbstractToken
{


    protected $rawToken;


    public function __construct(array $roles = array())
    {

        parent::__construct($roles);
//        var_dump($roles);
        // If the user has roles, consider it authenticated
        $this->setAuthenticated(count($roles) === 0);
    }

    /**
     * {@inheritdoc}
     */
    public function getCredentials()
    {
        return $this->rawToken;
    }

    /**
     * @param string $rawToken
     */
    public function setRawToken($rawToken)
    {
        $this->rawToken = $rawToken;
    }
}