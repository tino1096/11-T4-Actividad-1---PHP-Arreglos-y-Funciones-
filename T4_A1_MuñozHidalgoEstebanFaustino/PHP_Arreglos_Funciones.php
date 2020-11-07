<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>PHP [Arreglos y Funciones]</title>
    </head>
    <body>
        <?php
            echo "<h1> Ejercicio de arreglos asociativos y funciones PHP </h1>";
        
            $vectorAlumnos = array("Esteban"=> $calificaciones=array(70, 90, 80, 85, 88, 95),
            "Miguel"=> $calificaciones=array(75, 71, 100, 83, 100, 94),
            "David"=> $calificaciones=array(90, 83, 76, 75, 100, 91),
            "Sergio"=> $calificaciones=array(94, 100, 90, 72, 88, 95),
            "Abraham"=> $calificaciones=array(95, 80, 100, 90, 95, 100),
            "Juan"=> $calificaciones=array(80, 92, 70, 79, 100, 93),
            "Luis"=> $calificaciones=array(70, 71, 90, 85, 95, 80),
            "Frank"=> $calificaciones=array(94, 80, 100, 86, 90, 75),
            "Sofia"=> $calificaciones=array(75, 90, 88, 100, 77, 100),    
            "Karla"=> $calificaciones=array(90, 80, 70, 100, 85, 95));
        
            echo "<table style='border: 2px solid blue;'>";
            echo "<tr>";
            echo "<th style='border: 1px solid grey;'> Nombre </th>"; 
            echo "<th style='border: 1px solid grey;'> Historia </th>";
            echo "<th style='border: 1px solid grey;'> Matematicas </th>";
            echo "<th style='border: 1px solid grey;'> Administracion </th>";
            echo "<th style='border: 1px solid grey;'> Programacion </th>";
            echo "<th style='border: 1px solid grey;'> Diseño </th>";
            echo "<th style='border: 1px solid grey;'> Fisica </th>";
            echo "<th style='border: 1px solid grey;'> Promedio del Alumno </th>";
            echo "</tr>";
        
            $arrayPromedioAlumnos = obtenerPromedioAlumnos($vectorAlumnos);    
        
            obtenerPromedioMaterias($vectorAlumnos);
            
            echo "<td style='border: 1px solid black;'>";
            $promedioGeneral = obtenerPromedioGeneral($vectorAlumnos);
            echo $promedioGeneral;
            echo "</td>";
            
            echo "</table>";
        
            obtenerMejorPromedio($arrayPromedioAlumnos);
            obtenerPromediosSuperioresAlGeneral($arrayPromedioAlumnos, $promedioGeneral);
            
        
            function obtenerPromedioAlumnos($vectorAlumnos) {
                $promedioAlumno = 0;
                $contadorCalificacionesAlumnos = 0;
                $sumatoriaAlumno = 0;
                $arrayPromedioAlumnos = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $alumno = 0;
                
                foreach ($vectorAlumnos as $key => $value) {
                    echo "<tr> <td style='border: 1px solid grey;'> ";
                    echo $key;
                    echo "</td>";
                
                    foreach ($value as $calificaciones) {
                        echo "<td style='border: 1px solid grey;'> ";
                        echo $calificaciones;
                        echo "</td>";
                        $sumatoriaAlumno += $calificaciones;
                        $contadorCalificacionesAlumnos++;
                    } 

                    $promedioAlumno = $sumatoriaAlumno/$contadorCalificacionesAlumnos;
                    $arrayPromedioAlumnos[$alumno] = $promedioAlumno;

                    $contadorCalificacionesAlumnos = 0;
                    $sumatoriaAlumno = 0;
                    $alumno++;

                    echo "<td style='border: 1px solid grey;'> ";
                    echo $promedioAlumno;
                    echo "</td>";

                    echo "</tr>";
                }
                
                return $arrayPromedioAlumnos;
            }    
        
            function obtenerPromedioMaterias($vectorAlumnos) {
                $materia = 0;
                $arraySumatoriaMaterias = array(0, 0, 0, 0, 0, 0);

                foreach ($vectorAlumnos as $clave => $valor) {
                    foreach ($valor as $calificaciones) {
                        $arraySumatoriaMaterias[$materia] += $calificaciones;
                        $materia++;
                    }

                    $materia = 0;
                }

                echo "<tr> <td style='border: 1px solid grey;'> Promedio Materia </td>";
                $arrayPromedioMaterias = array(0, 0, 0, 0, 0, 0);

                foreach ($arraySumatoriaMaterias as $sumatorias) {
                    $promedioMateria = $sumatorias/sizeof($vectorAlumnos);
                    $arrayPromedioMaterias[$materia] = $promedioMateria;
                    echo "<td style='border: 1px solid grey;'>";
                    echo $promedioMateria;
                    echo "</td>";
                    $materia++;
                }
            }
        
            function obtenerPromedioGeneral($vectorAlumnos) {
                $promedioGeneral = 0;
                $sumatoriaTotal = 0;
                $contadorCalificaciones = 0;
                
                foreach ($vectorAlumnos as $key => $value) {
                    foreach ($value as $calificaciones) {
                        $sumatoriaTotal += $calificaciones;
                        $contadorCalificaciones++;
                    }
                }
                $promedioGeneral = $sumatoriaTotal/$contadorCalificaciones;
                
                return $promedioGeneral;
            }
        
            function obtenerMejorPromedio($arrayPromedioAlumnos) {
                sort($arrayPromedioAlumnos);
                echo "<br> Mejor Promedio de los alumnos: " . $arrayPromedioAlumnos[sizeof($arrayPromedioAlumnos)-1];
            }
        
            function obtenerPromediosSuperioresAlGeneral($arrayPromedioAlumnos, $promedioGeneral) {
                $promedioSuperiorAlGeneral = 0;
        
                for ($i=0; $i<sizeof($arrayPromedioAlumnos); $i++) {
                    if ($arrayPromedioAlumnos[$i]>$promedioGeneral) {
                        $promedioSuperiorAlGeneral++;
                    }
                }
                
                echo "<br> Promedios superiores al Promedio general: " . $promedioSuperiorAlGeneral;
            }
        ?>
        
        <table>
            <tr>
                <th></th>
            </tr>
        </table>
    </body>
</html>