<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        $template = 'default/index.html.twig';
        $args = [
        ];
        return $this->render($template, $args);
    }

    /**
     * @Route("/pinkblue", name="pinkblue")
     */
    public function pinkBlue()
    {
        // create colors array
        $colors = [
            'foreground' => 'blue',
            'background' => 'pink'
        ];

        // store colours in session 'colours'
        $session = new Session();
        $session->set('colors', $colors);

        return $this->redirectToRoute('default');
    }


    /**
     * @Route("/default", name="default_colors")
     */
    public function defaultColors()
    {
        // store colours in session 'colours'
        $session = new Session();
        $session->clear();

        return $this->redirectToRoute('default');
    }
}
