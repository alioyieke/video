<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Clients', Client::all()->count())
                ->label('Clients')
                ->icon('heroicon-o-user-group')
                ->color('primary'),

            Stat::make('Total Projects', Project::all()->count())
                ->label('Projects')
                ->icon('heroicon-o-briefcase')
                ->color('success'),

            Stat::make('Total Services', Service::all()->count())
                ->label('Services')
                ->icon('heroicon-o-cog')
                ->color('warning'),
        ];
    }
}
