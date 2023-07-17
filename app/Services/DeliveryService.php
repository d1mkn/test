<?php

namespace App\Services;

interface DeliveryService
{
    public function send(array $packageData, array $recipientData): array;
}