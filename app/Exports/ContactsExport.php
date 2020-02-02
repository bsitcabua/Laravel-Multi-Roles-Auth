<?php

namespace App\Exports;

use App\Contact;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ContactsExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize, WithTitle, WithEvents
{

    private $query;
    public $count;

    public function __construct($query){
        $this->query = $query;
        $this->count = 0;
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        // Bold font on heading
        $styleArray = [
            'font' => [
                'bold' => true
            ]
        ];

        return [
            // Handle by a closure.
            AfterSheet::class => function(AfterSheet $event) use($styleArray) {
                $event->sheet->getStyle('A1:G1')->applyFromArray($styleArray);
            },
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->query;
    }

    public function headings(): array
    {
        return $headings = [
            '#', 'Firstname', 'Lastname', 'Contact No.', 'Email', 'Address', 'Created At',
        ];
    }

    /**
    * @var Contact $contact
    */
    public function map($contact): array
    {
        return [
            ++$this->count.')',
            $contact->first_name,
            $contact->last_name,
            $contact->contact_no,
            $contact->email,
            $contact->address,
            Date::dateTimeToExcel($contact->created_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            // 'C' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
        ];
    }

    public function title() : string
    {
        return 'Contacts';
    }
}
