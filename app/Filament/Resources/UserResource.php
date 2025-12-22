<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Usuários';

    protected static ?string $modelLabel = 'Usuário';

    protected static ?string $pluralModelLabel = 'Usuários';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações Básicas')
                    ->schema([
                        Forms\Components\TextInput::make('name')->required()->label('Nome'),
                        Forms\Components\TextInput::make('slug')->required()->label('Slug'),
                        Forms\Components\TextInput::make('email')->email()->required()->label('E-mail'),
                        Forms\Components\TextInput::make('phone')->label('Telefone'),
                        Forms\Components\TextInput::make('password')->label('Senha')
                            ->password()
                            ->dehydrated(fn($state) => filled($state))
                            ->required(fn($livewire) => $livewire instanceof Pages\CreateUser),

                        // Forms\Components\Select::make('role')
                        //     ->options([
                        //         'admin' => 'Admin',
                        //         'user' => 'User',
                        //     ])
                        //     ->visible(fn() => auth()->user()?->role === 'admin')
                        //     ->default('user'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Aparência')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Imagem')
                            ->image()
                            ->disk('public')
                            ->directory('products')
                            ->imageEditor()
                            ->validationMessages([
                                'image' => 'O arquivo deve ser uma imagem.',
                                'mimes' => 'A imagem deve ser dos tipos: jpeg, png, jpg ou webp.',
                                'max' => 'A imagem não pode ter mais de 2 MB.',
                            ]),
                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Imagem de Capa')
                            ->image()
                            ->disk('public')
                            ->directory('products')
                            ->imageEditor()
                            ->validationMessages([
                                'required' => 'O campo banner é obrigatório.',
                                'image' => 'O arquivo deve ser uma imagem.',
                                'mimes' => 'A imagem deve ser dos tipos: jpeg, png, jpg ou webp.',
                                'max' => 'A imagem não pode ter mais de 2 MB.',
                            ]),
                        Forms\Components\TextInput::make('primary_color')->label('Cor Primária'),
                        Forms\Components\TextInput::make('secondary_color')->label('Cor Secundária'),
                        // Forms\Components\TextInput::make('template')->label('Template'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Redes Sociais')
                    ->schema([
                        Forms\Components\TextInput::make('facebook')->label('Facebook') ->url(),
                        Forms\Components\TextInput::make('whatsapp')->label('WhatsApp'),
                        Forms\Components\TextInput::make('instagram')->label('Instagram') ->url(),
                        Forms\Components\TextInput::make('twitter')->label('Twitter') ->url(),
                        Forms\Components\TextInput::make('linkedin')->label('LinkedIn') ->url(),
                        Forms\Components\Repeater::make('other_social_networks')
                            ->label('Outras Redes Sociais')
                            ->addActionLabel('Adicionar outra rede social')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Rede Social'),

                                Forms\Components\TextInput::make('url')
                                    ->label('Link')
                                    ->url(),
                            ])
                            ->columns(2),
                         ])     
                    ->columns(2),
                Forms\Components\Section::make('Endereço')
                    ->schema([
                        Forms\Components\TextInput::make('address')->label('Endereço') ->maxlength(100),
                        Forms\Components\TextInput::make('number')->label('Número') ->maxlength(100),
                        Forms\Components\TextInput::make('neighborhood')->label('Bairro') ->maxlength(100),
                        Forms\Components\TextInput::make('city')->label('Cidade') ->maxlength(100),
                        Forms\Components\TextInput::make('state')->label('Estado') ->maxlength(100),
                        Forms\Components\TextInput::make('country')->label('País') ->maxlength(100),
                        Forms\Components\TextInput::make('zipcode')->label('CEP') ->maxlength(100),
                        Forms\Components\TextInput::make('location_link')->label('Link de Localização'),
                    ])
                    ->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label('Nome'),
                Tables\Columns\TextColumn::make('email')->searchable()->label('Email'),
                Tables\Columns\TextColumn::make('slug')->searchable()->label('Slug'),
                Tables\Columns\TextColumn::make('role')->badge()->sortable()->label('Cargo'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->label('Data de Criação'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->visible(fn() => auth()->user()?->role === 'admin'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->user()?->role !== 'admin') {
            $query->where('id', auth()->id());
        }

        return $query;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->role === 'admin' || $record->id === auth()->id();
    }
}
