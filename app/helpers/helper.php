<?php

function validaradministrador()
{
  $decide=Auth::user()->perfil;
  if ($decide==0) {
    $servidor=$_SERVER['HTTP_HOST'];
    header('Location: http://'.$servidor.'/metromusica/public');
    exit;
  }
}
function validarlista($id,$idlista)
{
  $tipo=DB::table('cms_listas')->select('nombre_lista')->where('valor_item',$id)->where('id_tipolista',$idlista)->take(1)->get();
  foreach ($tipo as $key) {
    $tipof=$key->nombre_lista;
  }
  return $tipof;
}
function validarlargo($palabra)
{
  if (strlen($palabra)>60) {
    $palabra=substr($palabra, 0, 56)."...";
  }
    return $palabra;
}
function convertirastring($palabra)
{
$palabra=str_ireplace("-"," ",$palabra);
    return $palabra;
}
function imagen480($imagen)
{
$link=explode(",", $imagen);
$links=count($link);
for ($i=0; $i < $links; $i++) {
$pos = strpos('480x360', $link[$i]);
if (!$pos !== false) {
  $show=ruta().'/'.carpetapost().'/'.$link[$i];
  return $show;
  break;
}}
}

function slider($imagen)
{
  $show=ruta().'/'.carpetaslider().'/'.$imagen;
  return $show;
}
function ruta()
{
  return "http://192.168.0.18/net-tube/storage/app/public";
}

function carpetapost()
{
return "/imagenes/post";
}

function carpetaslider()
{
return "/imagenes/slider";
}

function post($contenido)
{
echo $contenido;
}
function fecha($fecha)
{
  return substr($fecha, 0, 10);
}

function hora($fecha)
{
  return substr($fecha, 10);
}
function descripcion(){
  return "esto es la descripcion";
}
function keywords(){
  return "esto, sdsd, sds, sas";
}
function logo()
{
  return ruta()."/logo.png";
}
function logo_responsive()
{
  return ruta()."/logo-small.png";
}
function icono()
{
  return ruta()."/icono.png";
}
