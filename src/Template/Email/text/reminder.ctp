Olá, <?php echo $name; ?>.

Você ou outra pessoa usou seu endereço de e-mail para lembrar sua senha de acesso.

Seu login: <?php echo $username; ?>
Sua senha: <?php echo $password; ?>

Link:
<?php if(empty($code)) { ?>
    <?php echo $this->Url->build('/activation', true); ?>
<?php } else { ?>
    <?php echo $this->Url->build('/activation/'.$code, true); ?>
<?php } ?>

Se você não solicitou este email, por favor, desconsidere.