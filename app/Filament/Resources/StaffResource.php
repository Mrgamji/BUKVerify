<?php

namespace App\Filament\Resources;


use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TextFilter;

use App\Filament\Resources\StaffResource\Pages;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Models\Staff;
use DateTime;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Text;
use Filament\Forms\Components\Date;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Staff Management';
    protected static ?string $label = 'Staff';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('staff_id')
                ->label('Staff ID')
                ->required()
                ->maxLength(255),

            TextInput::make('first_name')
                ->label('First Name')
                ->required()
                ->maxLength(255),

            TextInput::make('last_name')
                ->label('Last Name')
                ->required()
                ->maxLength(255),

            TextInput::make('email')
                ->label('Email')
                ->required()
                ->email()
                ->maxLength(255),

            TextInput::make('phone_number')
                ->label('Phone Number')
                ->nullable()
                ->maxLength(255),

            TextInput::make('department')
                ->label('Department')
                ->required()
                ->maxLength(255),

            TextInput::make('position')
                ->label('Position')
                ->required()
                ->maxLength(255),

            DateTimePicker::make('date_of_birth')
                ->label('Date of Birth')
                ->nullable()
                ->format('Y-m-d'),

            Select::make('gender')
                ->label('Gender')
                ->options([
                    'male' => 'Male',
                    'female' => 'Female',
                    'other' => 'Other',
                ])
                ->nullable(),

            Textarea::make('address')
                ->label('Address')
                ->nullable()
                ->maxLength(255),
        ]);
}
            
        
        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    TextColumn::make('staff_id')
                        ->label('Staff ID')
                        ->sortable()
                        ->searchable(),
        
                    TextColumn::make('first_name')
                        ->label('First Name')
                        ->sortable()
                        ->searchable(),
        
                    TextColumn::make('last_name')
                        ->label('Last Name')
                        ->sortable()
                        ->searchable(),
        
                    TextColumn::make('email')
                        ->label('Email')
                        ->sortable()
                        ->searchable(),
        
                    TextColumn::make('phone_number')
                        ->label('Phone Number')
                        ->sortable(),
        
                    TextColumn::make('department')
                        ->label('Department')
                        ->sortable()
                        ->searchable(),
        
                    TextColumn::make('position')
                        ->label('Position')
                        ->sortable()
                        ->searchable(),
        
                    TextColumn::make('date_of_birth')
                        ->label('Date of Birth')
                        ->sortable(),
                ])
                ->headerActions([
                    Action::make('import')
                        ->label('Import Staff')
                        ->icon('heroicon-o-folder-plus')
                        ->action(function () {
                
                            // Redirect to a specific route after the action is performed
                            return redirect()->route('staff.import');
                        })
                        ->color('success'),
                        
                        Action::make('export')
                        ->label('Export All Staff')
                        ->icon('heroicon-o-folder-arrow-down')
                        ->action(function () {
                
                            // Redirect to a specific route after the action is performed
                            return redirect()->route('staff.import');
                        })
                        ->color('primary'),
                        // Define the button color
                ])
                ->filters([
                    SelectFilter::make('department')
                        ->label('Department')
                        ->searchable()
                        ->options([
                            'departments' => [
    'HR' => 'Human Resources',
    'IT' => 'Information Technology',
    'Sales' => 'Sales',
    'Marketing' => 'Marketing',
    'Finance' => 'Finance',
    'Engineering' => 'Engineering',
    'Law' => 'Law',
    'Medicine' => 'Medicine',
    'Science' => 'Science',
    'Arts' => 'Arts',
    'Social_Sciences' => 'Social Sciences',
    'Education' => 'Education',
    'Agriculture' => 'Agriculture',
    'Business' => 'Business',
    'Library_Sciences' => 'Library Sciences',
    'Architecture' => 'Architecture',
    'Nursing' => 'Nursing',
    'Pharmacy' => 'Pharmacy',
    'Environmental_Sciences' => 'Environmental Sciences',
    'Computer Science' => 'Computer Science',
    'Software Engineering' => 'Software Engineering',
    'Electrical Engineering' => 'Electrical Engineering',
    'Mechanical Engineering' => 'Mechanical Engineering',
    'Civil Engineering' => 'Civil Engineering',
    'Chemistry' => 'Chemistry',
    'Physics' => 'Physics',
    'Mathematics' => 'Mathematics',
    'Biology' => 'Biology',
]

                        ]),
        
                    SelectFilter::make('position')
                        ->label('Position')
                        ->searchable()
                        ->options([
    'Professor' => 'Professor',
    'Associate Professor' => 'Associate Professor',
    'Assistant Professor' => 'Assistant Professor',
    'Lecturer' => 'Lecturer',
    'Senior Lecturer' => 'Senior Lecturer',
    'Teaching Assistant' => 'Teaching Assistant',
    'Researcher' => 'Researcher',
    'Administrator' => 'Administrator',
    'Registrar' => 'Registrar',
    'Director' => 'Director',
    'Dean' => 'Dean',
    'Head of Department' => 'Head of Department',
    'Faculty Officer' => 'Faculty Officer',
    'Student Affairs Officer' => 'Student Affairs Officer',
    'Examination Officer' => 'Examination Officer',
    'Library Officer' => 'Library Officer',
    'IT Support' => 'IT Support',
    'Accountant' => 'Accountant',
    'Human Resources Officer' => 'Human Resources Officer',
    'Security Officer' => 'Security Officer',
    'Maintenance Staff' => 'Maintenance Staff',
    'Cleaner' => 'Cleaner',
                        ]),
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}
