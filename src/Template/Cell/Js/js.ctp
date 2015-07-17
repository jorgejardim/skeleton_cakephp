<?php
$name = strtolower($this->request->params['controller']);
if(is_file(WWW_ROOT."js".DS."pages".DS.$name.".js")) {
    echo $this->Html->script(ASSETS_JS.'pages/'.$name.'.js')."\n";
}
$name = strtolower($this->request->params['controller'].'_'.$this->request->params['action']);
if(is_file(WWW_ROOT."js".DS."pages".DS.$name.".js")) {
    echo $this->Html->script(ASSETS_JS.'pages/'.$name.'.js')."\n";
}