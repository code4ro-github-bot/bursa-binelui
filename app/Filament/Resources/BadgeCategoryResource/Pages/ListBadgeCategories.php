<?php

namespace App\Filament\Resources\BadgeCategoryResource\Pages;

use App\Filament\Resources\BadgeCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBadgeCategories extends ListRecords
{
    protected static string $resource = BadgeCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}