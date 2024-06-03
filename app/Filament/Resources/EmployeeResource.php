<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use App\Models\Groupe;
use App\Models\City;
use App\Models\Country;
use App\Models\Department;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

   // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('fname')->required(),
                TextInput::make('lname')->required(),
                TextInput::make('address')->required(),
                TextInput::make('zipcode')->required(),
                DatePicker::make('birthdate')->required(),
               DatePicker::make('hireddate')->required(),
               Select::make('groupe_id')
                ->label('Groupe')
                ->options(Groupe::all()->pluck('name','id')),

                Select::make('city_id')
                ->label('City')
                ->options(City::all()->pluck('name','id')),

                Select::make('country_id')
                ->label('Country')
                ->options(Country::all()->pluck('name','id')),

                Select::make('department_id')
                ->label('Department')
                ->options(Department::all()->pluck('name','id')),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('fname'),
                TextColumn::make('lname'),
                TextColumn::make('hireddate'),
                TextColumn::make('groupe.name'),
                TextColumn::make('country.name'),
                TextColumn::make('groupe.name'),
                TextColumn::make('department.name'),
                

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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
