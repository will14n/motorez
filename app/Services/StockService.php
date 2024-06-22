<?php

namespace App\Services;

use App\DTO\CreateOptionalDTO;
use App\DTO\CreateVehicleDTO;
use App\Repositories\PaginationInterface;
use App\Repositories\StockRepositoryInterface;
use stdClass;

class StockService
{
    public function __construct(
        protected StockRepositoryInterface $repository
    )
    {

    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function create(CreateVehicleDTO $vehicle, CreateOptionalDTO $optional): stdClass|null
    {
        return $this->repository->create($vehicle, $optional);
    }

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null, string $ordenation = 'date', string $sense = 'asc'): PaginationInterface
    {
        return $this->repository->paginate(page: $page, totalPerPage: $totalPerPage, filter: $filter, ordenation: $ordenation, sense: $sense);
    }

    public function export(string $filter = null, string $ordenation = 'date', string $sense = 'asc'):void
    {
        $stocks = $this->repository->getAll($filter, $ordenation, $sense);

        $out = fopen('php://output', 'w');
        fputcsv($out, [
            'Marca',
            'Modelo',
            'Ano',
            'Versão',
            'Cor',
            'Kilometragem',
            'Combustível',
            'Transmissão',
            'Portas',
            'Preço',
            'Fornecedor',
            'ID',
            'Última Atualização'
        ]);
        $out = fopen('php://output', 'w');
        foreach($stocks as $stock)
        {
            $data = [
                isset($stock['brand']) ? $stock['brand'] : '',
                isset($stock['model']) ? $stock['model'] : '',
                isset($stock['year']) ? $stock['year'] : '',
                isset($stock['version']) ? $stock['version'] : '',
                isset($stock['color']) ? $stock['color'] : '',
                isset($stock['kilometer']) ? $stock['kilometer'] : '',
                isset($stock['fuel']) ? $stock['fuel'] : '',
                isset($stock['transmission']) ? $stock['transmission'] : '',
                isset($stock['door']) ? $stock['door'] : '',
                isset($stock['price']) ? $stock['price'] : '',
                isset($stock['supplier']) ? $stock['supplier'] : '',
                isset($stock['synced_id']) ? $stock['synced_id'] : '',
                isset($stock['synced_at']) ? $stock['synced_at'] : '',
            ];
            fputcsv($out, $data);
        }
        fclose($out);

        header('Content-Disposition: attachment; filename="export.csv"');
        header("Cache-control: private");
        header("Content-type: application/force-download");
        header("Content-transfer-encoding: binary\n");
        exit;
    }
}
