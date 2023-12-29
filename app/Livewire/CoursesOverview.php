<?php

namespace App\Livewire;

use App\Models\course;
use App\Models\programme;
use App\Models\studentCourse;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesOverview extends Component
{

    use WithPagination;

    public $perPage = 6;

    public $name;
    public $programme = '%';

    public $selectedRecord;
    public $showModal = false;


    public $loading = 'Heb geduld godverdomme';

    public function updated($property, $value)
    {
        // $property: The name of the current property being updated
        // $value: The value about to be set to the property
        if (in_array($property, ['perPage', 'name', 'programme']))
            $this->resetPage();
    }

    public function showCourses(Course $record)
    {
        $this->selectedRecord = $record;
        $students = studentCourse::where('course_id','like',$record->id)->with('students')->get();
        //dump($students->toArray());
        $this->selectedRecord['students'] = $students;
        //dump($this->selectedCourse->toArray());
        $this->showModal = true;
    }
    #[Layout('layouts.studentadministration',['title'=>'Courses overview','description'=>'Here you will find an overview from our course'])]
    public function render()
    {
        $allprogrammes = programme::has('courses')->withCount('courses')->get();
        $courses = course::orderBy('name')
            ->where([
                ['name','like',"%{$this->name}%"],
                ['programme_id','like',$this->programme]
            ])
            ->orWhere([
                ['description','like',"%{$this->name}%"],
                ['programme_id','like',$this->programme]
            ])
            ->with('programme')
            ->with('student_courses')
            ->paginate($this->perPage);

        return view('livewire.course', compact('courses','allprogrammes'));
    }
}
