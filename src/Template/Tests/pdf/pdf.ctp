<?php
$this->pdf->data = []; // cabeçalho: array de conteudo ou model e id

$this->pdf->SetAutoPageBreak(true, 27); // 22 - 27
$this->pdf->AddPage('P'); // P - L

$this->pdf->SetFont('times', '', 10);

$this->pdf->writeHTML(__('Hello World!'), true, false, false, false, '');