<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImagemResource\Pages;
use App\Filament\Resources\ImagemResource\RelationManagers;
use App\Models\Imagem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImagemResource extends Resource
{
    protected static ?string $model = Imagem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome'),
                Forms\Components\FileUpload::make('imagem_path')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListImagems::route('/'),
            'create' => Pages\CreateImagem::route('/create'),
            'edit' => Pages\EditImagem::route('/{record}/edit'),
        ];
    }
}
