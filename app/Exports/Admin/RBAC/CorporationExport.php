<?php
namespace App\Exports\Admin\RBAC;

use App\Models\RBAC\Corporation;
use Maatwebsite\Excel\Concerns\FromCollection;

class CorporationExport implements FromCollection {
    public function collection() {
        return Corporation::all();
    }
}
