<?php

namespace Tajawal\Infrastructure\Rules;

use Tajawal\Base\AbstractSearchRules;

class Search extends AbstractSearchRules
{
    public function getRulesArray(): array
    {
        return [
                'name'=>'string',
                'city'=>'alpha',
                'priceFrom'=>'numeric|required_with:priceTo',
                'priceTo'=>'numeric|required_with:priceFrom',
                'dateFrom'=>'date|date_format:d-m-Y|before:dateTo|required_with:dateTo',
                'dateTo'=>'date|date_format:d-m-Y|after:dateFrom||required_with:dateFrom',
                'orderBy'=>'in:name,price',
                'orderType'=>'in:asc,desc|required_with:orderBy',

        ];
    }


}