<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Http\Requests\ValidatedCurrencyRequest;
use App\Services\CurrencyRepositoryInterface;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::denies('create')) {
            return redirect()->route('home');
        }

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
        if (Gate::denies('create')) {
            return redirect()->route('home');
        }

        $this->currencyRepository->create($request);

        return redirect()->route('currency-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        return view('currency.currency', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        if (Gate::denies('update', $currency)) {
            return redirect()->route('home');
        }

        return view('currency.currency-update', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ValidatedCurrencyRequest  $request
     * @param  Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatedCurrencyRequest $request, Currency $currency)
    {
        if (Gate::denies('update', $currency)) {
            return redirect()->route('home');
        }

        $updatedCurrency = $this->currencyRepository->update($request, $currency);

        return redirect(route('currencies.show', $updatedCurrency->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Currency $currency
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Currency $currency)
    {
        if (Gate::denies('delete', $currency)) {
            return redirect('/');
        }

        $this->currencyRepository->delete($currency);

        return redirect('currencies');
    }
}
