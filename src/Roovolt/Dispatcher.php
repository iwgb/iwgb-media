<?php

namespace Iwgb\Internal\Roovolt;

use Iwgb\Internal\AbstractDispatcher;
use Iwgb\Internal\CorsPreflight;
use Siler\Route as http;

class Dispatcher extends AbstractDispatcher {

    public function __invoke(): void {
        http\post('/roovolt/api/getInvoiceUploadUrls', $this->handle(Handler\GetInvoiceUploadUrls::class));
        http\post('/roovolt/api/saveInvoiceData', $this->handle(Handler\SaveInvoiceData::class));
        http\get('/roovolt/invoice', $this->handle(Handler\RetrieveInvoice::class));

        http\options('/roovolt/api/.*', $this->handle(CorsPreflight::class));
    }
}