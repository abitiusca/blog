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

class CommentController extends Controller
{

    public function indexAction()
    {
        
        $posts = $this->getDoctrine()
            ->getRepository('AppBundle:TblPosts')
            ->findAll();
                
        return $this->render('comment/index.html.twig', array('posts' => $posts));
    }

    public function newAction()
    {
        return $this->render('comment/new.html.twig');
    }
    
}
