<?php
// app/Controllers/HomeController.php

class HomeController
{
    public function index()
    {
        // Aquí puedes definir la lógica para la página de inicio
        // Por ejemplo, puedes cargar una vista
        require_once __DIR__ . '/../Views/home.php';
    }
}
