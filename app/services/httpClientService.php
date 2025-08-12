<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class HttpClientService
{
    /**
     * Realiza una petición GET.
     *
     * @param string $url
     * @param array $queryParams (opcional)
     * @param array $headers (opcional)
     * @return \Illuminate\Http\Client\Response
     */
    public function get(string $url, array $queryParams = [], array $headers = [])
    {
        return Http::withHeaders($headers)->get($url, $queryParams);
    }

    /**
     * Realiza una petición POST.
     *
     * @param string $url
     * @param array $data (opcional)
     * @param array $headers (opcional)
     * @return \Illuminate\Http\Client\Response
     */
    public function post(string $url, array $data = [], array $headers = [])
    {
        return Http::withHeaders($headers)->post($url, $data);
    }
}
