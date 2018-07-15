<?php

namespace App\Services;

use App\Currency;
use App\Http\Requests\ValidatedCurrencyRequest;
use Illuminate\Database\Eloquent\Collection;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return Currency::all();
    }

    /**
     * @param $id
     * @return Currency|null
     */
    public function findById($id): ?Currency
    {
        return Currency::find($id);
    }

    /**
     * @param int $id
     * @throws \Exception
     */
    public function delete(int $id): void
    {
        if ($currency = $this->findById($id)) {
            $currency->delete();
        }
    }

    /**
     * @param ValidatedCurrencyRequest $request
     * @return Currency
     */
    public function create(ValidatedCurrencyRequest $request): Currency
    {
        $currency = new Currency();
        $currency->title = $request->title;
        $currency->short_name = $request->short_name;
        $currency->logo_url = $request->logo_url;
        $currency->price = $request->price;
        $currency->save();

        return $currency;
    }

    public function update(ValidatedCurrencyRequest $request, Currency $currency): Currency
    {
        $currency->title = $request->title;
        $currency->short_name = $request->short_name;
        $currency->logo_url = $request->logo_url;
        $currency->price = $request->price;
        $currency->save();

        return $currency;
    }
}
