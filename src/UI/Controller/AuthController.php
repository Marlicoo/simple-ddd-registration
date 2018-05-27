<?php

namespace App\UI\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AuthController extends Controller
{
    /**
     * @Route("/register", name="register")
     * @Method("POST"))
     */
    public function login(Request $request)
    {
        return new JsonResponse('Hello world!');
    }
}
