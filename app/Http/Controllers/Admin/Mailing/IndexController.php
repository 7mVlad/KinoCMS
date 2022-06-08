<?php

namespace App\Http\Controllers\Admin\Mailing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Mailing\SendRequest;
use App\Jobs\MailingJob;
use App\Models\HtmlTemplate;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::all();

        $templates =  collect(HtmlTemplate::orderBy('id', 'desc')->take(3)->get())->reverse();

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
            $htmlPath = Storage::put('/public/html', $data['html']);
            unset($data['html']);

            HtmlTemplate::create([
                'title' => $htmlTitle,
                'path' => $htmlPath,
            ]);

            $htmlSend = Storage::get($htmlPath);
        } else {
            $htmlSend = Storage::get($data['template']);
        }

        MailingJob::dispatch($htmlSend, $usersSend);

        $result = 'Все успешно отправлено';
        return view('admin.mailing.send', compact('result'));
    }

    public function delete($template)
    {
        $template = HtmlTemplate::find($template);
        $template->delete();
        Storage::delete($template->path);

        $result = 'Шаблон успешно удален';
        return view('admin.mailing.send', compact('result'));

    }
}
