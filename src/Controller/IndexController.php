<?php

namespace App\Controller;

use App\Service\BingService;
use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    const API_KEY = 'cb4d6c8c2af947dea69bb263cf6cff7d';

    /**
     * @Route("", name="index")
     */
    public function index()
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * @Route("/search", name="search", methods={"POST"})
     *
     * @param Request $request
     * @param BingService $bingService
     *
     * @return JsonResponse
     */
    public function search(Request $request, BingService $bingService)
    {
        $query = json_decode($request->getContent(), true);
        $tags = array_key_exists('tags', $query) ? $query['tags'] : [];

        $urls = $bingService->searchAll($tags);

        return new JsonResponse(['images' => $urls]);
    }
}
