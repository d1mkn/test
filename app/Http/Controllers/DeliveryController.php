<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DeliveryServiceFactory;

class DeliveryController extends Controller
{
    public function send(Request $request, $serviceName)
    {
        $packageData = $request->only(['width', 'height', 'length', 'weight']);
        $recipientData = $request->only(['customer_name', 'phone_number', 'email', 'delivery_address']);

        $deliveryService = DeliveryServiceFactory::create($serviceName);

        $response = $deliveryService->send($packageData, $recipientData);

        if ($response['success']) {
            return response()->json(['message' => 'Delivery data successfully sent to ' . $serviceName]);
        } else {
            return response()->json(['error' => 'An error occurred while sending data to ' . $serviceName], 500);
        }
    }
}