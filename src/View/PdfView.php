<?php
namespace App\View;

use Cake\View\View;

use Cake\Event\EventManager;
use Cake\Network\Request;
use Cake\Network\Response;
use App\Pdf\Tcpdf;
use Cake\View\CellTrait;

class PdfView extends View
{
    public $layout = 'pdf';

    public $subDir = 'pdf';

    protected $_responseType = 'pdf';

    public $pdf;

    /**
     * Constructor
     *
     * @param \Cake\Network\Request $request The request object.
     * @param \Cake\Network\Response $response The response object.
     * @param \Cake\Event\EventManager $eventManager Event manager object.
     * @param array $viewOptions View options.
     */
    public function __construct(
        Request $request = null,
        Response $response = null,
        EventManager $eventManager = null,
        array $viewOptions = []
    ) {
        parent::__construct($request, $response, $eventManager, $viewOptions);

        if ($response && $response instanceof Response) {
            $response->type($this->_responseType);
        }
    }

    public function initialize()
    {
        parent::initialize();
        $this->pdf = new Tcpdf('P','mm','A4');
        $this->pdf->office_id = $this->request->session()->read('Auth.User.office_id');
    }
}