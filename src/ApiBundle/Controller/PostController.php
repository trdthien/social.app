<?php
/**
 * Created by PhpStorm.
 * User: terry
 * Date: 10/30/2015
 * Time: 2:02 PM
 */

namespace ApiBundle\Controller;

use AppBundle\Document\Post;
use AppBundle\Form\PostType;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormTypeInterface;

class PostController extends FOSRestController
{
    public function getAction ()
    {
        return array('post' => 'test');
    }

    public function createAction (Request $request)
    {
        $post = new Post();

        $form = $this->createForm(new PostType(), $post);

        $form->handleRequest($request);

        if($form->isValid())
        {
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->persist($post);
            $dm->flush();

            return $this->redirectToRoute('api_post_list');
        }

        return array(
            'form' => $form
        );
    }

    public function listAction ()
    {
        $repository = $this->get('doctrine_mongodb')
            ->getManager()
            ->getRepository('AppBundle:Post');

        // find *all* posts
        $posts = $repository->findAll();

        return array(
            'posts' => $posts
        );
    }

}