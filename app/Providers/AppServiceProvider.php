<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->app->singleton(LoginResponse::class, function () {
            return new class implements LoginResponse {
                public function toResponse($request)
                {
                    $user = auth()->user();

                    if ($user->role == 'admin') {
                        return redirect('/admin');
                    } elseif ($user->role == 'petugas') {
                        return redirect('/petugas');
                    } else {
                        return redirect('/peminjam');
                    }
                }
            };
        });
    }
}