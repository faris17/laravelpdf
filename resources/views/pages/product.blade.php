<table>
    <tr>
        <td colspan="4" rowspan="2" align="center"> Product User</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr style="border-style: solid;">
        <th>No</th>
        <th>Nama product</th>
        <th>Description</th>
        <th>Name User</th>
    </tr>
    @php
        $no = 1;
    @endphp
    @foreach ($result as $row)

        <tr class="border-b border-gray-200 hover:bg-gray-100">

            <td>{{ $row->id}}</td>
            <td>{{ $row->nameproduct }}</td>
            <td>{{ $row->description }}</td>
            <td>{{ $row->user->name }}</td>


        </tr>
    @endforeach
</table>
