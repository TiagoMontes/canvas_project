<?php

namespace App\Interface\Controller\Api;

use App\Application\UseCases\User\CreateUser;
use App\Application\UseCases\UserUseCases;
use App\Interface\Dto\Request\UserRequestDto;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/user', name: 'user_')]
class UserController extends ApiController
{
    public function __construct(
        private readonly CreateUser $createUser
    )
    {
    }

    #[Route('/', name: 'create', methods: ['POST'])]
    public function createUser(UserRequestDto $userRequestDto): Response
    {
        try {
            $user = $this->createUser->handle($userRequestDto);

            return $this->respondWithSuccess($user->jsonSerialize(), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->respondWithException($exception);
        }
    }
}