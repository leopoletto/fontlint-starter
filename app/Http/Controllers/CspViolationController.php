<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CspViolationController extends Controller
{
    public function __invoke(Request $request): Response
    {
        Log::warning('CSP Violation Header', [
            'headers' => $request->headers->all(),
            'body' => $request->all(),
        ]);

        return response()->noContent();
    }
}
