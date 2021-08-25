<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpClient\HttpClient;
use App\Service\GitHubHttpRepoFetcher;
use App\Entity\Repofetch;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(GitHubHttpRepoFetcher $fetcher): JsonResponse
    {
      $request = Request::createFromGlobals();
      $term = $request->query->get('term');

      if(is_null($term)) {
        $response = new JsonResponse();
        $response->setData([
          'status' => 400,
          'term'  => '',
          'score' => 0
        ]);

        return $response;
      }

      $t_count = (float) 0;
      $p_count = (float) 0;
      $n_count = (float) 0;
      $p_score = (float) 0;
      $n_score = (float) 0;
      $t_score = (float) 0;
      $diff    = (float) 0;

      $result = $fetcher->fetch('tzoro', 'code_test');

      foreach ($result as $key => $value) {

        if (str_contains($value['title'], 'rocks')) {
          $p_count++;
        } elseif (str_contains($value['title'], 'sucks')) {
          $n_count++;
        }

        $t_count++;
      }

      $p_score = $p_count > 0 ? $p_count / $t_count : 0;
      $n_score = $n_count > 0 ? $n_count / $t_count : 0;

      if ($n_score > 0) {

        $diff = $p_score - $n_score;
        $t_score = $diff / $p_score;

      }

      $entityManager = $this->getDoctrine()->getManager();
      $repo = new Repofetch();
      $repo->setUName('tzoro');
      $repo->setURepo('code_test');
      $repo->setTScore($t_score);
      $entityManager->persist($repo);
      $entityManager->flush();

      $response = new JsonResponse();
      $response->setData([
          'term'  => 'query',
          'score' => $t_score
      ]);

      return $response;

    }
}
