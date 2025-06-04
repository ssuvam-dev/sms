<?php

namespace App\Filament\Resources\ClassRoomResource\Pages;

use App\Filament\Imports\ClassRoomImporter;
use App\Filament\Resources\ClassRoomResource;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Facades\Filament;
use Filament\Resources\Pages\ListRecords;

class ListClassRooms extends ListRecords
{
    protected static string $resource = ClassRoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make('import_classroom')
                ->label(__("Import ClassRoom"))
                ->importer(ClassRoomImporter::class)
                ->options([
                    'team_id' => Filament::getTenant()->id
                ])
        ];
    }
}
