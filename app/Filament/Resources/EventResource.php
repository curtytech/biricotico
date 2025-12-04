<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Eventos';

    protected static ?string $modelLabel = 'Evento';

    protected static ?string $pluralModelLabel = 'Eventos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações do Evento')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nome do Evento')
                            ->required()
                            ->maxLength(255),

                               Forms\Components\TextInput::make('price')
                            ->label('Preço')
                            ->required()
                            ->numeric()
                            ->prefix('R$')
                            ->placeholder('0.00'),

                        Forms\Components\Textarea::make('description')
                            ->label('Descrição')
                            ->required()
                            ->rows(3)
                            ->maxLength(1000),

                        Forms\Components\FileUpload::make('banner')
                            ->label('Banner')
                            ->required()
                            ->image()
                            ->disk('public')
                            ->directory('events')
                            ->maxSize(2048)
                            ->rules(['mimes:jpeg,png,jpg,webp']),

                        Forms\Components\TextInput::make('external_link')
                            ->label('Link Externo')
                            ->required()
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://example.com'),

                     
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Datas e Horários')
                    ->schema([
                        Forms\Components\DatePicker::make('date_open')
                            ->label('Data de Abertura')
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->rules(['date', 'before_or_equal:date_close']),

                        Forms\Components\DatePicker::make('date_close')
                            ->label('Data de Encerramento')
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->rules(['date', 'after_or_equal:date_open']),

                        Forms\Components\TimePicker::make('time_open')
                            ->label('Horário de Abertura')
                            ->required()
                            ->seconds(false)
                            ->format('H:i'),

                        Forms\Components\TimePicker::make('time_close')
                            ->label('Horário de Encerramento')
                            ->required()
                            ->seconds(false)
                            ->format('H:i'),
                    ])
                    ->columns(2),

                // Forms\Components\Section::make('Controle de Acesso')
                //     ->schema([
                //         Forms\Components\Select::make('user_id')
                //             ->label('Organizador')
                //             ->relationship('user', 'name')
                //             ->visible(fn() => auth()->user()?->role === 'admin')
                //             ->default(fn() => auth()->id())
                //             ->required(),
                //     ])
                //     ->collapsible()
                //     ->collapsed(fn() => auth()->user()?->role !== 'admin'),
            ]);
        }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('User'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('date_open'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
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
