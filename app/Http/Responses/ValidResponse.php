<?php

namespace App\Http\Responses;

use Illuminate\Http\Response as HttpResponse;
use Illuminate\Contracts\Support\Responsable;

/**
 * Valid Response. Returns data along any of the 200s HTTP statuses code
 */
class ValidResponse implements Responsable
{
    protected $data;
    protected $status;
    protected $headers;

    /**
     * @param string[] $data
     * @param int $status
     * @param string[] $headers
     */
    public function __construct($data, $status = 200, $headers = [])
    {
        $this->data = $data;
        $this->status = $status;
        $this->headers = $headers;
    }

    /**
     * @inheritDoc
     */
    public function toResponse($request)
    {
        return new HttpResponse(json_encode(['data' => $this->data]), $this->status, $this->headers);
    }
}
