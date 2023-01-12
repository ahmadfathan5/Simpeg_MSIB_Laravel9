@extends('admin.index')
@section('content')

<!-- Recent Sales -->
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Recent Sales <span>| Today</span></h5>

            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($staff as $staff)

                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{ $staff['nip'] }}</td>
                        <td>{{ $staff['name'] }}</td>
                        <td>{{ $staff['gender'] }}</td>
                        <td>{{ $staff['alamat'] }}</td>
                        <td>{{ $staff['email'] }}</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href="{{route('staff.show', $staff['id'])}}"><i class="bi bi-eye"></i></a>
                            <a class='btn btn-warning btn-sm' href=""><i class="bi bi-pencil"></i></a>
                            <a class='btn btn-danger btn-sm' href=""><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div><!-- End Recent Sales -->

@endsection