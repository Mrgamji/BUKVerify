<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\Action;


use App\Filament\Resources\OrganizationResource\Pages;
use App\Filament\Resources\OrganizationResource\RelationManagers;
use App\Mail\RejectedMail;
use App\Mail\VerifiedMail;
use App\Models\Organization;

use Filament\Forms;
use Filament\Forms\Components\Actions;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrganizationResource extends Resource
{
    protected static ?string $model = Organization::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationGroup = 'Organizations/Institutions Management';
    protected static ?string $label = 'Organizations/Institutions';


public static function form(Form $form): Form
{
    return $form
        ->schema([
            Tabs::make('Application Details')
                ->tabs([
                    Tabs\Tab::make('Personal Info')
                        ->schema([
                            Section::make('Basic Information')
                                ->description('Enter the applicant’s personal details.')
                                ->schema([
                                    TextInput::make('name')
                                        ->label('Organization/Institution Name')
                                        ->required()
                                        ->autofocus(),

                                        TextInput::make('organization_access_code')
                                        ->label('Access Code')
                                        ->hidden()
                                        ->unique(Organization::class, 'organization_access_code', ignorable: fn ($record) => $record)
                                        ->default(function() {
                                            $accessCode = strtoupper(\Illuminate\Support\Str::random(10));
                                            while (Organization::where('organization_access_code', $accessCode)->exists()) {
                                                $accessCode = strtoupper(\Illuminate\Support\Str::random(10));
                                            }
                                            return $accessCode;
                                        }),
                                        

                                    TextInput::make('email')
                                        ->email()
                                        ->label('Work Email Address')
                                        ->required(),

                                    TextInput::make('phone')
                                        ->tel()
                                        ->label('Official Phone Number'),

                                    Textarea::make('address')
                                        ->label('Organization/Institution Address')
                                        ->rows(3),
                                ])
                                ->columns(2),
                        ]),

                    Tabs\Tab::make('Certificate Info')
                        ->schema([
                            Section::make('Certificate Details')
                                ->description('Enter and upload certificate-related documents.')
                                ->schema([
                                    TextInput::make('certificate_number')
                                        ->label('Certificate Number (CAC/NUC/SUBEB/ etc)')
                                        ->required(),

                                    FileUpload::make('certificate_picture')
                                        ->label('Upload Certificate')
                                        ->image()
                                        ->directory('certificates')
                                        ->imagePreviewHeight('150'),

                                    FileUpload::make('application_letter_picture')
                                        ->label('Upload Application Letter (On Letter Head)')
                                        ->image()
                                        ->directory('application_letters')
                                        ->imagePreviewHeight('150'),
                                ])
                                ->columns(2),
                        ]),
                ])
                ->columnSpanFull()
        ]);
}



public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('name')
                ->label('Full Name')
                ->searchable()
                ->sortable(),

            TextColumn::make('email')
                ->label('Email')
                ->searchable()
                ->sortable(),

            TextColumn::make('phone')
                ->label('Phone')
                ->toggleable()
                ->searchable(),

            TextColumn::make('certificate_number')
                ->label('Certificate No.')
                ->toggleable()
                ->sortable(),

            TextColumn::make('organization_access_code')
                ->label('Access Code')
                ->searchable()
                ->sortable(),

            TextColumn::make('created_at')
                ->label('Submitted At')
                ->dateTime()
                ->toggleable()
                ->sortable(),
        ])
        ->filters([
            // Optional filters can go here
        ])
        ->headerActions([
            Action::make('import')
                ->label('Import Organizations')
                ->icon('heroicon-o-folder-plus')
                ->action(function () {
        
                    // Redirect to a specific route after the action is performed
                    return redirect()->route('organization.import');
                })
                ->color('success'),
                
                Action::make('export')
                ->label('Export All Organizations')
                ->icon('heroicon-o-folder-arrow-down')
                ->action(function () {
        
                    // Redirect to a specific route after the action is performed
                    return redirect()->route('organization.import');
                })
                ->color('primary'),
                // Define the button color
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
            Tables\Actions\ViewAction::make(),
            Action::make('verify')
                ->label('Verify')
                ->icon('heroicon-o-check-badge')
                ->color('success')
                ->visible(fn ($record) => $record->status!='verified') // only show if not verified
                ->requiresConfirmation()
                ->action(function ($record) {
                    try {
                        // Update status
                        $record->status = 'verified';
                        $record->save();
                
                        // Send verification email
                        Mail::to($record->email)->send(new VerifiedMail($record));
                    } catch (\Exception $e) {
                        // Log the error for debugging
                        Log::error('Verification Mail Error: ' . $e->getMessage());
                
                        // Optionally, notify the admin or user
                        session()->flash('error', 'Verification completed but email could not be sent.');
                    }
                })
                ->successNotificationTitle('School verified successfully'),
                Action::make('reject')
    ->label('Reject')
    ->icon('heroicon-o-x-circle')
    ->color('danger')
    ->visible(fn ($record) => $record->status != 'rejected')
    ->requiresConfirmation()
    ->action(function ($record) {
        try {
            // Update status
            $record->status = 'rejected';
            $record->save();
    
            // Send verification email
            Mail::to($record->email)->send(new RejectedMail($record));
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Verification Mail Error: ' . $e->getMessage());
    
            // Optionally, notify the admin or user
            session()->flash('error', 'Verification completed but email could not be sent.');
        }
    })
    ->successNotificationTitle('School rejected successfully'),

        ]) 

            
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ])
        ;
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
            'index' => Pages\ListOrganizations::route('/'),
            'create' => Pages\CreateOrganization::route('/create'),
            'edit' => Pages\EditOrganization::route('/{record}/edit'),
        ];
    }
}