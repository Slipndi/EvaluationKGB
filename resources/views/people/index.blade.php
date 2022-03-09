@extends('index')
@section('content')
<div class="flex flex-col mt-3">
  <x-error.success />
  <x-error.handler />
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200" id="peopleTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(0)"></th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(1)">Codename</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(2)">Fullname</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(3)">nationality</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(4)">role</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(5)">birthdate</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(6)">specialities</th>
                        <th scope="col" class="relative px-6 py-3"><x-buttons.add href='/persons/create' title='create person'/></th>
                        <th scope="col" class="relative px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm">
                    @foreach($people as $person)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"> 
                          <img 
                            class="w-full h-10 object-cover rounded-full border-2 border-indigo-500" 
                            src="{{$person->picture}}" 
                            alt="{{strtolower($person->code_name)}}"
                            title="{{strtolower($person->code_name)}}"  
                        /></td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$person->code_name}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$person->first_name}} {{strtoupper($person->last_name)}}</td>
                        <td class="px-3 py-4 whitespace-nowrap">
                        <img 
                            class="w-full h-10 object-cover rounded-full border-2 border-indigo-500" 
                            src="https://flagcdn.com/{{strtolower($person->country->code)}}.svg" 
                            alt="{{strtolower($person->country->name)}}" 
                            title="{{strtolower($person->country->name)}}" 
                        />
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$person->role()->first()->title}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$person->birthdate}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <ul>
                          @foreach($person->specialities()->get() as $speciality)
                            <li>{{$speciality->speciality_name}}</li>
                          @endforeach
                        </ul>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-blue-600">
                        <a href="{{route('people.edit', $person)}}">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                          </svg>
                        </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-red-600">
                        <form method="POST" action="{{route('people.destroy', $person)}}">
                          @csrf
                          @method('DELETE')
                          <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                          </button>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <div class='mt-3'>{{ $people->render() }}</div>
        </div>
    </div>
</div>
<script>
function sortTable(n) {
    let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("peopleTable");
    switching = true;
  // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
  no switching has been done: */
    while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
        shouldSwitch = false;
    /* Get the two elements you want to compare,
      one from current row and one from the next: */
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
        if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
        }
        } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
        }
    }
    }
    if (shouldSwitch) {
    /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      // Each time a switch is done, increase this count by 1:
        switchcount ++;
    } else {
    /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
    if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
    }
    }
    }
}
</script>

@endsection