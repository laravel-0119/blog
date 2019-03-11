<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\FeedbackMail;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function processPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50|min:2',
            'email' => 'required|max:255|email',
            'message' => 'required|max:10240|min:10',
        ]);

        try {
            Mail::to('dmitrii@iurev.ru')
                ->cc('yurev@ntschool.ru')
                ->send(new FeedbackMail($request->all()));

            Log::info('Mail was sent', ['data' => $request->all()]);
        } catch (\Exception $e) {
            Log::error('Mail was not sent', [
                'data' => $request->all(),
                'trace' => $e->getTraceAsString(),
                'error' => $e->getMessage()]);
        }

        return response()->json(['status' => 'OK']);
    }
}
