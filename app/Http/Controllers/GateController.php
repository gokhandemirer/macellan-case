<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gate\OpenGateRequest;
use Illuminate\Http\Request;

class GateController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'verified.hash'
        ]);
    }

    public function openGate(OpenGateRequest $request)
    {

    }
}
