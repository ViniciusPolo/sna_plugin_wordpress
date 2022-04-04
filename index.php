<?php
    /*
    Plugin Name: Cadastro
    Author: Vinicius Polo
    Version: 1.0.0
    Description: Um plugin de cadstro com validador de CPF.
    */

    echo "<style>
        #form{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        form {
            border: 2px black solid;
            padding: 10px;
            background: rgb(220,220,220);
            width: 300px;
            border-radius: 10px; 
               
        }
        input {
            margin: 5px;
        } 
        #button {
            border-radius: 5px;
        }
        #caixa {
            border-radius: 10px; 
        }
    </style>
    <div id='form'>

        <form action= 'User.php' method='post' enctype='multipart/form-data'>
            <h3>Cadastro</h3>
            <label for='nome'>Nome:
                </br><input id='caixa' type='text' name='nome' placeholder='Nome'>
            </label></br>
            <label for='image'>Foto:
                </br><input id='button' type='file' name='image' accept=”image/*” >
            </label></br>
            <label for='cpf'>CPF:
                </br><input id='caixa' type='text' name='cpf' placeholder='000.000.000-00'>
            </label></br>
            <label for='email'>Email:
                </br><input id='caixa' type='email' name='email' placeholder = 'seuemail@email.com'>
            </label></br>
            <input id='button' type='submit' value='cadastrar'>
        </form>
    </div>";
   


        
        
