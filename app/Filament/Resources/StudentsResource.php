<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use App\Filament\Resources\StudentsResource\Pages;
use App\Filament\Resources\StudentsResource\RelationManagers;
use App\Models\Students;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Columns;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentsResource extends Resource
{
    protected static ?string $model = Students::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Student Management';
    protected static ?string $label = 'Students';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('student_details')
                ->tabs([
                    Tabs\Tab::make('Personal Info')
                        ->schema([
                            Section::make('Basic Information')
                                ->description('Enter the student’s personal details.')
                                ->schema([
                                    TextInput::make('first_name')
                                        ->label('First Name')
                                        ->required()
                                        ->autofocus(),
    
                                    TextInput::make('last_name')
                                        ->label('Last Name')
                                        ->required(),
    
                                    TextInput::make('email')
                                        ->email()
                                        ->label('Email Address')
                                        ->required(),
    
                                    TextInput::make('phone')
                                        ->tel()
                                        ->label('Phone Number'),
    
                                    DatePicker::make('date_of_birth')
                                        ->label('Date of Birth')
                                        ->nullable(),
    
                                    Select::make('gender')
                                        ->label('Gender')
                                        ->options([
                                            'Male' => 'Male',
                                            'Female' => 'Female',
                                            'Other' => 'Other',
                                        ])
                                        ->nullable(),
    
                                    Textarea::make('address')
                                        ->label('Home Address')
                                        ->rows(3),
    
                                    TextInput::make('city')
                                        ->label('City')
                                        ->nullable(),
    
                                    TextInput::make('state')
                                        ->label('State')
                                        ->nullable(),
    
                                    TextInput::make('country')
                                        ->label('Country')
                                        ->nullable(),
                                ])
                                ->columns(2),
                        ]),
    
                    Tabs\Tab::make('Academic Info')
                        ->schema([
                            Section::make('Academic Details')
                                ->description('Enter the academic information of the student.')
                                ->schema([
                                    TextInput::make('matriculation_number')
                                        ->label('Matriculation Number')
                                        ->required(),
    
                                    FileUpload::make('birth_certificate')
                                        ->label('Birth Certificate')
                                        ->nullable()
                                        ->directory('documents'),
    
                                    FileUpload::make('waec_certificate')
                                        ->label('WAEC Certificate')
                                        ->nullable()
                                        ->directory('documents'),
    
                                    TextInput::make('jamb_registration_number')
                                        ->label('JAMB Registration Number')
                                        ->nullable(),
    
                                    TextInput::make('jamb_score')
                                        ->label('JAMB Score')
                                        ->nullable(),
    
                                    TextInput::make('admission_year')
                                        ->label('Admission Year')
                                        ->nullable(),
    
                                    TextInput::make('expected_year_of_graduation')
                                        ->label('Expected Year of Graduation')
                                        ->nullable(),
    
                                    Select::make('department')
                                        ->label('Department')
                                        ->options([
                                            'HR' => 'HR',
                                            'IT' => 'IT',
                                            'Sales' => 'Sales',
                                            'Marketing' => 'Marketing',
                                            'Computer Science' => 'Computer Science',
                                            'Software Engineering' => 'Software Engineering',
                                        ])
                                        ->nullable(),
    
                                    Select::make('level')
                                        ->label('Level')
                                        ->options([
                                            '100' => '100',
                                            '200' => '200',
                                            '300' => '300',
                                            '400' => '400',
                                            '500' => '500',
                                        ])
                                        ->nullable(),
    
                                    TextInput::make('cgpa')
                                        ->label('CGPA')
                                        ->nullable(),
                                ])
                                ->columns(2),
                        ]),
    
                    Tabs\Tab::make('Profile')
                        ->schema([
                            Section::make('Profile Information')
                                ->description('Upload the student’s profile picture.')
                                ->schema([
                                    FileUpload::make('profile_picture')
                                        ->label('Profile Picture')
                                        ->nullable()
                                        ->image()
                                        ->directory('profiles')
                                        ->imagePreviewHeight('150'),
                                ]),
    
                            Section::make('HOD Info')
                                ->description('Information about the student’s Head of Department.')
                                ->schema([
                                    TextInput::make('hod_name')
                                        ->label('HOD Name')
                                        ->nullable(),
                                ]),
                        ]),
                ])
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Column for Name
                Tables\Columns\TextColumn::make('first_name')
                    ->label('First Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label('Last Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email Address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone Number')
                    ->searchable(),
    
                // Column for Department
                Tables\Columns\TextColumn::make('department')
                    ->label('Department')
                    ->sortable(), // Allow sorting by department
    
                // Column for Level
                Tables\Columns\TextColumn::make('level')
                    ->label('Level')
                    ->sortable(),
    
                // Column for CGPA
                Tables\Columns\TextColumn::make('cgpa')
                    ->label('CGPA')
                    ->sortable(),
    
                // Column for Gender
                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->sortable(),
    
                // Column for Matriculation Number
                Tables\Columns\TextColumn::make('matriculation_number')
                    ->label('Matriculation Number')
                    ->sortable(),
    
                // Column for Admission Year
                Tables\Columns\TextColumn::make('admission_year')
                    ->label('Admission Year')
                    ->sortable(),
    
                // Column for Graduation Year
                Tables\Columns\TextColumn::make('expected_year_of_graduation')
                    ->label('Expected Graduation Year')
                    ->sortable(),
            ])
            ->headerActions([
                Action::make('import')
                    ->label('Import Students')
                    ->icon('heroicon-o-folder-plus')
                    ->action(function () {
            
                        // Redirect to a specific route after the action is performed
                        return redirect()->route('student.import');
                    })
                    ->color('success'),
                    
                    Action::make('export')
                    ->label('Export All Students')
                    ->icon('heroicon-o-folder-arrow-down')
                    ->action(function () {
            
                        // Redirect to a specific route after the action is performed
                        return redirect()->route('student.import');
                    })
                    ->color('primary'),
                    // Define the button color
            ])
            ->filters([
                // Filter by Department
                SelectFilter::make('department')
                    ->label('Department')
                    ->options([
                        'HR' => 'HR',
                        'IT' => 'IT',
                        'Sales' => 'Sales',
                        'Marketing' => 'Marketing',
                        'Computer Science' => 'Computer Science',
                        'Software Engineering' => 'Software Engineering',
                    ]),
    
                // Filter by Level
                SelectFilter::make('level')
                    ->label('Level')
                    ->options([
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                    ]),
    
                // Filter by Gender
                SelectFilter::make('gender')
                    ->label('Gender')
                    ->options([
                        'Male' => 'Male',
                        'Female' => 'Female',
                        'Other' => 'Other',
                    ]),
    
                // Filter by Admission Year
                SelectFilter::make('admission_year')
                    ->label('Admission Year')
                    ->options([
                        '2021' => '2021',
                        '2022' => '2022',
                        '2023' => '2023',
                        '2024' => '2024',
                    ]),
    
                // Filter by Expected Year of Graduation
                SelectFilter::make('expected_year_of_graduation')
                    ->label('Expected Year of Graduation')
                    ->options([
                        '2025' => '2025',
                        '2026' => '2026',
                        '2027' => '2027',
                        '2028' => '2028',
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudents::route('/create'),
            'edit' => Pages\EditStudents::route('/{record}/edit'),
        ];
    }
}
