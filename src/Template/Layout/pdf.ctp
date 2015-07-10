<?php
header("Content-type: application/pdf");
echo $this->element('Pdf/header', ['pdf' => $pdf]);
echo $this->fetch('content');
echo $this->element('Pdf/footer', ['pdf' => $pdf]);