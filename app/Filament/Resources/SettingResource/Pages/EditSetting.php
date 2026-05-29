<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use App\Models\Setting;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    // Charge automatiquement le premier enregistrement
    public function mount(int | string $record = null): void
    {
        $setting = Setting::firstOrFail();
        parent::mount($setting->id);
    }

    // Redirige vers la même page après sauvegarde
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}