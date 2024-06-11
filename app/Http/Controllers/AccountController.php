<?php

namespace App\Http\Controllers;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //アカウント一覧を表示する
    public function index(Request $request)
    {
        $title = 'アカウント一覧';

        $data = [
            [
                'name' => 'テストさん',
                'password' => '$3$3kdiei2',
            ],
            [
                'name' => '<h1>jobi</h1>',
                'password' => '$9$s#2kdie',
            ]
        ];

        //デバッグ

        //AccountControllerのindex関数に指定したIDを渡せる。※dd関数はデバッグ用表示
        //dd($request->account_id);

        //DebugBar::info('てりやきマックうまかった');
        //DebugBar::error('チキチー食べたい');

        //セッションに指定のキーで値を保存
        //$request->session()->put('key', 5);
        //$request->session()->put('key2', 8);

        //セッションから指定のキーの値を取得
        //$value = $request->session()->get('key');

        //DebugBar::info($value);

        //指定したデータをセッションから削除
        //$request->session()->forget('key');
        //$value = $request->session()->get('key');
        //DebugBar::info($value);

        //セッションの全てのデータを削除
        //$request->session()->flush();
        //$value = $request->session()->get('key2');
        //DebugBar::info($value);

        //セッションに指定したキーが存在するか
        if ($request->session()->exists('login')) {
            return view('accounts/index', ['title' => $title, 'accounts' => $data]);             //ビューに変数を渡す
        }
    }

    //ログイン画面表示
    public function login(Request $request)
    {
        return view('accounts/login');
    }

    //ログイン処理
    public function doLogin(Request $request)
    {
        if ($request['name'] === 'jobi' && $request['pass'] === 'jobi') {
            //セッションに指定のキーで値を保存
            $request->session()->put('login', true);

            return redirect('accounts/index');
        } else {
            $error = '名前もしくはパスワードに誤りがあります。';
            return view('accounts/login', ['error' => $error]);
        }
    }

    public function doLogout(Request $request)
    {
        //指定したデータをセッションから削除
        $request->session()->forget('login');

        return redirect('accounts/login');
    }
}
