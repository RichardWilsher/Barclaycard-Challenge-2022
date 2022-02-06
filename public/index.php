<?php

    require '../autoload.php';

    $routes = new \barclaycard\Routes();

    $entryPoint = new \tools\EntryPoint($routes);

    $entryPoint->run();
