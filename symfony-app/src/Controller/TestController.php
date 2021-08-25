<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
      $t_count = (float) 0;
      $p_count = (float) 0;
      $n_count = (float) 0;
      $p_score = (float) 0;
      $n_score = (float) 0;
      $t_score = (float) 0;
      $diff    = (float) 0;

      $client = HttpClient::create();

      $response = $client->request('GET', 'https://api.github.com/repos/tzoro/code_test/issues', [
          'auth_basic' => ['tzoro', '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'],
      ])->toArray();

      foreach ($response as $key => $value) {

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

      return $this->render('test/index.html.twig', [
          'controller_name' => 'TestController',
      ]);
    }
}
