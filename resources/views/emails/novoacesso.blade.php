<html>

<body>

  <h4> Seja Bem Vindo(a) {{$nome}}</h4>

  <p> Você acabou de acessar o sistema utilizando o seu email: {{$email}}  </p>

  <p> Data/Hora de acesso: {{$datahora}}  </p>

  <div>
    <img width="10%" height="10%" src="{{ $message->embed( public_path() . '/imagens/laravel-logo-white.png' ) }}">
  </div>

</body>
</html>
