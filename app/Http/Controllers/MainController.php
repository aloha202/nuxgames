<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home()
    {
        return redirect()->route('login');
    }

    public function login()
    {
        return view('login');
    }
    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->fill($request->validated());
        $user->token = hash('sha256', $user->username . time());
        $user->starts_at = now();
        $user->save();

        session()->put('link' , url()->route('authorize', ['token' => $user->token]));

        return redirect()->route('link');
    }

    public function link()
    {
        if (!session()->has('link')) {
            abort(404, 'Page not found');
        }
        return view('link', ['link' => session('link')]);
    }

    public function authorize($token)
    {
        $user = User::whereToken($token)->first();
        if (null === $user || $user->status !== User::STATUS_ACTIVE) {
            abort(404, 'Page not found');
        }

        Auth::login($user);

        return redirect()->route('page');
    }

    public function page()
    {
        return view('page');
    }

    public function refresh()
    {
        $user = Auth::user();
        $user->starts_at = now();
        $user->save();

        return redirect()->back()->with('success', 'Token refreshed');
    }

    public function deactivate()
    {
        $user = Auth::user();
        $user->status = User::STATUS_INACTIVE;
        $user->save();

        Auth::logout();

        return redirect()->route('home');
    }

    public function lucky()
    {
        $randomNumber = random_int(1, 1000);

        $success = $this->isSuccess($randomNumber);
        $result = 'failed';
        $message = sprintf('Lose - %s', $randomNumber);

        $sum = null;

        if ($success) {
            $sum = $this->getSum($randomNumber);
            $result = 'success';
            $message = sprintf('Win - %s - $%s', $randomNumber, $sum);
        }

        $history = new History();
        $history->fill([
            'type' => $result === 'success' ? 'Win' : 'Lose',
            'number' => $randomNumber,
            'amount' => $sum,
            'user_id' => Auth::id(),
        ]);
        $history->save();

        return redirect()->back()->with($result, $message);
    }

    public function history()
    {
        $histories = History::whereUserId(Auth::id())->orderByDesc('created_at')->limit(3)->get();
        return view('history', ['histories' => $histories]);
    }

    /**
     * @param int $randomNumber
     * @return string
     * @php-tt-assert 200 >>> '20.00'
     * @php-tt-assert 400 >>> '120.00'
     * @php-tt-assert 700 >>> '350.00'
     * @php-tt-assert 1000 >>> '700.00'
 */
    protected function getSum(int $randomNumber): string
    {
        $sum = $randomNumber * 0.1;
        if ($randomNumber > 300) {
            $sum = $randomNumber * 0.3;
        }
        if ($randomNumber > 600) {
            $sum = $randomNumber * 0.5;
        }
        if ($randomNumber > 900) {
            $sum = $randomNumber * 0.7;
        }
        $sum = number_format($sum, 2, '.', '');

        return $sum;
    }

    /**
     * @param int $randomNumber
     * @return bool
     * @php-tt-assert 51 >>> false
     * @php-tt-assert 2222 >>> true
     */
    protected function isSuccess(int $randomNumber): bool
    {
        return $randomNumber % 2 === 0;
    }
}
