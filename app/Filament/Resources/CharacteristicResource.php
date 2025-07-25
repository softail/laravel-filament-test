<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CharacteristicResource\Pages;
use App\Filament\Resources\CharacteristicResource\RelationManagers;
use App\Models\Characteristic;
use Filament\Forms;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CharacteristicResource extends Resource
{
    protected static ?string $model = Characteristic::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->string()
                    ->maxLength(255),

                Select::make('meta_data.type')
                    ->required()
                    ->label('Type')
                    ->options([
                        'string' => 'String',
                        'boolean' => 'Boolean',
                        'integer' => 'Integer',
                    ])
                    ->default('string')
                    ->reactive(),

                Toggle::make('meta_data.boolean')
                    ->required()
                    ->label('Description (Boolean)')
                    ->visible(fn ($get) => $get('meta_data.type') === 'boolean'),

                TextInput::make('meta_data.integer')
                    ->required()
                    ->label('Description (Integer)')
                    ->numeric()
                    ->visible(fn ($get) => $get('meta_data.type') === 'integer'),

                TextInput::make('meta_data.string')
                    ->required()
                    ->label('Description (String)')
                    ->visible(fn ($get) => $get('meta_data.type') === 'string'),

                Select::make('characteristic_category_id')
                    ->label('Category')
                    ->relationship('characteristicCategory', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->searchable()->searchable(),
                TextColumn::make('meta_data.type')->label('Type')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCharacteristics::route('/'),
            'view' => Pages\ViewCharacteristic::route('/{record}'),
        ];
    }
}
