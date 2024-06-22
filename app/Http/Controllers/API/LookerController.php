<?php

namespace App\Http\Controllers\API;

use App\DTO\CreateOptionalDTO;
use App\DTO\CreateVehicleDTO;
use App\Jobs\ProcessStock;
use App\Services\StockService;

class LookerController
{
    public function __construct(private StockService $service)
    {
    }

    public function getXml()
    {
        $stocks = simplexml_load_file('documents/revendaMais.xml')->veiculos->veiculo;
        foreach ($stocks as $stock) {
            ProcessStock::dispatch($this->service->create(CreateVehicleDTO::makeFromXML((array) $stock), CreateOptionalDTO::makeFromXML((array) $stock->opcionais->opcional)));
        }
    }

    public function getJson()
    {
        $stocks = json_decode(file_get_contents('documents/webMotors.json'))->veiculos;
        foreach ($stocks as $stock) {
            ProcessStock::dispatch($this->service->create(CreateVehicleDTO::makeFromJSON((array) $stock), CreateOptionalDTO::makeFromJSON((array) $stock->opcionais)));
        }
    }
}
