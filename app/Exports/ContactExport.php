<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        return Contact::select('id', 'name', 'email' , 'phone' , 'title' , 'body')->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'phone',
            'title',
            'body',
        ];
    }

}
