@extends('../index')
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
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($pegawai as $peg)

                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{ $peg['nip'] }}</td>
                        <td>{{ $peg['nama'] }}</td>
                        <td>{{ $peg['gender'] }}</td>
                        <td>{{ $peg['alamat'] }}</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href=""><i class="bi bi-eye"></i></a>
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