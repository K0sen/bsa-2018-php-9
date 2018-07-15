<?php

namespace App\Services;

use App\Currency;
use App\Http\Requests\ValidatedCurrencyRequest;
use Illuminate\Database\Eloquent\Collection;

interface CurrencyRepositoryInterface
{
    public function findAll(): Collection;

    public function delete(int $id): void;

    public function findById($id): ?Currency;

    public function create(ValidatedCurrencyRequest $createCurrencyRequest): Currency;

    public function update(ValidatedCurrencyRequest $createCurrencyRequest, Currency $currency): Currency;
}
