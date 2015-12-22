<?php
// src/Blog/AppBundle/Controller/PostController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\TblPosts;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\TblPostsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PostController extends Controller
{

    public function indexAction()
    {
        $posts = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:TblPosts')
            ->getPosts(10);
                
        return $this->render('post/index.html.twig', array('posts' => $posts));
    }

    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:TblPosts')->findPost($id);
                
        return $this->render('post/view.html.twig', array('post' => $post));
    }

    public function newAction(Request $request)
    {
        $entity = new TblPostsType();        
        $form = $this->createForm($entity);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $newPost = $form->getData();
            $newPost->setCreatedBy($this->get('security.context')->getToken()->getUser());
            $newPost->setCreatedDate(0);
            $newPost->setUpdatedDate(0);

            $em = $this->getDoctrine()->getManager();
            $em->persist($newPost);
            $em->flush();
            
            $this->addFlash(
                'notice',
                'Success !'
            );
            return $this->redirect($this->generateUrl('index'));
        }
        
        return $this->render('post/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TblPosts')->findPost($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Post entity.');
        }
        
        $entityForm = new TblPostsType();
        
        $editForm = $this->createForm($entityForm);
        $editForm->setData($entity);
        $editForm->handleRequest($request);
        
        if ($editForm->isValid()) {
            $editForm->getData()->setUpdatedDate(0);
            $em->flush();
        
            $this->addFlash(
                'notice',
                'Success !'
            );

            return $this->redirect($this->generateUrl('index'));
        }

        return $this->render('post/edit.html.twig', array(
            'entity'    => $entity,
            'form'      => $editForm->createView(),
        ));
    }

    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TblPosts')->findPost($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Post entity.');
        }else{
            $em->remove($entity);
            $em->flush();
        
            $this->addFlash(
                'notice',
                'Success !'
            );

            return $this->redirect($this->generateUrl('index'));
        }
        
        return $this->render('post/index.html.twig');
    }
    
}
