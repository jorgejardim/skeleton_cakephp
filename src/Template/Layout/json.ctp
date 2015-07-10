<?php
//header('Content-type: application/json');
pookopok
if (empty($code)) {
    $this->viewVars['code'] = http_response_code();
}

echo json_encode($this->viewVars);