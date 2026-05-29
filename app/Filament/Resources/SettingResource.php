<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Paramètres';

    protected static ?string $modelLabel = 'Paramètres';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make('Informations générales')
                ->icon('heroicon-o-user')
                ->schema([
                    Forms\Components\TextInput::make('nom')
                        ->label('Nom')
                        ->required()
                        ->maxLength(100),

                    Forms\Components\TextInput::make('metier')
                        ->label('Métier')
                        ->required()
                        ->maxLength(100),

                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->maxLength(100),

                    Forms\Components\TextInput::make('telephone')
                        ->label('Téléphone')
                        ->nullable()
                        ->maxLength(50),

                    Forms\Components\TextInput::make('whatsapp')
                        ->label('WhatsApp')
                        ->nullable()
                        ->maxLength(50),

                    Forms\Components\TextInput::make('github')
                        ->label('GitHub')
                        ->url()
                        ->nullable()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('linkedin')
                        ->label('LinkedIn')
                        ->url()
                        ->nullable()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('facebook')
                        ->label('Facebook')
                        ->url()
                        ->nullable()
                        ->maxLength(255),
                ])->columns(2),

            Forms\Components\Section::make('Section Hero')
                ->icon('heroicon-o-home')
                ->schema([
                    Forms\Components\Textarea::make('hero_titre')
                        ->label('Titre principal')
                        ->required()
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('hero_sous_titre')
                        ->label('Sous-titre')
                        ->required()
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\FileUpload::make('avatar_light')
                        ->label('Avatar mode clair')
                        ->image()
                        ->directory('avatars')
                        ->nullable(),

                    Forms\Components\FileUpload::make('avatar_dark')
                        ->label('Avatar mode sombre')
                        ->image()
                        ->directory('avatars')
                        ->nullable(),
                ])->columns(2),

            Forms\Components\Section::make('Section À propos')
                ->icon('heroicon-o-information-circle')
                ->schema([
                    Forms\Components\Textarea::make('apropos_lead')
                        ->label('Texte principal')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('apropos_description')
                        ->label('Description')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('annees_experience')
                        ->label('Années d\'expérience')
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('projets_livres')
                        ->label('Projets livrés')
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('taux_satisfaction')
                        ->label('Taux de satisfaction (%)')
                        ->numeric()
                        ->required(),
                ])->columns(3),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\EditSetting::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
