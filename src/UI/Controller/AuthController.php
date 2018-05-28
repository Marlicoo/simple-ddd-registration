<?php

namespace App\UI\Controller;

use App\Application\User\RegisterCommand;
use League\Tactician\CommandBus;
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
     * @param CommandBus $commandBus
     * @param Request $request
     * @return JsonResponse
     */
    public function register(CommandBus $commandBus, Request $request): JsonResponse
    {
        $command = new RegisterCommand(
            (string)$request->request->get('email'),
            (string)$request->request->get('password'),
            (string)$request->request->get('repeated_password'),
            (string)$request->request->get('username')
        );
        $commandBus->handle($command);

        return new JsonResponse('register success', JsonResponse::HTTP_CREATED);
    }
}
