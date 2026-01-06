<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InitialDataSeeder extends Seeder
{
    public function run()
    {
        // ------------------ CARRERAS ------------------
        DB::table('carreras')->insert([
            ['id' => 1, 'nombre' => 'Ingeniería en Innovación Agrícola Sustentable', 'created_at' => '2025-12-31 06:42:19', 'updated_at' => '2025-12-31 06:42:19'],
            ['id' => 2, 'nombre' => 'Ingeniería en Sistemas Computacionales', 'created_at' => '2025-12-31 06:42:19', 'updated_at' => '2025-12-31 06:42:19'],
            ['id' => 3, 'nombre' => 'Licenciatura en Contaduría', 'created_at' => '2025-12-31 06:42:19', 'updated_at' => '2025-12-31 06:42:19'],
        ]);

        // ------------------ GENERACIONES ------------------
        DB::table('generaciones')->insert([
            ['id'=>1, 'periodo'=>'2007-2012', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>2, 'periodo'=>'2008-2013', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>3, 'periodo'=>'2009-2014', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>4, 'periodo'=>'2010-2015', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>5, 'periodo'=>'2011-2016', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>6, 'periodo'=>'2012-2017', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>7, 'periodo'=>'2013-2018', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>8, 'periodo'=>'2014-2019', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>9, 'periodo'=>'2015-2020', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>10,'periodo'=>'2016-2021', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>11,'periodo'=>'2017-2022', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>12,'periodo'=>'2018-2023', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>13,'periodo'=>'2019-2024', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>14,'periodo'=>'2020-2025', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
            ['id'=>15,'periodo'=>'2025-2026', 'created_at'=>'2025-12-31 06:43:01','updated_at'=>'2025-12-31 06:43:01'],
        ]);

        // ------------------ ESTATUS ------------------
        DB::table('estatus')->insert([
            ['id'=>1, 'nombre'=>'Egresado', 'created_at'=>'2025-12-31 06:43:26', 'updated_at'=>'2025-12-31 06:43:26'],
            ['id'=>2, 'nombre'=>'En seguimiento', 'created_at'=>'2025-12-31 06:43:26', 'updated_at'=>'2025-12-31 06:43:26'],
            ['id'=>3, 'nombre'=>'Titulado', 'created_at'=>'2025-12-31 06:43:26', 'updated_at'=>'2025-12-31 06:43:26'],
        ]);

        // ------------------ ROLES ------------------
        DB::table('roles')->insert([
            ['id'=>1, 'nombre'=>'Administrador'],
            ['id'=>2, 'nombre'=>'Usuario'],
        ]);

        // ------------------ USUARIOS ------------------
        DB::table('usuarios')->insert([
            [
                'id'=>1,
                'nombre'=>'Administrador',
                'email'=>'admin@ues.edu.mx',
                'password'=>'$2y$12$4uVPqz5JSYp0LpWg75JNkubN/xyGhgU5IZZwKnSHKuLGsEwGFz44u',
                'activo'=>1,
                'created_at'=>'2025-12-31 13:41:50',
                'updated_at'=>'2026-01-03 03:40:31',
                'role_id'=>1
            ],
            [
                'id'=>2,
                'nombre'=>'usuario',
                'email'=>'usuario@gmail.com',
                'password'=>'$2y$12$lOg/Ab/ymUQ9gAFJWFBea.8V.8d3a9CNnGue3FMrcY5JDBATegKhG',
                'activo'=>1,
                'created_at'=>'2026-01-03 03:39:53',
                'updated_at'=>'2026-01-03 09:43:00',
                'role_id'=>2
            ],
        ]);

        // ------------------ EGRESADOS ------------------
        DB::table('egresados')->insert([
            ['id'=>3, 'matricula'=>'SIS001','nombre_completo'=>'Carlos Hernández López','genero'=>'Masculino','domicilio'=>'Col. Centro','telefono'=>'5551110001','correo'=>'carlos.sis1@mail.com','carrera_id'=>1,'generacion_id'=>1,'estatus_id'=>1,'created_at'=>'2026-01-02 06:31:44','updated_at'=>'2026-01-02 06:31:44'],
            ['id'=>4, 'matricula'=>'SIS002','nombre_completo'=>'Ana María Torres','genero'=>'Femenino','domicilio'=>'Col. Reforma','telefono'=>'5551110002','correo'=>'ana.sis2@mail.com','carrera_id'=>2,'generacion_id'=>12,'estatus_id'=>3,'created_at'=>'2026-01-02 06:31:44','updated_at'=>'2026-01-06 10:06:46'],
            ['id'=>5, 'matricula'=>'SIS003','nombre_completo'=>'Luis Fernando Cruz','genero'=>'Masculino','domicilio'=>'Col. Juárez','telefono'=>'5551110003','correo'=>'luis.sis3@mail.com','carrera_id'=>1,'generacion_id'=>2,'estatus_id'=>1,'created_at'=>'2026-01-02 06:31:44','updated_at'=>'2026-01-02 06:31:44'],
            ['id'=>6, 'matricula'=>'SIS004','nombre_completo'=>'Mariana Gómez Ruiz','genero'=>'Masculino','domicilio'=>'Col. Roma','telefono'=>'5551110004','correo'=>'mariana.sis4@mail.com','carrera_id'=>1,'generacion_id'=>2,'estatus_id'=>2,'created_at'=>'2026-01-02 06:31:44','updated_at'=>'2026-01-02 06:31:44'],
            ['id'=>7, 'matricula'=>'SIS005','nombre_completo'=>'José Ángel Pérez','genero'=>'Masculino','domicilio'=>'Col. Centro','telefono'=>'5551110005','correo'=>'jose.sis5@mail.com','carrera_id'=>1,'generacion_id'=>3,'estatus_id'=>1,'created_at'=>'2026-01-02 06:31:44','updated_at'=>'2026-01-02 06:31:44'],
            ['id'=>8, 'matricula'=>'SIS006','nombre_completo'=>'Daniel Vargas Soto','genero'=>'Masculino','domicilio'=>'Col. Del Valle','telefono'=>'5551110006','correo'=>'daniel.sis6@mail.com','carrera_id'=>1,'generacion_id'=>3,'estatus_id'=>2,'created_at'=>'2026-01-02 06:31:44','updated_at'=>'2026-01-02 06:31:44'],
            ['id'=>9, 'matricula'=>'SIS007','nombre_completo'=>'Fernanda Ríos','genero'=>'Masculino','domicilio'=>'Col. Norte','telefono'=>'5551110007','correo'=>'fer.sis7@mail.com','carrera_id'=>1,'generacion_id'=>1,'estatus_id'=>1,'created_at'=>'2026-01-02 06:31:44','updated_at'=>'2026-01-02 06:31:44'],
            ['id'=>10,'matricula'=>'SIS008','nombre_completo'=>'Miguel Álvarez','genero'=>'Masculino','domicilio'=>'Col. Sur','telefono'=>'5551110008','correo'=>'miguel.sis8@mail.com','carrera_id'=>1,'generacion_id'=>2,'estatus_id'=>2,'created_at'=>'2026-01-02 06:31:44','updated_at'=>'2026-01-02 06:31:44'],
            ['id'=>11,'matricula'=>'SIS009','nombre_completo'=>'Paola Jiménez','genero'=>'Masculino','domicilio'=>'Col. Centro','telefono'=>'5551110009','correo'=>'paola.sis9@mail.com','carrera_id'=>1,'generacion_id'=>3,'estatus_id'=>1,'created_at'=>'2026-01-02 06:31:44','updated_at'=>'2026-01-02 06:31:44'],
            ['id'=>13,'matricula'=>'CON001','nombre_completo'=>'Laura Mendoza','genero'=>'Masculino','domicilio'=>'Col. Centro','telefono'=>'5552220001','correo'=>'laura.con1@mail.com','carrera_id'=>2,'generacion_id'=>1,'estatus_id'=>1,'created_at'=>'2026-01-02 06:34:14','updated_at'=>'2026-01-02 06:34:14'],
            ['id'=>14,'matricula'=>'CON002','nombre_completo'=>'Jorge Ramírez','genero'=>'Masculino','domicilio'=>'Col. Roma','telefono'=>'5552220002','correo'=>'jorge.con2@mail.com','carrera_id'=>2,'generacion_id'=>1,'estatus_id'=>2,'created_at'=>'2026-01-02 06:34:14','updated_at'=>'2026-01-02 06:34:14'],
            ['id'=>16,'matricula'=>'CON004','nombre_completo'=>'Ricardo Fuentes','genero'=>'Masculino','domicilio'=>'Col. Norte','telefono'=>'5552220004','correo'=>'ricardo.con4@mail.com','carrera_id'=>2,'generacion_id'=>2,'estatus_id'=>2,'created_at'=>'2026-01-02 06:34:14','updated_at'=>'2026-01-02 06:34:14'],
            ['id'=>17,'matricula'=>'CON005','nombre_completo'=>'Mónica Herrera','genero'=>'Masculino','domicilio'=>'Col. Sur','telefono'=>'5552220005','correo'=>'monica.con5@mail.com','carrera_id'=>2,'generacion_id'=>3,'estatus_id'=>1,'created_at'=>'2026-01-02 06:34:14','updated_at'=>'2026-01-02 06:34:14'],
            ['id'=>20,'matricula'=>'CON008','nombre_completo'=>'Iván Torres','genero'=>'Masculino','domicilio'=>'Col. Del Valle','telefono'=>'5552220008','correo'=>'ivan.con8@mail.com','carrera_id'=>2,'generacion_id'=>2,'estatus_id'=>2,'created_at'=>'2026-01-02 06:34:14','updated_at'=>'2026-01-02 06:34:14'],
            ['id'=>21,'matricula'=>'CON009','nombre_completo'=>'Claudia Moreno','genero'=>'Femenino','domicilio'=>'Col. Romance','telefono'=>'5552220009','correo'=>'claudia.con9@mail.com','carrera_id'=>2,'generacion_id'=>15,'estatus_id'=>3,'created_at'=>'2026-01-02 06:34:14','updated_at'=>'2026-01-04 09:42:10'],
            ['id'=>22,'matricula'=>'CON010','nombre_completo'=>'Héctor Luna','genero'=>'Masculino','domicilio'=>'Col. Centro','telefono'=>'5552220010','correo'=>'hector.con10@mail.com','carrera_id'=>2,'generacion_id'=>1,'estatus_id'=>2,'created_at'=>'2026-01-02 06:34:14','updated_at'=>'2026-01-02 06:34:14'],
            ['id'=>23,'matricula'=>'ADM001','nombre_completo'=>'Karen Flores','genero'=>'Masculino','domicilio'=>'Col. Centro','telefono'=>'5553330001','correo'=>'karen.adm1@mail.com','carrera_id'=>3,'generacion_id'=>1,'estatus_id'=>1,'created_at'=>'2026-01-02 06:34:37','updated_at'=>'2026-01-02 06:34:37'],
            ['id'=>24,'matricula'=>'ADM002','nombre_completo'=>'Raúl Medina','genero'=>'Masculino','domicilio'=>'Col. Norte','telefono'=>'5553330002','correo'=>'raul.adm2@mail.com','carrera_id'=>3,'generacion_id'=>1,'estatus_id'=>2,'created_at'=>'2026-01-02 06:34:37','updated_at'=>'2026-01-02 06:34:37'],
            ['id'=>25,'matricula'=>'ADM003','nombre_completo'=>'Daniela Ortiz','genero'=>'Masculino','domicilio'=>'Col. Juárez','telefono'=>'5553330003','correo'=>'daniela.adm3@mail.com','carrera_id'=>3,'generacion_id'=>2,'estatus_id'=>1,'created_at'=>'2026-01-02 06:34:37','updated_at'=>'2026-01-02 06:34:37'],
            ['id'=>26,'matricula'=>'ADM004','nombre_completo'=>'Francisco Pineda','genero'=>'Masculino','domicilio'=>'Col. Roma','telefono'=>'5553330004','correo'=>'francisco.adm4@mail.com','carrera_id'=>3,'generacion_id'=>2,'estatus_id'=>2,'created_at'=>'2026-01-02 06:34:37','updated_at'=>'2026-01-02 06:34:37'],
            ['id'=>27,'matricula'=>'ADM005','nombre_completo'=>'Andrea Navarro','genero'=>'Masculino','domicilio'=>'Col. Centro','telefono'=>'5553330005','correo'=>'andrea.adm5@mail.com','carrera_id'=>3,'generacion_id'=>3,'estatus_id'=>1,'created_at'=>'2026-01-02 06:34:37','updated_at'=>'2026-01-02 06:34:37'],
            ['id'=>28,'matricula'=>'ADM006','nombre_completo'=>'Óscar Reyes','genero'=>'Masculino','domicilio'=>'Col. Reforma','telefono'=>'5553330006','correo'=>'oscar.adm6@mail.com','carrera_id'=>3,'generacion_id'=>3,'estatus_id'=>2,'created_at'=>'2026-01-02 06:34:37','updated_at'=>'2026-01-02 06:34:37'],
            ['id'=>30,'matricula'=>'ADM008','nombre_completo'=>'Emilio Cruz','genero'=>'Masculino','domicilio'=>'Col. Sur','telefono'=>'5553330008','correo'=>'emilio.adm8@mail.com','carrera_id'=>3,'generacion_id'=>2,'estatus_id'=>2,'created_at'=>'2026-01-02 06:34:37','updated_at'=>'2026-01-02 06:34:37'],
            ['id'=>40,'matricula'=>'13220045','nombre_completo'=>'DANIEL BENITEZ','genero'=>'Masculino','domicilio'=>'hola','telefono'=>'5578742925','correo'=>'ejemplo@correo.com','carrera_id'=>2,'generacion_id'=>15,'estatus_id'=>2,'created_at'=>'2026-01-06 08:31:02','updated_at'=>'2026-01-06 08:31:12'],
            ['id'=>41,'matricula'=>'12548632','nombre_completo'=>'Habel','genero'=>'Masculino','domicilio'=>'hola','telefono'=>'5578742585','correo'=>'ana.sis2@mail.com','carrera_id'=>1,'generacion_id'=>3,'estatus_id'=>2,'created_at'=>'2026-01-06 09:49:42','updated_at'=>'2026-01-06 09:49:42'],
            ['id'=>42,'matricula'=>'13220049','nombre_completo'=>'DANIEL BENITEZ','genero'=>'Masculino','domicilio'=>'Juas','telefono'=>'5578742925','correo'=>'ejemplo@correo.com','carrera_id'=>2,'generacion_id'=>7,'estatus_id'=>3,'created_at'=>'2026-01-06 10:02:21','updated_at'=>'2026-01-06 10:02:21'],
        ]);
    }
}
