CREATE DATABASE Registro;

USE Registro;

CREATE TABLE mat_materia(
    mat_id INT NOT NULL AUTO_INCREMENT,
    mat_nombre VARCHAR(100) NOT NULL,
    PRIMARY KEY (mat_id)
);

CREATE TABLE grd_grado(
    grd_id INT NOT NULL AUTO_INCREMENT,
    grd_nombre VARCHAR(100) NOT NULL,
    PRIMARY KEY (grd_id)
);

CREATE TABLE mxg_materiasxgrado(
    mxg_id INT NOT NULL AUTO_INCREMENT,
    mxg_id_grd INT NOT NULL,
    mxg_id_mat INT NOT NULL,
    PRIMARY KEY (mxg_id),
    FOREIGN KEY (mxg_id_grd) REFERENCES grd_grado(grd_id),
    FOREIGN KEY (mxg_id_mat) REFERENCES mat_materia(mat_id)
);

CREATE TABLE alm_alumno(
    alm_id INT NOT NULL AUTO_INCREMENT,
    alm_codigo VARCHAR(100) NOT NULL,
    alm_nombre VARCHAR(300) NOT NULL,
    alm_edad INT NOT NULL,
    alm_sexo VARCHAR(100) NOT NULL,
    alm_id_grd INT NOT NULL,
    alm_observacion VARCHAR(300) NOT NULL,
    PRIMARY KEY (alm_id),
    FOREIGN KEY (alm_id_grd) REFERENCES grd_grado(grd_id)
);