<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Service\SeoService;

class BaseController extends Controller
{
    public $service;

    public function __construct(SeoService $service)
    {
        $this->service = $service;
    }
}
