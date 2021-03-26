<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;    // 追加

class MessagesController extends Controller
{
    // getでmessages/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        // メッセージ一覧を取得
        $messages = Message::all();

        // メッセージ一覧ビューでそれを表示
        return view('messages.index', [
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        //
        // メッセージ作成ビューを表示
    $message= new Message;
    
    return view('message.create',[
        'message' =>$message,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $message = new Message;
        $message->content = $request->content;
        $message->save();
        
         // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $message= Message::findOrFail($id);
        
        return view('message.show',[
            'message' => $message,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $message - Message::findOrFail($id);
        
        return view('message.edit',[
            'message =>$message',
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
          // idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        // メッセージを更新
        $message->content = $request->content;
        $message->save();
        
        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $message = Message::findOrFind($id);
        
        $message->delete();
        
        return redirect('/');
    }
}
