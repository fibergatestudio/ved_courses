<?php

namespace App\Imports;

use App\Students_data;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToCollection,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);

        return new Students_data([
                'upload_date' => $row[0],
                'status_from' => $row[0],
                'ID_FO' => $row[0],
                'recipient' => $row[0],
                'birthday' => $row[0],
                'gender' => $row[0],
                'citizenship' => $row[0],
                'specialty' => $row[0],
                'reason_for_deduction' => $row[0],
        ]);
    }

    public function collection(Collection $rows)
    {
        //dd($rows);

        return $rows;

    }

    // headingRow function is use for specific row heading in your xls file
    public function headingRow(): int
    {
        return 1;
    }
}
