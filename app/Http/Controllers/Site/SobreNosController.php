<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Models\SobreNos;

class SobreNosController extends Controller
{
  public function sobre()
  {
    $sobreNos = SobreNos::with(['imagens', 'integrantes'])->first();

    if (!$sobreNos) {
      $sobreNos = new SobreNos(SobreNos::defaults());
      $sobreNos->setRelation('imagens', collect());
      $sobreNos->setRelation('integrantes', collect());
    }

    return view('site.sobre.sobre', compact('sobreNos'));
  }
}
