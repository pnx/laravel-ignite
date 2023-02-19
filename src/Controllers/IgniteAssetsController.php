<?php

namespace Ignite\Controllers;

class IgniteAssetsController
{
    public function jsSource()
    {
        return response()
            ->file(__DIR__ . '/../../dist/ignite.js', ['Content-Type' => 'text/javascript'])
            ->setCharset('UTF-8');
    }
}