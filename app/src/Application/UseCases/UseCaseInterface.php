<?php

namespace App\Application\UseCases;

use App\Interface\Dto\Request\UserRequestDto;

interface UseCaseInterface
{
    public function handle(UserRequestDto $userRequestDto);
}