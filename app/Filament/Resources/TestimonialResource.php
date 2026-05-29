<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationLabel = 'Témoignages';
    protected static ?string $modelLabel = 'Témoignage';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nom')
                ->label('Nom du client')
                ->required()
                ->maxLength(100),

            Forms\Components\TextInput::make('entreprise')
                ->label('Entreprise')
                ->required()
                ->maxLength(100),

            Forms\Components\Textarea::make('citation')
                ->label('Témoignage')
                ->required()
                ->rows(5)
                ->columnSpanFull(),

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
                Tables\Columns\TextColumn::make('nom')
                    ->label('Nom')
                    ->searchable(),

                Tables\Columns\TextColumn::make('entreprise')
                    ->label('Entreprise')
                    ->searchable(),

                Tables\Columns\TextColumn::make('citation')
                    ->label('Témoignage')
                    ->limit(80),

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
            'index'  => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit'   => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}