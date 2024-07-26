<?php

namespace App\Exports;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserExportCollection;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function __construct($collection)
    {
        $this->data = $collection;
    }

    /**
    * @return UserExportCollection
     */
    public function collection(): UserExportCollection
    {
        return new UserExportCollection($this->data);
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Kelas',
            'username',
            'password'
        ];
    }
}
