<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserInformationResource\Pages;
use App\Filament\Resources\UserInformationResource\RelationManagers;
use App\Models\UserInformation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\DateTimePicker;
class UserInformationResource extends Resource
{
    protected static ?string $model = UserInformation::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $modelLabel= 'Account';
    public static function form(Form $form): Form
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
                        ->unique(ignoreRecord:true)->required()->placeholder('example@gmil.com')->maxLength(50)->email(),
                    TextInput::make('password')
                        ->required()->placeholder('password')->maxLength(50)->password(),
                ])->columns(2)->columnSpan(2),
        ])->columns(3)->columnSpanFull(),
        ])->columns(3);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('first name')
            ->searchable()
            ->sortable(),
            TextColumn::make('middle name'),
            TextColumn::make('role')->default('user'),
            TextColumn::make('last name'),
            TextColumn::make('age'),
            TextColumn::make('gender'),
            TextColumn::make('date of birth'),
            TextColumn::make('phone number'),
            TextColumn::make('address'),
            TextColumn::make('city'),
            TextColumn::make('zip code'),
            TextColumn::make('province'),
            TextColumn::make('email')
            ->searchable()
            ->sortable(),
            TextColumn::make('password'),
            TextColumn::make('created_at'),
            TextColumn::make('updated_at'),
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
            // UserResource\RelationManagers\UserinformationRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserInformation::route('/'),
            'create' => Pages\CreateUserInformation::route('/create'),
            'edit' => Pages\EditUserInformation::route('/{record}/edit'),
        ];
    }
}