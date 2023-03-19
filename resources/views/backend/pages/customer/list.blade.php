@extends('backend.master')

@section('content')

    <h1>Customer List</h1>

    <table class="table table-striped customer_list">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">status</th>
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
            var table = $('.customer_list').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [
                    [20, 50, 100, -1],
                    [20, 50, 100, 'All'],
                ],
                ajax: "{{ route('customer.list') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'status', name: 'status'},
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
