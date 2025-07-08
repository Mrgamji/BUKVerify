<?php

namespace App\Filament\Widgets;

use App\Models\Organization;
use App\Models\Staff;
use App\Models\Students;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OverviewChart extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Organization', Organization::count())
                ->description('Total number of organizations')
                ->descriptionIcon('heroicon-o-users')
                ->descriptionColor('success')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success')
                 ->icon('heroicon-o-users'),
            Stat::make('Total Staff', Staff::count())
                ->description('Total number of staff')
                ->descriptionIcon('heroicon-o-users')
                ->descriptionColor('success')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success')
                ->icon('heroicon-o-users'),
            Stat::make('Total Students', Students::count())
                ->description('Total number of students')
                ->descriptionIcon('heroicon-o-users')
                ->descriptionColor('success')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success')
                ->icon('heroicon-o-users'),
            Stat::make('Admins', User::count())
                 ->description('Total number of admins')
                ->descriptionIcon('heroicon-o-users')
                ->descriptionColor('success')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success')
                ->icon('heroicon-o-users')
        ];
    }
}
