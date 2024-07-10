<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HubunganResource\Pages;
use App\Filament\Resources\HubunganResource\RelationManagers;
use App\Models\Hubungan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HubunganResource extends Resource
{
    protected static ?string $model = Hubungan::class;

    protected static ?string $navigationIcon = 'heroicon-o-external-link';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('thumbnail')
                    ->required()->image()->disk('public'),
                Forms\Components\RichEditor::make('content')
                    ->required(),
                    Forms\Components\TextInput::make('link')
                    ->required()
                    ->maxLength(255),   
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('title'),
            Tables\Columns\ImageColumn::make('thumbnail'),
            Tables\Columns\TextColumn::make('post_as'),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHubungans::route('/'),
            'create' => Pages\CreateHubungan::route('/create'),
            'edit' => Pages\EditHubungan::route('/{record}/edit'),
        ];
    }    
}
