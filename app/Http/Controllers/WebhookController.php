<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class WebhookController extends Controller
{
    private $url = "https://webhook.site/f6202592-43ba-494f-b8fd-367982adeacb";

    public function handle(Request $request)
    {
        //Log::info('Dados recebidos do webhook:', $request->all());

        $data = $request->all();
        $response = $this->sendRequest($this->url, 'POST', $data);

        return response()->json(['message' => 'Webhook recebido com sucesso!', "req" => $response], 200);
    }

    /**
     * @throws GuzzleException
     */
    public function sendRequest($url, $method = 'GET', $data = [], $headers = []): string
    {
        $client = new Client();

        $options = [
            'headers' => $headers,
        ];

        if ($method == 'POST' && !empty($data)) {
            $options['form_params'] = $data;
        } elseif (!empty($data)) {
            $options['query'] = $data;
        }

        $response = $client->request($method, $url, $options);

        return $response->getBody()->getContents();
    }
}
