<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Models\Package;

class NovaPoshtaDeliveryService implements DeliveryService
{
    public function send(array $packageData, array $recipientData): array
    {
        $requestData = [
            'customer_name' => $recipientData['customer_name'],
            'phone_number' => $recipientData['phone_number'],
            'email' => $recipientData['email'],
            'sender_address' => config('app.sender_address'),
            'delivery_address' => $recipientData['delivery_address'],
        ];
        $combinedData = array_merge($requestData, $packageData);

        try {
            // $client = new Client();

            // $response = $client->post('https://novaposhta.test/api/delivery', [
            //     'json' => $requestData,
            // ]);

            // if ($response->getStatusCode() !== 200) {
            //     throw new RequestException('The request failed.');
            // }

            // $data = json_decode($response->getBody(), true);

            // Package::create($data);

            return [
                'success' => true,
                'data' => $combinedData,
            ];
        } catch (RequestException $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
}