<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <title>{{ config('name', 'Ordens de Serviço - Oficina') }}</title>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        body {
            background-color: #DCDCDC;
            font-family: tahoma;
        }

        
        nav.navbar {
            background-color: #808080;
            color: black;
        }

        ul.dropdown-menu {
            background-color: #C0C0C0;
            color: black;   
        }

        li.dropdown a.dropdown-toggle {
            color: black;   
        }

        li.dropdown a.dropdown-toggle:hover:not(.active) {
            background-color: #D3D3D3;
        }

        ul.dropdown-menu:hover:not(.active) {
            background-color: #D3D3D3;
        }

        ul.navbar.navbar-nav.navbar-right {
            color: black;   
        }       

        button.btn.btn-primary{
            background-color: #696969;
            border-color: #696969;

        }
        a.btn.btn-link{
            color: black;
        }

        a.btn.btn-primary{
            background-color: #696969;
            border-color: #696969; 
        }

       
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" >
            <div class="container" >
                <div class="navbar-header" >

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <font color="black" ><b>{{ config('name', 'Ordens de Serviço - Oficina') }}</b></font>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}" style="color: black">Login</a></li>
                            <li><a href="{{ route('register') }}" style="color: black">Cadastrar-se</a></li>
                        @else
                            <li class="dropdown">                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Clientes <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{action('ClienteController@lista')}}">Todos os clientes</a>
                                        <a href="{{action('ClienteController@novo')}}">Novo cliente</a>
                                    </li>
                                </ul>   
                            </li>
                            <li class="dropdown">                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Veículos <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{action('VeiculoController@lista')}}">Todos os veículos</a>
                                        <a href="{{action('VeiculoController@novo')}}">Novo veículo</a>
                                    </li>
                                </ul>   
                            </li> 
                            <li class="dropdown">                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Itens <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{action('ItemController@lista')}}">Todos os itens</a>
                                        <a href="{{action('ItemController@novo')}}">Novo item</a>
                                    </li>
                                </ul>   
                            </li>
                            <li class="dropdown">                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Serviços <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{action('ServicoController@lista')}}">Todos os serviços</a>
                                        <a href="{{action('ServicoController@novo')}}">Novo serviço</a>
                                    </li>
                                </ul>   
                            </li>  
                            <li class="dropdown">                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Ordens <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{action('OrdemController@lista')}}">Todas as ordens</a>
                                        <a href="{{action('OrdemController@nova')}}">Nova ordem</a>
                                    </li>
                                </ul>   
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>        
                        @endif
                        
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script type="text/javascript">
        function validarCliente(cpfcnpj, tipopessoa) {
 
            //cnpj = cnpj.replace(/[^\d]+/g,'');
            if(tipopessoa == 2){
                msg = "Informe um CNPJ válido!";
                if(cpfcnpj== ''){
                    alert(msg);
                    return false;
                } 
                
                 
                if (cpfcnpj.length != 14){
                    alert(msg);
                    return false;
                }
                    
             
                // Elimina CNPJs invalidos conhecidos
                if (cpfcnpj == "00000000000000" || 
                    cpfcnpj == "11111111111111" || 
                    cpfcnpj == "22222222222222" || 
                    cpfcnpj == "33333333333333" || 
                    cpfcnpj == "44444444444444" || 
                    cpfcnpj == "55555555555555" || 
                    cpfcnpj == "66666666666666" || 
                    cpfcnpj == "77777777777777" || 
                    cpfcnpj == "88888888888888" || 
                    cpfcnpj == "99999999999999"){
                    alert(msg);
                    return false;
                }
                    
                     
                // Valida DVs
                tamanho = cpfcnpj.length - 2
                numeros = cpfcnpj.substring(0,tamanho);
                digitos = cpfcnpj.substring(tamanho);
                soma = 0;
                pos = tamanho - 7;
                for (i = tamanho; i >= 1; i--) {
                  soma += numeros.charAt(tamanho - i) * pos--;
                  if (pos < 2)
                        pos = 9;
                }
                resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(0)){
                    alert(msg);
                    return false;
                }
                    
                     
                tamanho = tamanho + 1;
                numeros = cpfcnpj.substring(0,tamanho);
                soma = 0;
                pos = tamanho - 7;
                for (i = tamanho; i >= 1; i--) {
                  soma += numeros.charAt(tamanho - i) * pos--;
                  if (pos < 2)
                        pos = 9;
                }
                resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(1)){
                    alert(msg);
                    return false;
                }

            }
                
            else{
                msg = "Informe um CPF válido!";
                var Soma;
                var Resto;
                Soma = 0;
                if (cpfcnpj == "00000000000"){
                    alert(msg);                    
                    return false;
                } 
                    
                
                for (i=1; i<=9; i++) Soma = Soma + parseInt(cpfcnpj.substring(i-1, i)) * (11 - i);
                Resto = (Soma * 10) % 11;
                
                if ((Resto == 10) || (Resto == 11))  Resto = 0;
                if (Resto != parseInt(cpfcnpj.substring(9, 10)) ){
                    alert(msg);
                    return false;
                } 
                
                Soma = 0;
                for (i = 1; i <= 10; i++) Soma = Soma + parseInt(cpfcnpj.substring(i-1, i)) * (12 - i);
                Resto = (Soma * 10) % 11;
                
                if ((Resto == 10) || (Resto == 11))  Resto = 0;
                if (Resto != parseInt(cpfcnpj.substring(10, 11) ) ){
                    alert(msg);                    
                    return false;

                }
            }
                   
        return true;
    
        }
    </script>
</body>
</html>
