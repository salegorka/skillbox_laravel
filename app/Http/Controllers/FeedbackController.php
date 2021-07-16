<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        return view('admin.feedback', ['feedbacks' => $feedbacks]);
    }

    public function create()
    {
        return view('contacts');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $feedback = new Feedback();
        $feedback->email = $data['email'];
        $feedback->message = $data['message'];
        $feedback->save();
        return view('contacts', ['success' => 'Отзыв успешно отправлен']);
    }
}
