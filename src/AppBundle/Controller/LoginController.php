<?php
// src/User/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\TwigBundle\Node\RenderNode;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class LoginController extends Controller{
    
    public function loginAction(){
                        
        // load sec
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/login.html.twig' ,array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
    
    public function loginCheckAction(){
        
    }
    
    public function logoutAction(){
        
    }
}
