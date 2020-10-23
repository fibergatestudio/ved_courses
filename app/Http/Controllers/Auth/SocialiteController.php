<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Socialite;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SocialiteController extends Controller
{
    public function redirect($provider, $signup = null)
    {
        if ($signup == 'signup') {
            Session::put('signup', 'signup');
        } else {
            Session::forget('signup');
        }
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $userInfo = Socialite::driver($provider)->user();
        $signup = Session::get('signup');
        if (isset($signup)) {
            //Registration
            if (!$userInfo) {
                return redirect()->route('register')->with('error', 'Помилка реєстрації. Повторіть реєстрацію.');
            }
            $user = User::where('provider_id', $userInfo->id)->first();
            $userWithEmail = User::where('email', $userInfo->getEmail())->first();
            if ($user or $userWithEmail) {
                return redirect()->route('login')->with('error', 'Користувач з таким обліковим записом уже зареєстрований. Увійдіть.');
            }
            //Добавляем пользователя - поумолчанию студент
            switch ($provider) {
                case 'google':
                    $user = User::create([
                        'name' => $userInfo['given_name'],
                        'surname' => $userInfo['family_name'],
                        'email' => $userInfo->getEmail(),
                        'provider' => $provider,
                        'provider_id' => $userInfo->getId(),
                        'role' => 'student',
                        'status' => 'confirmed'
                    ]);
                    break;

                case 'facebook':
                    $user = User::create([
                        'name' => $userInfo->getName(),
                        'email' => $userInfo->getEmail(),
                        'provider' => $provider,
                        'provider_id' => $userInfo->getId(),
                        'role' => 'student',
                        'status' => 'confirmed'
                    ]);
                    break;
            }
            // Создаем для него запись в стундентах
            $student_id = DB::table('students')->insertGetId(
                ['user_id' => $user->id, 'status' => 'confirmed',]
            );
            return redirect()->route('login.role', ['user_id' => $user->id, 'student_id' => $student_id]);
        } else {
            //Login
            $user = User::where('provider_id', $userInfo->id)->first();
            if (!$user) {
                return redirect()->route('login')->with('error', 'Користувача з таким обліковим записом не знайдено. Зареєструйтеся.');
            }
            auth()->login($user);
            return redirect()->to(RouteServiceProvider::HOME);
        }
    }

    public function role($user_id, $student_id)
    {
        return view('auth.role', compact('user_id', 'student_id'));
    }

    public function setRole($user_id, $student_id, Request $request)
    {
        $user = User::where('id', $user_id)->first();
        $role = $request['role'];
        switch ($role) {
            case 'student':
                break;
            case 'teacher':
                $user->role = 'teacher';
                $user->status = 'unconfirmed';
                $student = DB::table('students')->where('id', $student_id)->delete();
                DB::table('teachers')->insert(
                    [
                        'user_id' => $user_id,
                        'status' => 'unconfirmed',
                    ]
                );
                break;
            default:
                break;
        }
        auth()->login($user);
        return redirect()->to(RouteServiceProvider::HOME);
    }
}
