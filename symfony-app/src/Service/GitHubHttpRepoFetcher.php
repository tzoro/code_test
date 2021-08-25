<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class GitHubHttpRepoFetcher
{

  public function fetch( string $user, string $repo ): array
  {
    $client = HttpClient::create();
    $token = $this->getParameter('GITHUB_TOKEN');

    $response = $client->request('GET', 'https://api.github.com/repos/' . $user . '/' . $repo . '/issues', [
      'auth_basic' => ['tzoro', $token],
    ])->toArray();

    return $response;
  }

}
