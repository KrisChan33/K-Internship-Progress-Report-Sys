<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserinformationsResource\Pages;
use App\Filament\Resources\UserinformationsResource\RelationManagers;
use App\Models\User;
use App\Models\Userinformations;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserinformationsResource extends Resource
{
    protected static ?string $model = Userinformations::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("User Information")->schema([
                    TextInput::make('firstname')
                        ->label('First Name')
                        ->required()
                        ->autofocus()
                        ->placeholder('First Name')
                        ->maxLength(50),
                    TextInput::make('lastname')
                        ->label('Last Name')
                        ->required()
                        ->placeholder('Last Name')
                        ->maxLength(50),
                    TextInput::make('username')
                        ->label('Username')
                        ->required()
                        ->placeholder('Username')
                        ->maxLength(50),
                    TextInput::make('email')
                        ->label('Email')
                        ->required()
                        ->placeholder('Email')
                        ->maxLength(50),
                    TextInput::make('password')
                        ->label('Password')
                        ->required()
                        ->placeholder('Password')
                        ->maxLength(50),
                    Select::make('role')
                        ->label('Role')
                        ->options([
                            'admin' => 'Admin',
                            'member' => 'Member',
                            'user' => 'User',
                        ])
                        ->default('user')
                        ->required(),
                ]),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('role')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('firstname')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('lastname')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('username')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('password')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('role')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListUserinformations::route('/'),
            'create' => Pages\CreateUserinformations::route('/create'),
            'edit' => Pages\EditUserinformations::route('/{record}/edit'),
        ];
    }
    // public static function canAccess(): bool 
    // {
    //     // return auth()->user()->role === 1;
    // }
}
