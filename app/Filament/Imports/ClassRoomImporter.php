<?php

namespace App\Filament\Imports;

use App\Models\ClassRoom;
use App\Models\Section;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class ClassRoomImporter extends Importer
{
    protected static ?string $model = ClassRoom::class;

    public $sections;
    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->label(__("Class Name"))
                ->example(['Grade 1', 'Grade 2', 'Grade 3']),
                
            ImportColumn::make('sections')
                ->label(__("Grade Sections"))
                ->array()
                ->example(['Section A,Section B','Section B,Section C','Section C,Section D'])
        ];
    }

    public function resolveRecord(): ?ClassRoom
    {
        $this->sections = $this->data['sections'];
        unset($this->data['sections']);
        return ClassRoom::firstOrNew([
            'team_id' => $this->options['team_id'],
            'name' => $this->data['name'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your class room import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }

    protected function afterSave(): void
    {
        $teamId = $this->options['team_id'];
        $sectionIds = collect($this->sections)->map(function($sectionName) use($teamId){
            $section = Section::firstOrCreate(['team_id'=>$teamId,'name'=>$sectionName]);
            return $section->id;
        });

        $this->record->sections()->syncWithoutDetaching($sectionIds->toArray());
    }
}
