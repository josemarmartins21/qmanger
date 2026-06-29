<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Requests\plans\PlanRequest;
use App\Http\Requests\plans\PlanUpdateRequest;
use App\Models\Plan;
use App\Observers\plans\LoggerObserver;
use App\Services\plans\contracts\PlanInterface;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use InvalidArgumentException;
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

    public function create()
    {
        return view('plans.create');
    }

    public function edit(Plan $plan)
    {
        return view('plans.edit', compact('plan'));
    }

    public function update(Plan $plan, PlanUpdateRequest $request)
    {
        try {
            $validated = $request->validated();

            $this->plan->update($plan, $validated);
            return redirect()
            ->back()
            ->withInput()
            ->with('success', 'Plano actualizado com sucesso!');

        } catch (\Exception $e) {
            return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Erro ao actualizar o plano, tente novamente. ' . $e->getMessage());
        }
    }

    public function store(PlanRequest $request)
    {
        
        try {
            $validated = $request->validated();
    
            $this->plan->save($validated);
    
            return redirect()
            ->route('plans.index')
            ->with('success', 'Plano criado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Erro ao registar o plano, tente novamente. ' . $e->getMessage());
        }
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
