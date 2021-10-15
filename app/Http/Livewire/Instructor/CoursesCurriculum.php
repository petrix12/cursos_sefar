<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesCurriculum extends Component
{
    use AuthorizesRequests;

    public $course, $section, $name;

    protected $rules = [
        'section.name' => 'required'
    ];

    public function mount(Course $course){
        $this->course = $course;
        $this->section = new Section();
        $this->authorize('dicatated', $course);
    }

    public function render()
    {
        // Le indicaremos que queremos utilizar una plantilla con la vista
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor');
    }

    public function store(){
        $this->validate([
            'name' => 'required'
        ]);
        Section::create([
            'name' => $this->name,
            'course_id' => $this->course->id
        ]);
        $this->reset('name');
        // Refresca la información de la vista
        $this->course = Course::find($this->course->id);
    }

    public function edit(Section $section){
        $this->section = $section;
    }

    public function update(){
        $this->validate();  // valida lo indicado en protected $rules = [..]
        $this->section->save();
        $this->section = new Section();
        // Refresca la información de la vista
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Section $section){
        $section->delete();
        // Refresca la información de la vista
        $this->course = Course::find($this->course->id);
    }
}