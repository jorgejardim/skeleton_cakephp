<?php
namespace App\View\Helper;

use Cake\View\Helper;

class CommonsHelper extends Helper
{
    public $helpers = ['Html', 'Url'];

    public function photo($ra=null, $id=null, $icon=true, $url=true, $header=false)
    {
        $imagem = '';
        if(!empty($ra)) {
            $ra = $this->numbers_only($ra);
        }

        if(is_array(@getimagesize(S3AVATARS.TEMPLATE.'/RA-'.$ra.'.jpg')) && !empty($ra)) {
            $imagem = S3AVATARS.TEMPLATE.'/RA-'.$ra;
        } elseif(is_array(@getimagesize(S3AVATARS.TEMPLATE.'/pRA-'.$ra.'.jpg')) && !empty($ra)) {
            $imagem = S3AVATARS.TEMPLATE.'/pRA-'.$ra;
        } elseif(is_file(WWW_ROOT.'avatars'.DS.'RA-'.$ra.'.jpg') && !empty($ra)) {
            $imagem = '/avatars/RA-'.$ra;
        } elseif(is_array(@getimagesize(S3AVATARS.TEMPLATE.'/'.$id.'.jpg')) && !empty($id)) {
            $imagem = S3AVATARS.TEMPLATE.'/'.$id;
        } elseif(is_file(WWW_ROOT.'avatars'.DS.$id.'.jpg') && !empty($id)) {
            $imagem = '/avatars/'.$id;
        } elseif(is_file(WWW_ROOT.'avatars'.DS.$ra.'.jpg') && !empty($ra)) {
            $imagem = '/avatars/'.$ra;
        } elseif($icon) {
            $imagem = '/img/sem_foto';
        }
        if($imagem) {
            if($url)
                return $this->Url->build($imagem.'.jpg', true);
            if($header) {
                return file_get_contents($this->Url->build($imagem.'.jpg', true));
            }
            return $this->Html->image($this->Url->build($imagem.'.jpg', true), ['class'=>'foto', 'rel'=>S3AVATARS.TEMPLATE.'/RA-'.$ra.'.jpg']);
        } else {
            return '';
        }
    }

    public function numbers_only($var) {
        $tamanho = strlen($var);
        $numeros = array("0","1","2","3","4","5","6","7","8","9");
        $res = "";
        for($i=0; $i<$tamanho; $i++) {
                $str = substr($var, $i, 1);
                $existir = in_array($str,$numeros);
                if($existir) {
                        $res .= $str;
                }
        }
        $res = chop($res);
        return $res;
    }

    public function convertPHPSizeToBytes($sSize)
    {
        if ( is_numeric( $sSize) ) {
           return $sSize;
        }
        $sSuffix = substr($sSize, -1);
        $iValue = substr($sSize, 0, -1);
        switch(strtoupper($sSuffix)){
        case 'P':
            $iValue *= 1024;
        case 'T':
            $iValue *= 1024;
        case 'G':
            $iValue *= 1024;
        case 'M':
            $iValue *= 1024;
        case 'K':
            $iValue *= 1024;
            break;
        }
        return $iValue;
    }

    public function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('', 'k', 'M', 'G', 'T');

        return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
    }

    public function getMaximumFileUploadSize()
    {
        return $this->formatBytes($this->convertPHPSizeToBytes(min($this->convertPHPSizeToBytes(ini_get('post_max_size')), $this->convertPHPSizeToBytes(ini_get('upload_max_filesize')))));
    }

    public function brazilian_currency($value)
    {
        return number_format($value,2,",",".");
    }

    public function american_currency($value)
    {
        $value = str_replace('.', '', $value);
        $value = str_replace(',', '.', $value);
        return number_format($value,2,".",",");
    }
}