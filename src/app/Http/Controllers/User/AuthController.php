<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Http\Requests\User\AuthRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthRequest $authRequest): RedirectResponse
    {
        $validated = $authRequest->validated();

        return Auth::attempt($validated) ? redirect("/wines") : redirect()->route("user.login")->withInput()->withErrors(["auth" => "Auth Error"]); 
    }
}
