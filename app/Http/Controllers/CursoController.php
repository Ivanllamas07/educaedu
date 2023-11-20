<?php 
namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller {
    public function show($id) {
        // Cargar datos desde un archivo JSON
        $data = json_decode(file_get_contents(storage_path('cursos.json')), true);
        $curso = collect($data)->firstWhere('id', $id);

        if ($curso) {
            // Determinar si el curso es TOP
            $curso['esTop'] = collect($curso['opiniones'])->every(function ($opinion) {
                return $opinion['valoracion'] == 5;
            });
        }

        return response()->json($curso);
    }
}
 ?>