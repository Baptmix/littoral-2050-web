<table>
    <thead>
    <tr>
        <th>Nom de famille</th>
        <th>Prénom</th>
        <th>Adresse</th>
        <th>Code postal</th>
        <th>Ville</th>
    </tr>
    </thead>
    <tbody>
    @foreach($electors->electors as $elector)
        <tr>
            @if($elector->common_name == "")
                <td>{{$elector->birth_name}}</td>
            @elseif($elector->common_name == $elector->birth_name)
                <td>{{$elector->common_name}}</td>
            @else
                <td>{{$elector->birth_name}}</td>
            @endif
            <td>
                {{ strtok($elector->first_name, " ") }}</td>
            <td>{{ $elector->street_number }} {{ $elector->street_name }}</td>
            <td>{{ $elector->postal_code }}</td>
            <td>{{ $elector->city }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
