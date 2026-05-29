<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    protected static ?string $navigationLabel = 'Projets';
    protected static ?string $modelLabel = 'Projet';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('titre')
                ->label('Titre')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('categorie')
                ->label('Catégorie')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('client')
                ->label('Client')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('date')
                ->label('Date')
                ->required()
                ->placeholder('Ex: Octobre 2025')
                ->maxLength(100),

            Forms\Components\Select::make('filtre')
                ->label('Filtre')
                ->options([
                    'dev'    => 'Développement',
                    'design' => 'Design',
                ])
                ->required(),

            Forms\Components\FileUpload::make('image')
                ->label('Image du projet')
                ->image()
                ->directory('projects')
                ->required(),

            Forms\Components\TextInput::make('lien')
                ->label('Lien du projet')
                ->url()
                ->nullable()
                ->placeholder('https://...'),

            Forms\Components\TagsInput::make('technologies')
                ->label('Technologies')
                ->placeholder('Ex: Laravel, React...')
                ->required(),

            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->required()
                ->rows(4)
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
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public'),

                Tables\Columns\TextColumn::make('titre')
                    ->label('Titre')
                    ->searchable(),

                Tables\Columns\TextColumn::make('categorie')
                    ->label('Catégorie'),

                Tables\Columns\TextColumn::make('client')
                    ->label('Client'),

                Tables\Columns\TextColumn::make('filtre')
                    ->label('Filtre')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'dev'    => 'success',
                        'design' => 'info',
                        default  => 'gray',
                    }),

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
            'index'  => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit'   => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}