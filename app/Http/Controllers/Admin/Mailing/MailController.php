<?php

namespace App\Http\Controllers\Admin\Mailing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Mailing\SendRequest;
use App\Jobs\MailingJob;
use App\Models\HtmlTemplate;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MailController extends Controller
{
    public function index()
    {
        $users = User::all();

        $templates = collect(HtmlTemplate::orderBy('id', 'desc')->take(3)->get())->reverse();

        return view('admin.mailing.index', compact('users', 'templates'));
    }

    public function send(SendRequest $request)
    {
        $data = $request->validated();

        if ($data['user'] == 'all') {
            $usersSend = User::all();
        } else {
            $usersSend = $data['users'];
        }

        if (isset($data['html'])) {

            $htmlTitle = $data['html']->getClientOriginalName();
            $htmlPath = Storage::disk('public')->put('html', $data['html']);
            unset($data['html']);

            HtmlTemplate::create([
                'title' => $htmlTitle,
                'path' => $htmlPath,
            ]);

            $htmlSend = Storage::disk('public')->get($htmlPath);
        } else {
            $htmlSend = Storage::disk('public')->get($data['template']);
        }

        MailingJob::dispatch($htmlSend, $usersSend);

        $result = 'Письма успешно отправлены!';
        return view('admin.mailing.send', compact('result'));
    }

    public function delete($template)
    {
        $template = HtmlTemplate::find($template);
        $template->delete();
        Storage::disk('public')->delete($template->path);

        $result = 'Шаблон успешно удален';
        return view('admin.mailing.send', compact('result'));
    }
}
