<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Http\Resources\Admin\StockResource;
use App\Models\Stock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StocksApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StockResource(Stock::with(['select_products'])->get());
    }

    public function store(StoreStockRequest $request)
    {
        $stock = Stock::create($request->all());
        $stock->select_products()->sync($request->input('select_products', []));

        return (new StockResource($stock))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Stock $stock)
    {
        abort_if(Gate::denies('stock_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StockResource($stock->load(['select_products']));
    }

    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $stock->update($request->all());
        $stock->select_products()->sync($request->input('select_products', []));

        return (new StockResource($stock))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Stock $stock)
    {
        abort_if(Gate::denies('stock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
