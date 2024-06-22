<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class PaginationPresenter implements PaginationInterface
{
    /**
     * @var stdClass[]
     */
    private array $items;

    public function __construct(protected LengthAwarePaginator $paginator)
    {
        $this->items = $this->resolveItems($this->paginator->items());
    }

    private function resolveItems(array $items): array
    {
        $response = [];
        foreach ($items as $key => $item) {
            $stdClassObject = new stdClass;
            $stdClassObject = $item;
            array_push($response, $stdClassObject);
        }

        return $response ;
    }

    /**
     * @return stdClass[]
     */
    public function items(): array
    {
        return $this->items;
    }

    public function total(): int
    {
        return $this->paginator->total() ?? 0;
    }

    public function isFirstPage(): bool
    {
        return $this->paginator->onFirstPage();
    }

    public function isLastPage(): bool
    {
        return $this->paginator->onLastPage();
    }

    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 1;
    }

    public function nextPage(): int
    {
        return $this->paginator->currentPage() + 1;
    }

    public function previousPage(): int
    {
        return $this->paginator->currentPage() - 1;
    }

    public function lastPage(): int
    {
        return $this->paginator->lastPage();
    }
}
