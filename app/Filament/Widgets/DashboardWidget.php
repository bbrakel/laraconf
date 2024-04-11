<?php

namespace App\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class DashboardWidget extends Widget implements HasActions, HasForms
{
    use InteractsWithActions, InteractsWithForms;

    protected static string $view = 'filament.widgets.dashboard-widget';

    public function callNotification(): Action
    {
        return Action::make('callNotification')
            ->button()
            ->color('warning')
            ->label('send a notification')
            ->action(function () {
                Notification::make()
                    ->warning()
                    ->title('You send a notification')
                    ->body('This is a test')
                    ->send();
            });
    }
}
