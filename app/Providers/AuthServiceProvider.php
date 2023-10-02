<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //đăng ký các chính sách (policies) bảo mật cho các đối tượng trong ứng dụng
        $this->registerPolicies();
        
        Gate::define('view-admin', function($user){
            // echo $user->role;
            // return $user != null && $user->role == 'admin';
            if($user->role == "admin"){
                return true;
            }
            return false;
        });
        Gate::define('view-user', function($user){
            // echo $user->role;
            // return $user != null;
            if($user->role == "user"){
                return true;
            }
            return false;
        });
    }
}
