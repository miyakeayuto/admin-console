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
        } else {
            return view('accounts/login');
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

        return redirect('/');
    }

    //プレイヤーリスト
    public function playerList(Request $request)
    {
        $players = [
            [
                'id' => 1,
                'name' => 'soruteiiiiiiiiii',
                'level' => 30,
                'experience_point' => 60,
                'life' => 50
            ],
            [
                'id' => 2,
                'name' => 'miyake',
                'level' => 10,
                'experience_point' => 99,
                'life' => 75
            ],
            [
                'id' => 3,
                'name' => '汐',
                'level' => 90,
                'experience_point' => 1,
                'life' => 100
            ]
        ];

        //セッションに指定したキーが存在するか
        if ($request->session()->exists('login')) {
            return view('accounts/player', ['players' => $players]);             //ビューに変数を渡す
        } else {
            return view('accounts/login');
        }
    }

    //プレイヤーリスト
    public function itemList(Request $request)
    {
        $items = [
            [
                'id' => 1,
                'name' => '回復薬グレート',
                'type' => '消耗品',
                'effect' => 60,
                'info' => 'ライフを回復する。回復薬より回復量が多い。'
            ],
            [
                'id' => 2,
                'name' => '秘薬',
                'type' => '消耗品',
                'effect' => 100,
                'info' => '体力を全回復する。'
            ],
            [
                'id' => 3,
                'name' => 'エンプレスグリーヴ',
                'type' => '装備品',
                'effect' => 80,
                'info' => '炎妃龍の青き炎を封じ込めた脚用装備。その内には炎妃龍の青き炎が封じられている。'
            ],
            [
                'id' => 4,
                'name' => 'ドラゴンヘッド',
                'type' => '装備品',
                'effect' => 100,
                'info' => '黒龍の唸りを思い起こさせる頭用装備。いもしない黒龍の視線に怯え狂死した使用者も。'
            ]
        ];

        //セッションに指定したキーが存在するか
        if ($request->session()->exists('login')) {
            return view('accounts/item', ['items' => $items]);             //ビューに変数を渡す
        } else {
            return view('accounts/login');
        }
    }

    //プレイヤーリスト
    public function have_ItemList(Request $request)
    {
        $have_items = [
            [
                'id' => 1,
                'player_name' => 'soruteiiiiiiiiii',
                'item_name' => '回復薬グレート',
                'possession' => 10,
            ],
            [
                'id' => 2,
                'player_name' => 'miyake',
                'item_name' => '秘薬',
                'possession' => 2,
            ],
            [
                'id' => 3,
                'player_name' => '汐',
                'item_name' => 'エンプレスグリーヴ',
                'possession' => 1,
            ],
            [
                'id' => 4,
                'player_name' => '汐',
                'item_name' => 'ドラゴンヘッド',
                'possession' => 1,
            ]
        ];

        //セッションに指定したキーが存在するか
        if ($request->session()->exists('login')) {
            return view('accounts/have_item', ['have_items' => $have_items]);             //ビューに変数を渡す
        } else {
            return view('accounts/login');
        }
    }
}
