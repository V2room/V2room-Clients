<?php

namespace App\Services\DataCollector;

use App\Services\DataCollector\Contracts\SelectNodeContract;

class SelectNodeCallback implements SelectNodeContract
{
    public function __construct(
        private FeedRepository $feedRepository,
        private UserRepository $userRepository,
    ) {}

    public function select(string $title, string $category, string $writer, string $uri): bool
    {
        $user = $this->userRepository->getCsUser();
        $this->feedRepository->store([
            'title' => $title,
            'user_id' => $user->getKey(),
        ]);
        dump($title, $category, $writer, $uri);
        return true;
    }
}