<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 */

namespace Sistema\ColegioBundle\Security\Authentication\Provider;


use Symfony\Component\Security\Core\Authentication\Provider\AuthenticationProviderInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\NonceExpiredException;
use Sistema\ColegioBundle\Security\Authentication\Token\JWTUserToken;
use Symfony\Component\Security\Core\Util\StringUtils;

class JWTProvider implements AuthenticationProviderInterface
{

    private $userProvider;
    private $cacheDir;

    public function __construct(UserProviderInterface $userProvider, $cacheDir) {
        $this->userProvider = $userProvider;
        $this->cacheDir = $cacheDir;
    }


    /**
     * Checks whether this provider supports the given token.
     *
     * @param TokenInterface $token A TokenInterface instance
     *
     * @return bool true if the implementation supports the Token, false otherwise
     */
    public function supports(TokenInterface $token)
    {
        // TODO: Implement supports() method.
    }

    public function authenticate(TokenInterface $token)
    {
        var_dump($token);
        if (!($payload = $this->jwtManager->decode($token))) {
            throw new AuthenticationException('Invalid JWT Token');
        }
        $user = $this->getUserFromPayload($payload);
        $authToken = new JWTUserToken($user->getRoles());
        $authToken->setUser($user);
        $authToken->setRawToken($token->getCredentials());
        $event = new JWTAuthenticatedEvent($payload, $authToken);
        $this->dispatcher->dispatch(Events::JWT_AUTHENTICATED, $event);
        return $authToken;
        // TODO: Implement authenticate() method.
    }
}