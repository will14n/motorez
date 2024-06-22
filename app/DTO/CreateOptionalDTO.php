<?php

namespace App\DTO;

use App\Enums\OptionalTypesEnum;
use App\Http\Requests\StoreUpdateStockRequest;

class CreateOptionalDTO
{
    public function __construct(
        public array|null $optionals,
    )
    { }

    public static function makeFromRequest(StoreUpdateStockRequest $request): self
    {
        return new self(
            $request->optionals,
        );
    }

    public static function makeFromXML(array $request): self
    {
        foreach ($request as $key => $value) {
            $types = substr($value, 0, 2);
            $request[$key] = OptionalTypesEnum::{$types}->value;
        }
        // dd($request);
        return new self(
            $optionals = $request ?? null,
        );
    }

    public static function makeFromJSON(array $request): self
    {
        foreach ($request as $key => $value) {
            $types = substr($value, 0, 2);
            $request[$key] = OptionalTypesEnum::{$types}->value;
        }
        // dd($request);
        return new self(
            $optionals = $request ?? null,
        );
    }
}
