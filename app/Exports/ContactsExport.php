<?php

namespace App\Exports;

use App\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ContactsExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected int $userId;
    protected string $role;

    public function __construct(int $userId, string $role)
    {
        $this->userId = $userId;
        $this->role   = $role;
    }

    public function collection()
    {
        $query = Contact::orderBy('id');

        if ($this->role === 'commercial') {
            $query->where('assigned_to', $this->userId);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return ['#', 'Nom', 'Société', 'Email', 'Téléphone', 'Pays', 'Ville', 'Service', 'Message', 'Date'];
    }

    public function map($contact): array
    {
        return [
            $contact->id,
            $contact->name,
            $contact->company,
            $contact->email,
            $contact->number,
            $contact->country,
            $contact->city,
            $contact->service,
            $contact->message,
            $contact->created_at->format('d/m/Y H:i'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
