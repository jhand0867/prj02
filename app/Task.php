<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // using a query scope

    /*
	>>> App\Task::incomplete()->get()
    => Illuminate\Database\Eloquent\Collection {#760
     all: [
       App\Task {#761
         id: 2,
         body: "Buy groceries",
         completed: 0,
         created_at: "2018-01-24 17:14:44",
         updated_at: "2018-01-24 17:14:44",
       },
       App\Task {#762
         id: 3,
         body: "Go back home",
         completed: 0,
         created_at: "2018-01-24 17:15:06",
         updated_at: "2018-01-24 17:15:06",
       },
       App\Task {#763
         id: 4,
         body: "Learn to cook",
         completed: 0,
         created_at: "2018-01-24 13:29:22",
         updated_at: "2018-01-24 13:29:22",
       },
     ],
   }

	Allows chaining with another criteria.

	App\Task::incomplete()->where('id','>=',3)->get()
	=> Illuminate\Database\Eloquent\Collection {#769
     all: [
       App\Task {#770
         id: 3,
         body: "Go back home",
         completed: 0,
         created_at: "2018-01-24 17:15:06",
         updated_at: "2018-01-24 17:15:06",
       },
       App\Task {#771
         id: 4,
         body: "Learn to cook",
         completed: 0,
         created_at: "2018-01-24 13:29:22",
         updated_at: "2018-01-24 13:29:22",
       },
     ],
   }


    */

    public function scopeIncomplete($query)
    {
    	return $query->where('completed', 0);
    }

    public function scopeFind($query,$opr,$val)
    {
    	return $query->where('id',$opr,$val);
    }
}
