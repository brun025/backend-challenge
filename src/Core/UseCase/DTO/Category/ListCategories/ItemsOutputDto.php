<?php

namespace Core\UseCase\DTO\Category\ListCategories;

class ItemsOutputDto
{
    public function __construct(
        public array $items,
        public int $total,
        public int $current_page,
        public int $per_page,
    ) {
    }
}
