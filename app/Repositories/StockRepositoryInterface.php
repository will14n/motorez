<?php

namespace App\Repositories;

use App\DTO\CreateOptionalDTO;
use App\DTO\CreateVehicleDTO;
use stdClass;

interface StockRepositoryInterface
{
    public function getAll($filter = null, string $ordenation = 'synced_at', string $sense = 'asc'): array;
    public function create(CreateVehicleDTO $vehicle, CreateOptionalDTO $optional): stdClass|null;
    public function createMany(CreateVehicleDTO $vehicle, CreateOptionalDTO $optional): stdClass|null;
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null, string $ordenation = 'synced_at', string $sense = 'asc'): PaginationInterface;
    public function export(): array;
}
