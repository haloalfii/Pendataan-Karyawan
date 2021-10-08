<h1>Employees Data</h1>
<table border="1" style="width: 100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employee as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->company->name }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
