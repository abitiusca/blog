<?php
// src/Blog/AppBundle/Controller/BlogController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\TwigBundle\Node\RenderNode;

class BlogController extends Controller
{

    public function indexAction()
    {
        return $this->render('blog/index.html.twig');
    }

    public function newAction()
    {
        return $this->render('blog/new.html.twig');
    }
    
}
