<?php
namespace src\Controller;
class MapController extends AbstractController {

    public function index(){
        return $this->twig->render("map/mapView.html.twig");
    }
}