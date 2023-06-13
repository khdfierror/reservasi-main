<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\System\Merek::class => \App\Policies\System\MerekPolicy::class,
        \App\Models\System\Brand::class => \App\Policies\System\BrandPolicy::class,
        \App\Models\System\Tipe::class => \App\Policies\System\TipePolicy::class,
        \App\Models\System\Tahunproduksi::class => \App\Policies\System\TahunproduksiPolicy::class,
        \App\Models\System\Warna::class => \App\Policies\System\WarnaPolicy::class,
        \App\Models\Service\Mobil::class => \App\Policies\Service\MobilPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
