<?php
    create table usuario 
    (
        id_usuario integer primary key,
        email string,
        nome string
    )

    create table produtos
    (
        id_produto integer primary key,
        id_usuario integer,
        imagem_URL string
    )
