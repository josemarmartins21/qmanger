<?php

namespace App\Http\Controllers;

use App\Services\home\HomeService;
use App\Services\plans\PlanService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct(
        private HomeService $home,
    )
    {
        $this->home = new HomeService();
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $queries = [
            'total_assinaturas_activa' => $this->home->totActiveSignatures(),
            'receita_do_mes' => $this->home->monthRecipe(),
            'municipio_com_mais_clientes' => $this->home->municipioComMaiorNumeroDeContas(),
            'assinaturas_por_activar' => $this->home->totSignaturesToActive(),
            'top_plans' => PlanService::getTopPlans(),
        ];
        return view('welcome', compact('queries'));
    }
}
