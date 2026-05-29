<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'Services';
    protected static ?string $modelLabel = 'Service';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('numero')
                ->label('Numéro')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('titre')
                ->label('Titre')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->required()
                ->rows(4),

            Forms\Components\TextInput::make('ordre')
                ->label('Ordre d\'affichage')
                ->numeric()
                ->default(0),

            Forms\Components\Toggle::make('actif')
                ->label('Actif')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('numero')
                    ->label('N°')
                    ->sortable(),

                Tables\Columns\TextColumn::make('titre')
                    ->label('Titre')
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(60),

                Tables\Columns\TextColumn::make('ordre')
                    ->label('Ordre')
                    ->sortable(),

                Tables\Columns\IconColumn::make('actif')
                    ->label('Actif')
                    ->boolean(),
            ])
            ->defaultSort('ordre')
            ->reorderable('ordre');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit'   => Pages\EditService::route('/{record}/edit'),
        ];
    }
}