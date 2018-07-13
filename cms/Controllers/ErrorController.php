<?php

namespace Cms\Controllers;

use \Core\Controller;

class ErrorController extends Controller
{
    public function notFound()
    {
        echo '<h1>404 - Not Found</h1>';
    }

}