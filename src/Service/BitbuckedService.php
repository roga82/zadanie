<?php

namespace App\Service;

class BitbuckedService extends GitAdapterService
{
    protected $apiUri;

    public function __construct(string $apiUri)
    {
        $this->apiUri = $apiUri;
    }
}