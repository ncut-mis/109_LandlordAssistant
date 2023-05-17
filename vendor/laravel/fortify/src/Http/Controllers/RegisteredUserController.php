<?php

namespace Laravel\Fortify\Http\Controllers;
use App\Models\House;
use App\Models\Owner;
use App\Models\Renter;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;

class RegisteredUserController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Show the registration view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\RegisterViewResponse
     */
    public function create(Request $request): RegisterViewResponse
    {
        return app(RegisterViewResponse::class);
    }

    /**
     * Create a new registered user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\CreatesNewUsers  $creator
     * @return \Laravel\Fortify\Contracts\RegisterResponse
     */
    public function store(Request $request,
                          CreatesNewUsers $creator): RegisterResponse
    {
        event(new Registered($user = $creator->create($request->all())));

        $this->guard->login($user);
        
        Owner::create([
            'user_id' => $user->id,
            // 其他欄位
        ]);


        Renter::create([
            'user_id' => $user->id,
            // 其他欄位
        ]);

        return app(RegisterResponse::class);
    }
}
