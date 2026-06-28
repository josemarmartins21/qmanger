<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Observers\plans\LoggerObserver;
use App\Services\plans\contracts\PlanInterface;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use LogicException;

class PlanController extends Controller
{
    public function __construct(
        private PlanInterface $plan,
    )
    {
        
    }
    public function index()
    {
        $plans = $this->plan->getAll();
        return view('plans.index', compact('plans'));
    }

    public function destroy(Plan $plan)
    {
        try {
            
            $this->plan->addObservers(new LoggerObserver);
            
            $this->plan->delete($plan);

            return redirect()->back()->with('success', 'Registro eliminado com sucesso!');

        } catch (LogicException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
