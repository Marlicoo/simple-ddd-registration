<?php

namespace App\UI\Controller;

use App\Application\UseCase\UserRegister\RegisterCommand;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;

class AuthController extends Controller
{
    /**
     * @Route("/api/register", name="api_register")
     * @Method("POST")
     *
     * @SWG\Response(
     *     response=201,
     *     description="Returns the register success message",
     * )
     * @SWG\Response(
     *     response=422,
     *     description="Returns when params validation failure",
     * )
     * @SWG\Parameter(
     *     name="register_user",
     *     in="body",
     *     @Model(type=RegisterCommand::class)
     * )
     * @SWG\Tag(name="/api/v1/register")

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
