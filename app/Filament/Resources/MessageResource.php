<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Messages';
    protected static ?string $modelLabel = 'Message';
    protected static ?int $navigationSort = 5;

    // Badge qui affiche le nombre de messages non lus
    public static function getNavigationBadge(): ?string
    {
        return Message::nonLus()->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nom')
                ->label('Nom')
                ->disabled(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->disabled(),

            Forms\Components\TextInput::make('objet')
                ->label('Objet')
                ->disabled(),

            Forms\Components\Textarea::make('message')
                ->label('Message')
                ->disabled()
                ->rows(6)
                ->columnSpanFull(),

            Forms\Components\Toggle::make('lu')
                ->label('Marquer comme lu')
                ->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')
                    ->label('Nom')
                    ->searchable()
                    ->weight(fn ($record) => $record->lu ? 'normal' : 'bold'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('objet')
                    ->label('Objet')
                    ->limit(40),

                Tables\Columns\TextColumn::make('message')
                    ->label('Message')
                    ->limit(60),

                Tables\Columns\IconColumn::make('lu')
                    ->label('Lu')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Reçu le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                // Marquer comme lu directement depuis la liste
                Tables\Actions\Action::make('marquer_lu')
                    ->label('Marquer comme lu')
                    ->icon('heroicon-o-check')
                    ->visible(fn ($record) => !$record->lu)
                    ->action(fn ($record) => $record->update(['lu' => true])),

                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMessages::route('/'),
            'view'  => Pages\ViewMessage::route('/{record}'),
        ];
    }

    // Messages en lecture seule, pas de création depuis l'admin
    public static function canCreate(): bool
    {
        return false;
    }
}