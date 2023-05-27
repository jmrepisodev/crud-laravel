<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): RedirectResponse
    { 
        Auth::logout();

        //Invalidamos la sesión actual y regeneramos el token
        $request->session()->invalidate();

        $request->session()->regenerateToken();
 
        return redirect('/');
     }
}
