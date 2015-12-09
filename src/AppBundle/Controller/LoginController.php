<?php
// src/User/AppBundle/Controller/UserController.php
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
//        return new Response('Login page !');
//        return $this->render('AppBundle:user:login.html.twig');
                        
        // load sec
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        
//        $request = $this->getRequest();
//        $session = $request->getSession();
//        
//        //get the login error if there is one
//        if( $request->attributes->has( SecurityContext::AUTHENTICATION_ERROR )){
//            $test = 1;
//            $error = $request->attributes->get( SecurityContext::AUTHENTICATION_ERROR );
//        }else{
//            $error = $session->get( SecurityContext::AUTHENTICATION_ERROR );
//            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
//        }

        return $this->render('user/login.html.twig' ,array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
    
    public function loginCheckAction(){
        return new Response('Login page !');
//        return $this->render('AppBundle:user:login.html.twig');
    }
    
    public function logoutAction(){
        return new Response('Login page !');        
    }
}
