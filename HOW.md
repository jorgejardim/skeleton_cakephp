#CAKE BAKE

Obs: Gerar as views e renomealas com o prefixo site_ e dashboard_

bin/cake bake model Users --theme BashSite
bin/cake bake controller Users --theme BashSite
bin/cake bake template Users --theme BashSite

bin/cake bake model Users --theme BashDashboard
bin/cake bake controller Users --theme BashDashboard
bin/cake bake template Users --theme BashDashboard

#Internationalization

Locale::getDefault();
Locale::setDefault('fr');

#Sessions
$this->request->session()->check('Auth.User.id');
$this->request->session()->read('Auth.User.id');
$this->request->session()->write('Auth.User.id', '1');
$this->request->session()->delete('Auth.User.id');