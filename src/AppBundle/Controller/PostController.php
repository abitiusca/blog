<?php
// src/Blog/AppBundle/Controller/BlogController.php
namespace AppBundle\Controller;

//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\TblPosts;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\TblPostsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//use AppBundle\Repository\TblPostsRepository;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Bundle\TwigBundle\Node\RenderNode;
//use AppBundle\Repository\TblPostsRepository;
//use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class PostController extends Controller
{

    public function indexAction()
    {
        
//        $posts = $this->getDoctrine()
//            ->getRepository('AppBundle:TblPosts')
//            ->findAll();
        
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:TblPosts')
            ->findAll();
                
        return $this->render('post/index.html.twig', array('posts' => $posts));
    }

    public function newAction(Request $request)
    {
//        $securityContext = $this->container->get('security.context');
//        if(!$securityContext->isGranted('ROLE_ADMIN')){
//            throw new AccessDeniedException('Only an user ca do this');
//        }
        $entity = new TblPostsType();
        
        $form = $this->createForm($entity);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $newPost = $form->getData();
            $newPost->setCreatedBy($this->get('security.context')->getToken()->getUser()->getUsername());
            $newPost->setCreatedDate(new \DateTime());
            $newPost->setUpdatedDate(new \DateTime());

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

        $entity = $em->getRepository('AppBundle:TblPosts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Post entity.');
        }
        
        $entityForm = new TblPostsType();
        
        $editForm = $this->createForm($entityForm);
        $editForm->setData($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $editForm->getData()->setUpdatedDate(new \DateTime());
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
    
}
