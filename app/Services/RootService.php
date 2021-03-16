<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;

class RootService
{
    public $homeService = null;


    public function getHomeService()
    {
        if ($this->homeService == null) {
            $this->homeService = new HomeService();
        }
        return $this->homeService;
    }

}
