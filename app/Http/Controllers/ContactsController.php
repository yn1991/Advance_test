<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;


class ContactsController extends Controller
{
    public function index(Request $request)
    {
        // 入力ページを表示
        return view('contact.index');
    }

    public function confirm(Request $request)
    {
        // バリデーションルールを定義
        // 引っかかるとエラーを起こしてくれる
        $request->validate([
        'your_last_name' => 'required|max:25',
        'your_first_name' => 'required|max:25',
        'email' => 'required|email',
        'zip_code' => 'required|regex:/^\d{3}-\d{4}$/|max:8',
        'address' => 'required',
        'contact' => 'required|max:120',
        ]);

        // フォームからの入力値を全て取得
        $inputs = $request->all();

        // 確認ページに表示
        // 入力値を引数に渡す
        return view('contact.confirm', [
        'inputs' => $inputs,
        ]);
    }

    public function send(Request $request)
    {

        // actionの値を取得
        $action = $request->input('action');

        // action以外のinputの値を取得
        $inputs = $request->except('action');

        //actionの値で分岐
        if($action !== 'submit'){

            // 戻るボタンの場合リダイレクト処理
            return redirect()
            ->route('contact.index')
            ->withInput($inputs);

        } else {

            $contact = new Contact();

            $contact->fullname = $request->fullname;
            $gender = $request->input('gender') === 'Female' ? 2 : 1;
            $contact->gender = $gender;
            $contact->email = $request->email;
            $contact->postcode = $request->zip_code;
            $contact->address = $request->address;
            $contact->building_name = $request->building_name;
            $contact->opinion = $request->contact;

            $contact->save();

            // 入力ページを表示
            return view('contact.thanks');

        }

    }

    public function admin()
    {
        $contacts = Contact::paginate(10);

        // 入力ページを表示
        return view('contact.admin', ['contacts' => $contacts]);

    }

    public function find()
    {
            return view('contact.find', [
        'input' => '',
        'contact' => null, // 初期値として null を設定
    ]);
    }

    public function search(Request $request)
    {
        $contacts = Contact::where('fullname', 'LIKE BINARY',"%{$request->input('your_full_name')}%")->get();
        $params = [
            'input' => $request->input,
            'contacts' => $contacts
        ];
        return view('contact.find', $params);
    }

}
