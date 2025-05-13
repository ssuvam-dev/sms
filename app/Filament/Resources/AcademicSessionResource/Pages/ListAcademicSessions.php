<?php

namespace App\Filament\Resources\AcademicSessionResource\Pages;

use App\Filament\Resources\AcademicSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcademicSessions extends ListRecords
{
    protected static string $resource = AcademicSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
