<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CoursesOverview extends Component
{
    #[Layout('layouts.studentadministration',['title'=>'Courses overview','description'=>'Here you will find an overview from our courses'])]
    public function render()
    {
        return view('livewire.course');
    }
}
