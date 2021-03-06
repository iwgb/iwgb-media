<?php

namespace Iwgb\Internal;

use Iwgb\Internal\Provider\Provider;
use Pimple\Container;
use Siler\Http\Request;
use Siler\Http\Response;

abstract class AbstractHandler {

    protected array $settings;

    public function __construct(Container $c) {
        $this->settings = $c[Provider::SETTINGS];
    }

    /**
     * @param array $args
     */
    abstract public function __invoke(array $args): void;

    protected static function withCors(): void {
        Response\header('access-control-allow-origin', Request\header('origin') ?? '*');
        Response\header('access-control-allow-credentials', 'true');
        Response\header('access-control-allow-headers', Request\header('access-control-request-headers') ?? 'authorization');
        Response\header('access-control-allow-methods', 'GET, POST, DELETE, OPTIONS');
    }
}