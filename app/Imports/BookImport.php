<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookImport implements ToModel,withHeadingRow
{

// WE DON NEED IMPORT CLASS WHEN WE IMPORT TO ARRAY !!!
// withHeadingRow when we have headings on columns and after we can use [0]
//https://www.youtube.com/watch?v=n2WOag1G7Zg

    public function model(array $row)
    {
        // Create a new Book model instance and populate it with data from the given row.
        return new Book([
            'title' => $row['Book Title'][2],
            'invoice' => $row['Supplier'],
            'book' => $row['Supplier'],
        ]);
    }

}
