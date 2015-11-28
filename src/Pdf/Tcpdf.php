<?php
namespace App\Pdf;

use Cake\ORM\TableRegistry;

require VENDORS . 'tecnickcom/tcpdf/tcpdf.php';

class Tcpdf extends \TCPDF
{
    public $model_name;
    public $data_id;
    public $data;
    public $landscape;

    public function __construct($orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false)
    {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
    }

    // Page margins
    public function SetMargins($left, $top, $right = -1, $keepmargins = false)
    {
        parent::SetMargins(15, 30, 15, $keepmargins);
    }

    // Page header
    public function Header()
    {
        $this->Data();

        $dimensions      = $this->getPageDimensions();
        $this->landscape = $dimensions['or']==='L' ? 87 : 0;

        $image_file = ASSETS_IMG.TEMPLATE.'/logo.png';
        $this->Image($image_file, 15, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 1, false, false, false);

        $this->SetFont('times', 'B', 16);
        $this->Cell(150+$this->landscape, 0, 'TÍTULO', 0, 1, 'C');

        if($this->data) {
            $this->SetX(30);
            $this->Cell(150+$this->landscape, 0, strtoupper($this->data->name), 0, 0, 'C');
        }

        $this->Line(15, 26, 195+$this->landscape, 26);
    }

    // Page footer
    public function Footer()
    {
        $this->SetY($this->landscape ? -20 : -25);
        $this->Line(15, $this->GetY(), 195+$this->landscape, $this->GetY());

        if($this->data) {

            $address  = $this->data->address . ', '.$this->data->number;
            $address .= $this->data->complement ? ' - '.$this->data->complement : '';
            $address .= ' – ' . $this->data->neighborhood;
            $address .= ' – CEP ' . $this->data->zip;
            $address .= ' – ' . $this->data->state;
            $address .= '/' . $this->data->city;

            $contact  = $this->data->phone_2 ? 'Telefones: ' : 'Telefone: ';
            $contact .= $this->data->phone;
            $contact .= $this->data->phone_2 ? ' / '.$this->data->phone_2 : '';
            $contact .= $this->data->email ? ' – E-mail: '.$this->data->email : '';
            $contact .= $this->data->site ? ' – Site: '.$this->data->site : '';

            $this->SetFont('times', '', 9);
            $this->Cell(0, 0, $address, 0, 1, 'C');
            $this->Cell(0, 0, $contact, 0, 1, 'C');
        }

        $this->SetFont('times', 'I', 8);
        $this->Cell(0, 0, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, 0, 'C');
    }

    public function Data()
    {
        if(!$this->data) {
            // $datas = TableRegistry::get($this->model_name);
            // $this->data = $datas->find()->where(['id' => $this->data_id])->first();
        }
    }
}