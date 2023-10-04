<?php

namespace Tests\Feature\Core\UseCase\Category;

use Core\UseCase\Category\ItemUseCase;
use Core\UseCase\DTO\Category\ListCategories\ItemsInputDto;
use Core\UseCase\DTO\Category\ListCategories\ItemsOutputDto;
use Tests\TestCase;

class ItemsUseCaseTest extends TestCase
{
    public function test_list_all()
    {
        $responseUseCase = $this->createUseCase();

        $this->assertInstanceOf(ItemsOutputDto::class, $responseUseCase);
    }

    private function createUseCase()
    {
        $useCase = new ItemUseCase();
        return $useCase->execute(new ItemsInputDto());
    }
}
