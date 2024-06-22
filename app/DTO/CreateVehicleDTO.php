<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateStockRequest;
use SimpleXMLElement;

class CreateVehicleDTO
{
    public function __construct(
        public string $brand,
        public string $model,
        public int $year,
        public string $version,
        public string $color,
        public int $kilometer,
        public string|null $fuel,
        public string $transmission,
        public int|null $door,
        public float $price,
        public string|null $synced_at,
        public int|null $synced_id,
        public string|null $supplier,
    )
    { }

    public static function makeFromRequest(StoreUpdateStockRequest $request): self
    {
        return new self(
            $request->brand,
            $request->model,
            $request->year,
            $request->version,
            $request->color,
            $request->kilometer,
            $request->fuel,
            $request->transmission,
            $request->door,
            $request->price,
            $request->synced_at ?? now()->toDateTimeString(),
            $request->synced_id ?? null,
            $request->supplier ?? 'Particular',
        );
    }

    public static function makeFromXML(array $request): self
    {
        return new self(
            $brand = $request['marca'],
            $model = $request['modelo'],
            $year = $request['ano'],
            $version = $request['versao'],
            $color = $request['cor'],
            $kilometer = $request['quilometragem'],
            $fuel = $request['tipoCombustivel'] ?? null,
            $transmission = $request['cambio'],
            $door = $request['portas'],
            $price = $request['precoVenda'],
            $synced_at = $request['ultimaAtualizacao'],
            $synced_id = $request['codigoVeiculo'],
            $supplier = 'Revenda Mais',
        );
    }

    public static function makeFromJSON(array $request): self
    {
        return new self(
            $brand = $request['marca'],
            $model = $request['modelo'],
            $year = $request['ano'],
            $version = $request['versao'],
            $color = $request['cor'],
            $kilometer = $request['km'],
            $fuel = $request['combustivel'] ?? null,
            $transmission = $request['cambio'],
            $door = $request['portas'],
            $price = $request['preco'],
            $synced_at = $request['date'],
            $synced_id = $request['id'],
            $supplier = 'Web Motors',
        );
    }
}
