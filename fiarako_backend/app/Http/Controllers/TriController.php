<?php

namespace App\Http\Controllers;

use App\Models\Tri;
use Illuminate\Http\Request;

class TriController extends Controller
{
  // Méthode pour obtenir toutes les transmissions
  public function index()
  {
      $modeles = Tri::all();
      return response()->json($modeles);
  }
}
