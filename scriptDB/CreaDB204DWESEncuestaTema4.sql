/*
    Autor: Manuel Martín Alonso.
    Utilidad: Este programa consiste en crear una base de datos llamada DAW204DBDepartamentos, formada por una tabla llamada Departamento que incluye información de los diferentes departamentos.
    Fecha-última-revisión: 23-11-2022.
*/
-- Creación de la base de datos.
create database DB204DWESEncuestaTema4;
use DB204DWESEncuestaTema4;
-- Creación de la tabla Departamento.
create table if not exists T02_Departamento(
    T02_CodDepartamento varchar(3) primary key not null,
    T02_DescDepartamento varchar(255) not null,
    T02_FechaCreacionDepartamento datetime not null,
    T02_VolumenDeNegocio float not null,
    T02_FechaBajaDepartamento int null
)engine=Innodb;
-- Creación del usuario.
create user 'User204DWESEncuestaTema4'@'%' identified by 'paso';
-- Dar permisos al usuario 'usuarioDAW204DBDepartamentos'.
grant all on DB204DWESEncuestaTema4.* to 'User204DWESEncuestaTema4'@'%';
    