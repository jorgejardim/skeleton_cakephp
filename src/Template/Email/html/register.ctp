<h2 style="margin:0;padding:0;color:#666">Olá, <?php echo $name; ?>.</h2>
<br>
<div>
    <p style="line-height:20px;color:#666">Seu cadastro foi realizado com sucesso!</p>
    <p style="line-height:20px;color:#666">
        <a target="_blank" style="color:#F60" href="<?php echo $this->Url->build('/login', true); ?>"><?php echo $this->Url->build('/login', true); ?></a><br />
        Seu login: <strong><?php echo $email; ?></strong><br />
        Sua senha: <strong><?php echo $password; ?></strong>
    </p>
</div>