<?php

namespace App\Application\Listener\UserRegister;


use App\Application\Exception\UserRegister\ValidationException;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ValidationFailure
{
    /** @var  SerializerInterface */
    private $serializer;

    /**
     * ValidationFailure constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event): void
    {
        $exception = $event->getException();

        if (!$exception instanceof ValidationException) {
            return;
        }

        $responseData = $this->serializer->serialize($exception->getErrors(), 'json');

        $event->setResponse(new JsonResponse($responseData, JsonResponse::HTTP_UNPROCESSABLE_ENTITY, [], true));
    }
}

