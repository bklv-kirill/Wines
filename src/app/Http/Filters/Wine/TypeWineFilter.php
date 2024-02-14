<?php

namespace App\Http\Filters\Wine;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class TypeWineFilter extends AbstractFilter
{
    public const NAME = "name";
    public const ORDER = "order";

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, "name"],
            self::ORDER => [$this, "order"],
        ];
    }

    public function name(Builder $builder, $name)
    {
        $builder->where("name", "LIKE", "%$name%");
    }
    public function order(Builder $builder, $order)
    {
        if ($order === "new") $builder->orderByDesc("date");
        else if ($order === "old") $builder->orderBy("date");
        else if ($order === "down") $builder->orderByDesc("price");
        else $builder->orderBy("price");
    }
}