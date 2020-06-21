<?php

namespace App\Service;

class GitHubService extends GitAdapterService
{
    private $apiUri;

    public function __construct(string $apiUri)
    {
        $this->apiUri = $apiUri;
    }

    public function execute(): string
    {
        $result = exec("git ls-remote " . $this->apiUri . "/" . $this->repository . " refs/heads/" . $this->branch);
        return str_replace("	refs/heads/master", "", $result);
    }
}