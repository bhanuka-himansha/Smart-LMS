<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notify[] = ['info', 'Document vault will be available in next update, stay tuned!'];
        return redirect()->route('student.dashboard')->withNotify($notify);
        // return view('document.index');
    }
}
