<?php

namespace App\Services;

class DeliveryServiceFactory
{
    public static function create($serviceName): DeliveryService
    {
        switch ($serviceName) {
            case 'NovaPoshta':
                return new NovaPoshtaDeliveryService();
            // Here we can add new delivery services and create new implementation classes for them:
            // case 'UkrPoshta':
            //     return new UkrPoshtaDeliveryService();
            // case 'Justin':
            //     return new JustinDeliveryService();
            default:
                throw new \InvalidArgumentException('Invalid delivery service');
        }
    }
}