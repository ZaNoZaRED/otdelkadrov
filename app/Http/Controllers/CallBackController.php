<?php

namespace App\Http\Controllers;
use App\Models\Specialization;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationSubmitted;
use Illuminate\Http\Request;
use App\Mail\CallBackSubmitted;

class CallBackController extends Controller
{
    public function storeCall(Request $request)
    {
        $callData = [
            'callname' => $request->input('callname'), // Получаем имя
            'callsurname' => $request->input('callsurname'), // Получаем фамилию
            'callphone' => $request->input('callphone'), // Получаем телефон
        ];
        // Отправка почты
        Mail::to('zanozared228@gmail.com')->send(new CallBackSubmitted($callData));
        Mail::to('ok.116@mail.ru')->send(new ApplicationSubmitted($mailData));
        return redirect()->back()->with('success', 'Заявка успешно отправлена!');
        
    }
    public function index()
    {
        $specializations = Specialization::all(); // Получаем все специальности
        return view('index', compact('specializations'));
    }
}
