<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::select(
            'username',
            'identity_number',
            'birth_date',
            'phone1',
            'title'
        )->get();
    }
}
