<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Requeriment;
use Livewire\Component;

class CoursesRequirements extends Component
{
    public $course, $requirement, $name;

    protected $rules = [
        'requirement.name' => 'required'
    ];

    public function mount(Course $course){
        $this->course = $course;
        $this->requirement = new Requeriment();
    }

    public function render()
    {
        return view('livewire.instructor.courses-requirements');
    }

    public function store(){
        $this->validate([
            'name' => 'required'
        ]);
        $this->course->requirements()->create([
            'name' => $this->name
        ]);
        $this->reset('name');
        $this->course = Course::find($this->course->id);
    }

    public function edit(Requeriment $requirement){
        $this->requirement = $requirement;
    }

    public function update(){
        $this->validate();
        $this->requirement->save();
        $this->requirement = new Requeriment();
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Requeriment $requirement){
        $requirement->delete();
        $this->course = Course::find($this->course->id);
    }
}