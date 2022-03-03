@extends('index')
@section('content')
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col mt-3">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200" id="missionTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(0)">id</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(1)">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(2)">Description</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(3)">country</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(4)">type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(5)">Statut</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(6)">speciality</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(7)">start</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" onclick="sortTable(8)">end</th>
                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Edit</span></th>
                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">delete</span></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm">
                    @foreach($missions as $mission)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{$mission->id}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{substr($mission->title, 0, 10)}}...</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{substr($mission->description, 0, 20) }}...</td>
                        <td class="px-3 py-4 whitespace-nowrap">
                        <img 
                            class="w-7 h-7 object-cover rounded-full border-2 border-indigo-500" 
                            src="https://flagcdn.com/{{strtolower($mission->country->code)}}.svg" 
                            alt="{{strtolower($mission->country->name)}}" 
                        />
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$mission->type}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$mission->statut->title}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$mission->speciality()->first()->speciality_name}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$mission->start_date}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$mission->end_date}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">edit</td>
                        <td class="px-6 py-4 whitespace-nowrap">delete</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <div class='mt-3'>{{ $missions->render() }}</div>
        </div>
    </div>
</div>
<script>
function sortTable(n) {
    let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("missionTable");
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