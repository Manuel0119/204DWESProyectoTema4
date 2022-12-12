/*
    Autor: Manuel Martín Alonso.
    Utilidad: Este programa consiste en borrar la base de datos DAW204DBDepartamentos y borrar el usuario 'usuarioDAW204DBDepartamentos'.
    Fecha-última-revisión: 23-11-2022.
*/
-- Borrar la base de datos DAW204DBDepartamentos.
drop database if exists DB204DWESEncuestaTema4;
-- Borrar el usuario usuarioDAW204DBDepartamentos.
drop user if exists 'User204DWESEncuestaTema4'@'%';