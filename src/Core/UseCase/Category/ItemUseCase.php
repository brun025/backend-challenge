<?php

namespace Core\UseCase\Category;

use Core\UseCase\DTO\Category\ListCategories\ItemsInputDto;
use Core\UseCase\DTO\Category\ListCategories\ItemsOutputDto;
use Illuminate\Support\Facades\Http;
use Core\Domain\Exception\NotFoundException;
use Exception;

class ItemUseCase
{
    public function __construct(){}

    public function execute(ItemsInputDto $input): ItemsOutputDto
    {
        try {
            $itemsLegacyArray = array();
            for ($i = 0; $i < ($input->perPage * $input->page) / 100; $i++) {
                $itemsLegacy = Http::get(env('URL_LEGACY'), [
                    'page' => $i + 1
                ]);

                if ($itemsLegacy->failed()) {
                    throw new NotFoundException("Erro ao consumir legacy API.");
                }

                $itemsLegacyArray = array_merge($itemsLegacyArray, $itemsLegacy['data']);
            }

            $perPage = ($input->perPage * $input->page) - $input->perPage;
            $items = array_slice($itemsLegacyArray, $perPage, $input->perPage);

            return new ItemsOutputDto(
                items: $items,
                total: $input->perPage * $input->page,
                current_page: $input->page,
                per_page: $input->perPage,
            );
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
