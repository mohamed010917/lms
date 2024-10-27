<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Models\Contracts\HasAvatar;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Navigation\MenuItem;
use App\Filament\Pages\Settings;
use App\Http\Middleware\admin ;
class AdminPanelProvider extends PanelProvider  implements FilamentUser , HasAvatar
{
    
    public function canAccessPanel(Panel $panel): bool
    {
        return false;
    }
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->image;
    }
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    public function panel(Panel $panel): Panel
    {
        return $panel
        ->userMenuItems([
            MenuItem::make()
                ->label('Settings')
                ->icon('heroicon-o-cog-6-tooth')
                
                ])

            ->id('admin')
            ->path('admin')
            ->colors([
                'primary' => Color::Amber,
            ])
            
            ->discoverResources(in: app_path('Filament/Admin/Resources'), for: 'App\\Filament\\Admin\\Resources')
            ->discoverPages(in: app_path('Filament/Admin/Pages'), for: 'App\\Filament\\Admin\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            // ->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\\Filament\\Admin\\Widgets')
         
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->brandName('Lerning')
            // ->favicon(asset('images/favicon.png'))
            ->authMiddleware([
                Authenticate::class,
                admin::class,
            ])->authGuard("admin")->login()->default() 
            ->widgets([
                \App\Filament\admin\Widgets\dashbordStat::class,
                \App\Filament\admin\Widgets\chart::class,
                \App\Filament\Widgets\opside::class,
            ])
      ;
    }
}
