<?php

namespace App\Http\Controllers;

use App\DTO\CreateOptionalDTO;
use App\DTO\CreateVehicleDTO;
use App\Http\Requests\StoreUpdateStockRequest;
use App\Models\Optional;
use App\Services\StockService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StockController extends Controller
{
    public function __construct(private StockService $service) { }

    public function index(Request $request)
    {
        if(!$stocks = Cache::get('stocks')) {
            $stocks = $this->service->paginate(
                page: $request->get('page', 1),
                totalPerPage: $request->get('per_page', 10),
                filter: $request->search,
                ordenation: $request->get('ordenation', 'synced_at'),
                sense: $request->get('sense', 'asc')
            );
            Cache::put(['stocks' => $stocks], $seconds = 60);
        }

        $filters = ['filter'  => $request->get('filter', ''), 'ordenation' => $request->get('ordenation', 'synced_at'), 'sense' => $request->get('sense', 'asc')];

        return view('/stock/index', compact('stocks', 'filters'));
    }

    public function create(Request $request)
    {
        $optionals = Optional::all();
        return view('/stock/create', compact('optionals'));
    }

    public function store(StoreUpdateStockRequest $request)
    {
        $this->service->create(CreateVehicleDTO::makeFromRequest($request), CreateOptionalDTO::makeFromRequest($request));
        return redirect()->route('stock.index');
    }

    public function export(Request $request)
    {
        $stocks = $this->service->export(
            filter: $request->search,
            ordenation: $request->get('ordenation', 'synced_at'),
            sense: $request->get('sense', 'asc')
        );
    }
}
