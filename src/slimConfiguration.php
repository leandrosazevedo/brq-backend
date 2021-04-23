<?php

namespace src;

function slimConfiguration(): \Slim\Container {
    $configuration = [
        'settings' => [
            'displayErrorDetails' => DISPLAY_ERRORS_DETAILS,
        ],
    ];
    return new \Slim\Container($configuration);
}