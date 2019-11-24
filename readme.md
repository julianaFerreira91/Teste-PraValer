<h1 align="center">Desafio TECH PraValer</h1>

Desafio para avaliação técnica da empresa Pra Valer.

##Instalação
<p>
    Primeiramente baixe o projeto digitando no terminal o seguinte comando:
    <strong>git clone https://github.com/julianaFerreira91/Teste-PraValer.git</strong>
</p>
<p>
    Após a conclusão do download entre na pasta do projeto e digite <strong>composer install</strong>
</p>
<p>
    Em seguida, copie o conteúdo do arquivo env.example para .env na raiz do projeto usando o comando <strong>sudo cp .env.example .env</strong>. Altere as configurações de acesso ao banco de dados de acordo com as criada em sua máquina.
</p>
<p>
    Como o arquivo .env criado, digite <strong>php artisan key:generate</strong>
</p>

##Criando o banco de dados
<p>
    Para criar o banco de dados o terminal digite <strong>mysql -u root -p</strong> digite a sua senha e em seguida crie o banco usando o comando create database `nome_do_banco`. É necessário que o nome do banco seja o mesmo que foi configurado no .env anteriormente.
</p>

##Criando as tabelas no banco de dados
<p>
    Para criar as tabelas necessários para execução do projeto basta digitar no terminal o comando <strong>php artisan migrate</strong>
</p>

##Executando o projeto
<p>
    Inicie o servidor digitando o comando <strong>php artisan serve</strong> no seu terminal.
</p>
<p>Após basta abrir o seu navegador de preferência e na barra de endereços digitar <strong>localhost:8000</strong></p>