<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function authenticate(): void
    // {
    //     $this->ensureIsNotRateLimited();

    //     if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
    //         RateLimiter::hit($this->throttleKey());

    //         throw ValidationException::withMessages([
    //             'email' => trans('auth.failed'),
    //         ]);
    //     }

    //     RateLimiter::clear($this->throttleKey());
    // }


    // Function check role
    //Hàm này làm việc với một đối tượng LoginRequest
    public function authenticate(): void
    {
        //đảm bảo rằng người dùng không bị giới hạn tần suất (rate-limited) trong việc đăng nhập.
        $this->ensureIsNotRateLimited();

        // Get user by email
        $user = User::where('email', $this->email)->first();

        // Check if user exists and has admin role
        if (!$user || $user->role !== 'admin') {
            RateLimiter::hit($this->throttleKey());
            //Kiểm tra user có tồn tại không và có role là admin không
            // Nếu không tồn tại hoặc không có quyền hạn, hàm sẽ tăng số lần thử đăng nhập bị giới hạn tần suất và ném ra một ngoại lệ ValidationException với thông báo lỗi.
            throw ValidationException::withMessages([
                'email' => trans('You do not have permission to access this site.'),
            ]);
        }
        
        // Authenticate user (xác thực email password của user) -> nếu sai ném ra ngoại lệ và tăng số lần thử đăng nhập bị giới hạn
        if (!Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('Wrong password.'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }



    //Auth for user
    public function authenticate_user(): void
    {
        //đảm bảo rằng người dùng không bị giới hạn tần suất (rate-limited) trong việc đăng nhập.
        $this->ensureIsNotRateLimited();

        // Get user by email
        $user = User::where('email', $this->email)->first();

        // Check if user exists and has admin role
        if (!$user || $user->role !== 'user') {
            RateLimiter::hit($this->throttleKey());
            //Kiểm tra user có tồn tại không và có role là admin không
            // Nếu không tồn tại hoặc không có quyền hạn, hàm sẽ tăng số lần thử đăng nhập bị giới hạn tần suất và ném ra một ngoại lệ ValidationException với thông báo lỗi.
            throw ValidationException::withMessages([
                'email' => trans('Login forr user, Pleaser use account of user.'),
            ]);
        }
        
        // Authenticate user (xác thực email password của user) -> nếu sai ném ra ngoại lệ và tăng số lần thử đăng nhập bị giới hạn
        if (!Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('Wrong password.'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }





    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')) . '|' . $this->ip());
    }
}
