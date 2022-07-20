<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\student;
use App\Models\school;
use Event;
use App\Events\ReorderStudents;

class ReorderStudent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reorder:student';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reorder students of school on the platform';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $schools = school::all();
        foreach($schools as $school)
        {
            $studentSchool=student::where('school_id',$school->id)->orderBy('order')->get();
            $i=0;
            foreach($studentSchool as $student)
            {
                $i++;
                $update=student::find($student->id);
                $update->order=$i;
                $update->save();
            }
        }
        Event::dispatch(new ReorderStudents());

                 
     }
}
