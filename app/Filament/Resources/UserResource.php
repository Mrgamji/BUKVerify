<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Admins Management';
    protected static ?string $navigationLabel = 'Admins';
    protected static ?string $label = 'Admins';

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-vertical';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('Admin Details')
                ->tabs([
                    Tab::make('Admin Info')
                        ->schema([
                            Section::make('Admin Information')
                                ->schema([
                                    TextInput::make('name')
                                        ->label('Full Name')
                                        ->required()
                                        ->autofocus()
                                        ->maxLength(255),

                                    TextInput::make('email')
                                        ->label('Email Address')
                                        ->email()
                                        ->required()
                                        ->unique(table: 'users'),  // Ensure email is unique

                                    TextInput::make('password')
                                            ->password()
                                            ->revealable(),


                                    Select::make('role')
                                        ->label('Role')
                                        ->options([
                                            'admin' => 'Admin',
                                            'super_admin' => 'Super Admin',
                                        ])
                                        ->required(),
                                ])
                        ]),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('name')
                ->label('Full Name')
                ->sortable()
                ->searchable(),

            TextColumn::make('email')
                ->label('Email Address')
                ->sortable()
                ->searchable(),

            TextColumn::make('role')
                ->label('Role')
                ->badge()
                ->colors([
                    'primary' => 'admin',
                    'success' => 'super_admin',
                ])
                ->sortable(),
        ])
        ->filters([
            // Filters to allow filtering by roles
            Tables\Filters\SelectFilter::make('role')
                ->label('Role')
                ->options([
                    'admin' => 'Admin',
                    'super_admin' => 'Super Admin',
                ])
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
