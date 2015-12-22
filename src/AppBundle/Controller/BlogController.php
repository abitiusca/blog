<?php
// src/Blog/AppBundle/Controller/BlogController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{

    public function menuBlogAction()
    {        
        return $this->render('blog/menu.html.twig');
    }
    
    public function aboutAction()
    {        
        return $this->render('blog/about.html.twig');
    }
    
    public function contactAction()
    {        
        return $this->render('::blog\contact.html.twig');
    }
    
}
