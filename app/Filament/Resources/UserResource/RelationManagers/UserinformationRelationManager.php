<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;

class UserinformationRelationManager extends RelationManager
{
    protected static string $relationship = 'Userinformation';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('User Information')->tabs([
                Tab::make('Personal Information')->schema([
                    TextInput::make('first name')
                        ->required()->placeholder('first name')->maxLength(50)->autofocus(),
                    TextInput::make('middle name')
                        ->required()->placeholder('middle name')->maxLength(50),
                    TextInput::make('last name')
                        ->required()->placeholder('last name')->maxLength(50),
                    TextInput::make('age')
                        ->required()->placeholder('ex. 18')->maxLength(50)->regex('/^[0-9]{2}$/')->type('number'),
                    Select::make('gender')->options(['Male','Female'])
                        ->required(),
                    DatePicker::make('date of birth')
                        ->required()->date('d-M-Y')->placeholder('dd-mm-yyyy'),
                    TextInput::make('phone number')
                        ->required()->placeholder('ex. 09123456789')->maxLength(50)->regex('/^09[0-9]{9}$/'),
                ]),
                Tab::make('Address')->schema([
                    TextInput::make('address')
                        ->required()->placeholder('ex. Zone 1 San Antonio')->maxLength(100),
                    TextInput::make('city')
                        ->required()->placeholder('ex. Tigaon')->maxLength(50),
                    Select::make('province')
                        ->required()->options([
                            'Abra',
                            'Agusan del Norte',
                            'Agusan del Sur',
                            'Aklan',
                            'Albay',
                            'Antique',
                            'Apayao',
                            'Aurora',
                            'Basilan',
                            'Bataan',
                            'Batanes',
                            'Batangas',
                            'Benguet',
                            'Biliran',
                            'Bohol',
                            'Bukidnon',
                            'Bulacan',
                            'Cagayan',
                            'Camarines Norte',
                            'Camarines Sur',
                            'Camiguin',
                            'Capiz',
                            'Catanduanes',
                            'Cavite',
                            'Cebu',
                            'Compostela Valley',
                            'Cotabato',
                            'Davao del Norte',
                            'Davao del Sur',
                            'Davao Occidental',
                            'Davao Oriental',
                            'Dinagat Islands',
                            'Eastern Samar',
                            'Guimaras',
                            'Ifugao',
                            'Ilocos Norte',
                            'Ilocos Sur',
                            'Iloilo',
                            'Isabela',
                            'Kalinga',
                            'La Union',
                            'Laguna',
                            'Lanao del Norte',
                            'Lanao del Sur',
                            'Leyte',
                            'Maguindanao',
                            'Marinduque',
                            'Masbate',
                            'Misamis Occidental',
                            'Misamis Oriental',
                            'Mountain Province',
                        ]),
                    TextInput::make('zip code')
                        ->required()->placeholder('first name')->maxLength(50),
                ]),
                Tab::make('Account Setup')->schema([
                    TextInput::make('email')
                        ->unique()->required()->placeholder('example@gmil.com')->maxLength(50)->email(),
                    TextInput::make('password')
                        ->required()->placeholder('password')->maxLength(50)->password(),
                ])->columns(2)->columnSpan(2),
        ])->columns(3)->columnSpanFull(),
        ])->columns(3);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Userinformation')
            ->columns([
                Tables\Columns\TextColumn::make('Userinformation'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
