<?php
require 'vendor/autoload.php';
require_once('db.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

$id_event = $_POST['id_event'];
$stmt = $db->prepare("
    SELECT a.username, a.email 
    FROM account a
    JOIN registerke r ON a.id_akun = r.id_akun
    WHERE r.id_event = ?
");
$stmt->execute([$id_event]);
$participants = $stmt->fetchAll(PDO::FETCH_ASSOC);


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();


$sheet->setCellValue('A1', 'Username')
      ->setCellValue('B1', 'Email');


$sheet->getStyle('A1:B1')->applyFromArray([
    'font' => ['bold' => true],
    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => ['rgb' => 'FFD966']
    ]
]);


$row = 2;
foreach ($participants as $participant) {
    $sheet->setCellValue("A{$row}", $participant['username']);
    $sheet->setCellValue("B{$row}", $participant['email']);
    $row++;
}


$sheet->getStyle("A1:B" . ($row - 1))->applyFromArray([
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
        ],
    ],
]);


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="participants.xlsx"');


$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>