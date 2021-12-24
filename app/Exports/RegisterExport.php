<?php

namespace App\Exports;

use App\Models\RegisteredUser;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RegisterExport implements FromArray, ShouldAutoSize, WithHeadings
{
   public function __construct()
   {
   }
   public function headings(): array
   {
      return [
         'SN',
         'Name',
         'Email',
         'Phine Number',
         'Destionation',
      ];
   }
   public function array(): array
   {
      $details = RegisteredUser::select('name','email','phone','destination')->get();
      $data = [];
      $value = [];
      $i = 1;
      
      foreach ($details as $detail) {
         $value['sn'] = $i;
         $value['Name'] = $detail->name;
         $value['Email'] = $detail->email;
         $value['Phone Number'] = $detail->phone;
         $value['Destination'] = $detail->destination;
         array_push($data, $value);
         $i++;
      }
      return $data;
   }

}
