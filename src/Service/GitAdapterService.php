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
}