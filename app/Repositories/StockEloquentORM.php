<?php

namespace App\Repositories;

use App\DTO\CreateOptionalDTO;
use App\DTO\CreateVehicleDTO;
use App\Models\Optional;
use App\Models\Vehicle;
use App\Repositories\PaginationInterface;
use stdClass;

class StockEloquentORM implements StockRepositoryInterface
{
    public function __construct(protected Vehicle $vehicle, protected Optional $optional)
    {

    }

    public function getAll($filter = null, string $ordenation = 'date', string $sense = 'asc'): array
    {
        $result = Vehicle::select('*');

        if ($filter) {
            $dataFilter = $filter;
            if (preg_match("/\b{$filter}\b/", "/")) {
                $dataFilter = explode("/", $filter);
                $dataFilter = $dataFilter[2]."-".$dataFilter[1]."-".$dataFilter[0];
            }

            $result = $result->whereRaw("
                vehicles.brand like '%".$filter."%'
                OR vehicles.model like '%".$filter."%'
                OR vehicles.year like '%".$filter."%'
                OR vehicles.fuel like '%".$filter."%'
                OR vehicles.price like '%".$filter."%'
                OR vehicles.kilometer like '%".$filter."%'
                OR vehicles.synced_at like '%".$dataFilter."%'
                OR vehicles.supplier like '%".$filter."%'
            ");
        }

        $result = $result->orderBy($ordenation, $sense);

        return $result->get()->toArray();
    }

    public function create(CreateVehicleDTO $vehicleDTO, CreateOptionalDTO $optionalDTO): stdClass|null
    {
        if(!$vehicleEntiy = Vehicle::where('synced_id', $vehicleDTO->synced_id)->first()) {
            $vehicleEntiy = $this->vehicle->create((array) $vehicleDTO);
        }
        else {
            $vehicleEntiy->update((array) $vehicleDTO);
        }
        if($optionalDTO->optionals) {
            $vehicleEntiy->optionals()->sync($optionalDTO->optionals);
        }
        return (object) $vehicleEntiy->toArray();
    }

    public function createMany(CreateVehicleDTO $vehicleDTO, CreateOptionalDTO $optionalDTO): stdClass|null
    {
        // dd((array) $vehicleDTO);
        $vehicleEntiy = $this->vehicle->create((array) $vehicleDTO);
        if($optionalDTO->optionals) {
            dd($optionalDTO->optionals);
            $vehicleEntiy->optionals()->save($this->optional->create((array) $optionalDTO));
        }
        return (object) $vehicleEntiy->toArray();
    }

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null, string $ordenation = 'date', string $sense = 'asc'): PaginationInterface
    {
        $result = Vehicle::select('*');

        if ($filter) {
            $dataFilter = $filter;
            if (preg_match("/\b{$filter}\b/", "/")) {
                $dataFilter = explode("/", $filter);
                $dataFilter = $dataFilter[2]."-".$dataFilter[1]."-".$dataFilter[0];
            }

            $result = $result->whereRaw("
                vehicles.brand like '%".$filter."%'
                OR vehicles.model like '%".$filter."%'
                OR vehicles.year like '%".$filter."%'
                OR vehicles.fuel like '%".$filter."%'
                OR vehicles.price like '%".$filter."%'
                OR vehicles.kilometer like '%".$filter."%'
                OR vehicles.synced_at like '%".$dataFilter."%'
                OR vehicles.supplier like '%".$filter."%'
            ");
        }

        $result = $result->orderBy($ordenation, $sense)->paginate($totalPerPage, ['*'], "page", $page);

        return new PaginationPresenter($result);
    }

    public function export(): array
    {
        return Vehicle::select('*')->get()->toArray();
    }
}
