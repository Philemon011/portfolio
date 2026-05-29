<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ToolResource\Pages;
use App\Models\Tool;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ToolResource extends Resource
{
    protected static ?string $model = Tool::class;
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationLabel = 'Outils';
    protected static ?string $modelLabel = 'Outil';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nom')
                ->label('Nom de l\'outil')
                ->required()
                ->maxLength(100),

            Forms\Components\FileUpload::make('logo')
                ->label('Logo (SVG ou PNG)')
                ->image()
                ->directory('tools')
                ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/jpeg'])
                ->required(),

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
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->width(40)
                    ->height(40),

                Tables\Columns\TextColumn::make('nom')
                    ->label('Nom')
                    ->searchable(),

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
            'index'  => Pages\ListTools::route('/'),
            'create' => Pages\CreateTool::route('/create'),
            'edit'   => Pages\EditTool::route('/{record}/edit'),
        ];
    }
}