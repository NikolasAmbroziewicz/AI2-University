<?php

namespace App\Controller;

use App\Entity\Location;
use App\Repository\WeatherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    #[Route('/weather/{id}', name: 'app_weather', requirements: ["id" => '\d+'])]
    public function index(Location $location, WeatherRepository $repository): Response
    {
        $measurements = $repository->findByLocation($location);

        return $this->render('weather/index.html.twig', [
            'location' => $location,
            'weathers' => $measurements,
        ]);
    }
}
