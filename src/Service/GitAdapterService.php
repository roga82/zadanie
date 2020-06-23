<?php

namespace App\Service;

abstract class GitAdapterService
{
    protected $repository;
    protected $branch;

    public function setRepository(string $repository)
    {
        $this->repository = $repository;
    }

    public function setBranch(string $branch)
    {
        $this->branch = $branch;
    }

    protected function clearResult(string $string): string
    {
        return str_replace("	refs/heads/master", "", $string);
    }

    public function execute(): string
    {
        $result = exec("git ls-remote " . $this->apiUri . $this->repository . " refs/heads/" . $this->branch);
        if ($result) {
            return $this->clearResult($result);
        } else {
            return "branch doesn't exist";
        }
    }
}