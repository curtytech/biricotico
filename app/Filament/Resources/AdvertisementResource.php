<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvertisementResource\Pages;
use App\Models\Advertisement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AdvertisementResource extends Resource
{
    protected static ?string $model = Advertisement::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationLabel = 'Anúncios';

    protected static ?string $pluralLabel = 'Anúncios';

    protected static ?string $label = 'Anúncio';

    protected static ?string $createButtonLabel = 'Criar anúncio';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detalhes do Anúncio')

                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Usuário')
                            ->relationship('user', 'name')
                            ->visible(fn () => auth()->user()?->role === 'admin')
                            ->default(fn () => auth()->id())
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->label('Descrição')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Forms\Components\FileUpload::make('banner')
                            ->required()
                            ->image()
                            ->maxSize(2048)
                            ->directory('advertisements/banners')
                            ->validationMessages([
                                'required' => 'O campo banner é obrigatório.',
                                'image' => 'O arquivo deve ser uma imagem.',
                                'mimes' => 'A imagem deve ser dos tipos: jpeg, png, jpg ou webp.',
                                'max' => 'A imagem não pode ter mais de 2 MB.',
                            ]),
                        Forms\Components\TextInput::make('external_link')
                            ->label('Link Externo')
                            ->required()
                            ->url()
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable() -> label('Nome'),
                Tables\Columns\TextColumn::make('user.name')->label('User') ->label('Usuário'),
                Tables\Columns\TextColumn::make('external_link') -> label('Link Externo'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable() -> label ('Data de Criação'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdvertisements::route('/'),
            'create' => Pages\CreateAdvertisement::route('/create'),
            'edit' => Pages\EditAdvertisement::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->user()?->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }

        return $query;
    }
}