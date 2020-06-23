<?php

namespace App\Service;

class GitHubService extends GitAdapterService
{
    protected $apiUri;

    public function __construct(string $apiUri)
    {
        $this->apiUri = $apiUri;
    }
}