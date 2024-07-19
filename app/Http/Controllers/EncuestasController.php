<?php

namespace App\Http\Controllers;

use App\Models\Encuestas;
use Inertia\Inertia;
use Illuminate\Http\Request;

class EncuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Encuestas', [
        ]);
    }


}
