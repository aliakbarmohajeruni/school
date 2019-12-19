<?php namespace App\Models;


class Course extends DB
{
    protected $table = 'courses';


    public function capacityIncrement($id)
    {
      $course   = $this->find('id' ,$id);
      if($course){
        $course->capacity += 1;
        $this->update($course->id ,[
          'capacity' => $course->capacity
        ]);
      }

    }

    public function capacityDecrement($id)
    {
      $course   = $this->find('id' ,$id);
      if($course){
        $course->capacity -= 1;
        $this->update($course->id ,[
          'capacity' => $course->capacity
        ]);
      }
    }
}
