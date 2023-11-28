<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["definirCookie"])) {
        SetarCookieRecebido();
        header("Location: index.php");
    } elseif (isset($_POST["excluirCookie"])) {
        DeletarCookieAtual();
        header("Location: index.php");
    }
}

function SetarCookie($value)
{
    $cookieName = "usuario";
    $expirationTime = time() + 86400;
    setcookie($cookieName, $value, $expirationTime, "/");
}

function getUsuarioCookie()
{
    return isset($_COOKIE["usuario"]) ? $_COOKIE["usuario"] : null;
}

function DeletarCookieUsuario()
{
    if (isset($_COOKIE["usuario"])) {
        setcookie("usuario", "", time() - 3600, "/");
        return true;
    }
    return false;
}

function SetarCookieRecebido()
{
    if (!empty($_POST["usuario"])) {
        $usuario = $_POST["usuario"];
        SetarCookie($usuario);
    }
}

function DeletarCookieAtual()
{
    DeletarCookieUsuario();
}