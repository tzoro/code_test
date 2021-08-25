<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class GitHubHttpRepoFetcher
{

  public function fetch( string $user, string $repo ): array
  {
    $client = HttpClient::create();

    $response = $client->request('GET', 'https://api.github.com/repos/' . $user . '/' . $repo . '/issues', [
      'auth_basic' => ['tzoro', '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'],
    ])->toArray();

    return $response;
  }

}
