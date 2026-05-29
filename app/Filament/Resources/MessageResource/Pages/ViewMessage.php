<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use Filament\Resources\Pages\ViewRecord;

class ViewMessage extends ViewRecord
{
    protected static string $resource = MessageResource::class;

    // Marquer automatiquement comme lu à l'ouverture
    public function mount(int | string $record): void
    {
        parent::mount($record);
        
        if (!$this->record->lu) {
            $this->record->update(['lu' => true]);
        }
    }
}