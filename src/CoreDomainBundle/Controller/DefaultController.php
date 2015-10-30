<?php

namespace CoreDomainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CoreDomainBundle:Default:index.html.twig', array('name' => $name));
    }
}
