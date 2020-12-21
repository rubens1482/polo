<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Font Awesome dentro de input</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
    body{
    font-family: Open Sans, Arial, MS Reference Sans Serif;
        }

        input{
    padding: 10px;
            width: 350px;
            color: #000;
        }
    </style>

</head>
<body>
    <!-- ***************************************************************************** -->
    <p>Forma 1</p>
    <style type="text/css">
    /*
    * utilizando unicode no placeholder
    */
    input#forma_1{
            font-family: "FontAwesome";
        }
    </style>
    <input type="text" id="forma_1" placeholder="&#xf087;">
    <br><br>

    <!-- ***************************************************************************** -->
    <p>Forma 2</p>
    <style type="text/css">
    /*
    * utilizando unicode no placeholder
    */
    input#forma_2{
            /* aqui você define o tamanho da fonte */
            font-size: 14px;

            /*
            se constar somente FontAwesome em font-family, aparece o ícone, porém o texto
            "informe seu e-mail" fica com a fonte padrão do navegador
            font-family: "FontAwesome";
            */

            /* fazendo dessa forma aparece o ícone e a fonte do texto é formatado */
            /* atenção: pra variar o ieka (i.e.) não funciona direito - mantém a fonte padrão */
            font-family: "FontAwesome", Open Sans, Arial, MS Reference Sans Serif;

            /* aqui você define a cor */
            color: #3d3d3d;
        }

        /*
        * utilizando position + before
        */
        #email {
            padding-left: 30px;
            width: 330px;
            color: #ff0000;
        }
        #email-label {
            position: relative;
        }
        #email-label:before {
            color: #ff0000;
            content:"\f003";
            font-family: FontAwesome;
            position: absolute;
            top: 2px;
            left: 10px;
        }
    </style>
    <input type="text" id="forma_2" placeholder="&#xf003; informe seu email">
    <br><br>

    <label id="email-label">
        <input type="text" id="email" placeholder="informe seu email" />
    </label>
    <br><br>

    <!-- ***************************************************************************** -->
    <p>Forma 3</p>
    <style type="text/css">
    /*
    * utilizando unicode no value
    */
    input#enviar{
            /* aqui você define o tamanho da fonte */
            font-size: 14px;

            /*
            se constar somente FontAwesome em font-family aparece o ícone porém o texto
            "informe seu e-mail" fica com a fonte padrão do navegador
            font-family: "FontAwesome";
            */

            /* fazendo dessa forma aparece o ícone e o texto fica formatado */
            font-family: "FontAwesome", Open Sans, Arial, MS Reference Sans Serif;

            /* aqui você define a cor */
            color: #FFF;

            /* definindo outros atributos */
            background-color: #00a0c4;
            border: 1px solid #00a0c4;
            border-radius: 4px;
            width: 150px;
            cursor: pointer;
        }

        /*
        * utilizando class + position
        */
        #box_icone_busca{
            width: 30px;
            height: 30px;
            padding: 10px;
            position: relative;
            left: -39px;
            top: 1px;
        }
        #icone_busca {
            color: #000;
            cursor: pointer;
        }
    </style>
    <script type="text/javascript">
        function sua_funcao_aqui(){
            alert("cliquei aqui!");
        }
    </script>

    <input type="submit" id="enviar" value="&#xf21d; ENVIAR" />
    <br><br>

    <input id="busca" type="text" placeholder="o que você procura?" />
    <span id="box_icone_busca">
        <i id="icone_busca" class="fa fa-search" onclick="sua_funcao_aqui()"></i>
    </span>
    <br><br>
</body>
</html>
