<?php
// src/Blog/AppBundle/Controller/BlogController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\TwigBundle\Node\RenderNode;
use AppBundle\Repository\TblPostsRepository;
use AppBundle\Entity\TblPosts;

class PostController extends Controller
{

    public function indexAction()
    {
        
        $posts = $this->getDoctrine()
            ->getRepository('AppBundle:TblPosts')
            ->findAll();
                
        return $this->render('post/index.html.twig', array('posts' => $posts));
    }

    public function newAction()
    {
        return $this->render('post/new.html.twig');
    }
    
}
