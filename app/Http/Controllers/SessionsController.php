<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->session()->has('1'))
        {
            // 問題用セッションを設定
            // 本来はデータベースから問題データを取得する
            // これはサンプルなので、直接問題を登録
            $request->session()->put('1','apple,リンゴ');
            $request->session()->put('2','orange,オレンジ');
            $request->session()->put('3','watermelon,スイカ');
        }

        // 現在何問目か
        if (is_null($request->next_pos))
        {
            // 指定が無ければ1問目とする
            $quizu_index = '1';
        }
        else
        {
            $quizu_index = $request->next_pos;
        }

        // 次の問題リンクパラメータ
        $next_pos = (int)$quizu_index + 1;

        // セッションから問題データを1つ取得
        $mondai_string = $request->session()->get($quizu_index);

        // カンマ句切なのでバラす
        $mondai_array = explode(",", $mondai_string);

        return view('play', [
            'quizu_index' => $quizu_index,
            'next_pos' => $next_pos,
            'mondai' => $mondai_array[0],
            'answer' => $mondai_array[1]
        ]);
    }
}
