<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;
    public $course, $current;

    // atrapa el slug del curso en la url (el método debe llamarse mount)
    public function mount(Course $course){
        $this->course = $course;
        foreach($course->lessons as $lesson){
            if(!$lesson->completed){
                $this->current = $lesson;
                break;
            }
        }

        // En caso de que todas las lecciones esten completadas
        if(!$this->current){
            $this->current = $course->lessons->last();
        }

        // Verifica si el usuario tiene autorización para ingresar al curso
        $this->authorize('enrolled', $course);
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    // MÉTODOS

    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;
    }

    public function completed(){
        if($this->current->completed){
            // Eliminar registro
            $this->current->users()->detach(auth()->user()->id);
        }else{
            // Agregar registro
            $this->current->users()->attach(auth()->user()->id);
        }
        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    // PROPIEDADES COMPUTADAS

    // Propiedad computada para index
    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    // Propiedad computada para previous
    public function getPreviousProperty(){
        if($this->index == 0){
            return null;
        }else{
            return $this->course->lessons[$this->index - 1];
        }
    }

    // Propiedad computada para next
    public function getNextProperty(){
        if($this->index == $this->course->lessons->count() - 1){
            return null;
        }else{
            return $this->course->lessons[$this->index + 1];
        }
    }
    
    // Propiedad computada para advance
    public function getAdvanceProperty(){
        $i = 0;
        foreach ($this->course->lessons as $lesson) {
            if($lesson->completed){
                $i++;
            }
        }
        $advance = ($i * 100)/($this->course->lessons->count());
        return round($advance, 2);
    }

    public function download(){
        return response()->download(storage_path('app/public/' . $this->current->resource->url));
    }
}