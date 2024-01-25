<?php

namespace App\Application\UseCases\User;

use App\Application\UseCases\UseCaseInterface;
use App\Domain\Entity\User;
use App\Domain\Factory\UserFactory;
use App\Interface\Dto\Request\UserRequestDto;
use App\Repository\UserRepository;

readonly class CreateUser implements UseCaseInterface
{
    public function __construct(
        private UserFactory    $userFactory,
        private UserRepository $userRepository
    )
    {
    }
    public function handle(UserRequestDto $userRequestDto): User
    {
        $user = $this->userFactory->createUserFactory($userRequestDto);

        $this->userRepository->save($user, true);

        return $user;
    }
}