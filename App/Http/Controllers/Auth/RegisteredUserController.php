<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    session([
        'register_data' => [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ],
    ]);

    return redirect()->route('register.role');
}
    public function showRoleStep(): View
{
    return view('auth.register-role');
}


    public function storeRole(Request $request): RedirectResponse
{
    $request->validate([
        'role' => ['required', 'in:employee,employer'],
    ]);

    $data = session('register_data');

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => $request->role,
    ]);

    if ($request->role === 'employee') {
        $user->employeeProfile()->create([]);
    } else {
        $user->employerProfile()->create([]);
    }

    event(new Registered($user));

    Auth::login($user);

    session()->forget('register_data');

    return redirect()->route('register.complete');
}
    


public function showCompleteStep(): View
{
    return view('auth.register-complete');
}
}
