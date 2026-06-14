<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\SchoolClass;
use App\Models\QuestionSet;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Students', User::where('role', 'student')->count())
            ->description('Enrolled students')
             ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->icon('heroicon-o-academic-cap')
                ->color('info'),

            Stat::make('Total Teachers', User::where('role', 'teacher')->count())
                ->icon('heroicon-o-presentation-chart-line')
                ->color('success'),

            Stat::make('Total Exams', QuestionSet::count())
                ->icon('heroicon-o-document-text')
                ->color('warning'),

            Stat::make('Total Classes', SchoolClass::count())
                ->icon('heroicon-o-building-library')
                ->color('primary'),
        ];
    }
}
