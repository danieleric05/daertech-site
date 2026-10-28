<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Routing\Controllers\HasMiddleware;

class MessageController extends Controller implements HasMiddleware
{
    use AuthorizesResource;

    private const MODEL = ContactMessage::class;

    private const PARAM = 'message';

    public function index()
    {
        return view('admin.messages.index', ['messages' => ContactMessage::latest('id')->paginate(20)]);
    }

    public function show(ContactMessage $message)
    {
        $message->read_at ??= now();
        $message->save();

        return view('admin.messages.show', compact('message'));
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Message supprimé.');
    }
}
