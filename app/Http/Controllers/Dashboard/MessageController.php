<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('dashboard.messages.index', compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     * (Typically called from the public contact form)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        Message::create($request->all());

        flash()->addSuccess('Message sent successfully');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return view('dashboard.messages.show', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();

        flash()->error('Message deleted successfully');
        return redirect()->route('messages.index');
    }
}
