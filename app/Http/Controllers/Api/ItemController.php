<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Core\UseCase\Category\ItemUseCase;
use Core\UseCase\DTO\Category\ListCategories\ItemsInputDto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Adapters\ApiAdapter;

class ItemController extends Controller
{
    public function index(Request $request, ItemUseCase $useCase)
    {
        $response = $useCase->execute(
            input: new ItemsInputDto(
                page: (int) $request->get('page', 1),
                perPage: (int) $request->get('perPage', 100)
            )
        );

        return ApiAdapter::json($response);
    }
}
