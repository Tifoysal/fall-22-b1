@extends('backend.master')

@section('content')

    <h1>User List</h1>

    <a href="{{route('user.create')}}" class="btn btn-primary" >Create New User</a>

    <table class="table table-striped users_list">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Full Name</th>
            <th scope="col">Role</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>



@endsection

@push('js')

    <script type="text/javascript">
        $(function () {
            var table = $('.users_list').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [
                    [20, 50, 100, -1],
                    [20, 50, 100, 'All'],
                ],
                ajax: "{{ route('admin.users') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'date', name: 'date',searchable: true},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'mobile', name: 'mobile'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endpush
