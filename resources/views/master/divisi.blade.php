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
                        <th scope="col">Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($divisi as $div)

                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{ $div['nama'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div><!-- End Recent Sales -->

@endsection