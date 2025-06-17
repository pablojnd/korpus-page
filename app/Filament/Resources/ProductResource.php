<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Section::make()
                ->columns(3)
                ->columnSpan(2)
                ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('category_id')
                    ->label('Categoría')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Precio')
                    ->required()
                    ->numeric()
                    ->default(0.00)
                    ->prefix('$'),
                Forms\Components\TextInput::make('stock')
                    ->label('Stock')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\KeyValue::make('atributtes')
                    ->label('Atributos')
                    ->addActionLabel('Añadir Propiedad')
                    ->keyLabel('Propiedad')
                    ->keyPlaceholder('Ej: Color')
                    ->valueLabel('Descripción')
                    ->valuePlaceholder('Ej: Rojo')
                    ->reorderable()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Imagen')
                    ->image()
                    ->imageEditor()
                    ->directory('products')
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull(),
                ]),
            Forms\Components\Section::make()
                ->columns(3)
                ->columnSpan(1)
                ->schema([
                Forms\Components\Placeholder::make('created_at')
                    ->label('Creado el')
                    ->content(fn(?Product $record): string => $record?->created_at?->format('d/m/Y H:i') ?? '-'),
                Forms\Components\Placeholder::make('updated_at')
                    ->label('Actualizado el')
                    ->content(fn(?Product $record): string => $record?->updated_at?->format('d/m/Y H:i') ?? '-'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Activo')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
                ])
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Nombre')
                ->searchable(),
            Tables\Columns\TextColumn::make('slug')
                ->label('Slug')
                ->searchable(),
            Tables\Columns\ImageColumn::make('image')
                ->label('Imagen'),
            Tables\Columns\TextColumn::make('price')
                ->label('Precio')
                ->money()
                ->sortable(),
            Tables\Columns\TextColumn::make('stock')
                ->label('Stock')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('category.name')
                ->label('Categoría')
                ->sortable(),
            Tables\Columns\IconColumn::make('is_active')
                ->label('Activo')
                ->boolean(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Creado el')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Actualizado el')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
