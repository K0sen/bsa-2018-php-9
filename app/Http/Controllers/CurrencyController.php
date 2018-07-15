<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatedCurrencyRequest;
use App\Services\CurrencyRepositoryInterface;

class CurrencyController extends Controller
{
    private $currencyRepository;

    /**
     * CurrencyController constructor.
     * @param CurrencyRepositoryInterface $currencyRepository
     */
    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = $this->currencyRepository->findAll();

        return view('currency.currency-list', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('currency.currency-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ValidatedCurrencyRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ValidatedCurrencyRequest $request)
    {
        $this->currencyRepository->create($request);

        return redirect(route('currencies.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currency = $this->currencyRepository->findById($id);
        if (!$currency) {
            abort(404);
        }

        return view('currency.currency', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = $this->currencyRepository->findById($id);
        if (!$currency) {
            abort(404);
        }

        return view('currency.currency-update', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatedCurrencyRequest $request, $id)
    {
        $currency = $this->currencyRepository->findById($id);
        if (!$currency) {
            abort(404);
        }

        $updatedCurrency = $this->currencyRepository->update($request, $currency);

        return redirect(route('currencies.show', $updatedCurrency->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->currencyRepository->delete($id);

        return redirect('currencies');
    }
}
