<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\NotificationHelpers;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(){

        return view('auth.login');
    }

    public function authentication(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $tenantID = DB::table('tenant_user')->where('user_id',auth()->user()->id)->first();
            if($tenantID == null){
                return redirect('onboardWizard');
            }
            $tenant= DB::table('tenants')->where('id',$tenantID->tenant_id)->first();
        $mainDomain = str_replace('://' , '://' . $tenant->subdomain . '.' , config('app.url'));
        $users = auth()->user();

        $message = "Berhasil Login Melalui \n{$request->server('HTTP_USER_AGENT')}";
        NotificationHelpers::sendNotification($users,$message);
        return redirect ($mainDomain)->with('session','Berhasil Login');
        };

        }
}
