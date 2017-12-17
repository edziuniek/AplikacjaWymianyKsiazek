<?php

namespace FrontendBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends Controller
{
    /**
     * @Route("/", name="pages_home")
     */
    public function homeAction(Request $request)
    {
        return $this->render('@Frontend/pages/home.html.twig');
    }
}
