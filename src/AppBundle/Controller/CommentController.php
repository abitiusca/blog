<?php
// src/Blog/AppBundle/Controller/CommentController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Bundle\TwigBundle\Node\RenderNode;
use AppBundle\Entity\TblComments;
use AppBundle\Form\TblCommentsType;

class CommentController extends Controller
{
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $comments = $em->getRepository("AppBundle:TblComments")->getComments();
        return $this->render('comment/index.html.twig', array('comments' => $comments));
    }

    public function newAction(Request $request, $post_id)
    {
        $entity = new TblCommentsType();
        $form = $this->createForm($entity);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $newComment = $form->getData();
            $newComment->setCreatedBy($this->get('security.context')->getToken()->getUser()->getUsername());
            $newComment->setCreatedDate(0);
            $newComment->setUpdatedDate(0);
            
            $em = $this->getDoctrine()->getManager();
            $entityPost = $em->getRepository('AppBundle:TblPosts')->findComment($post_id);

            if (!$entityPost) {
                throw $this->createNotFoundException('Unable to find Post entity.');
            }            
            $newComment->setTblPosts($entityPost);

            $em->persist($newComment);
            $em->flush();
            
            $this->addFlash(
                'notice',
                'Success !'
            );
            return $this->redirect($this->generateUrl('view_comments'));
        }
        
        return $this->render('comment/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TblComments')->findComment($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }
        
        $entityForm = new TblCommentsType();
        
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

            return $this->redirect($this->generateUrl('view_comments'));
        }

        return $this->render('comment/edit.html.twig', array(
            'entity'    => $entity,
            'form'      => $editForm->createView(),
        ));
    }
    
}
