@extends('admin.index')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Pegawai</h5>
            <br />
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br />
            <a class="btn btn-primary" title="Tambah Pegawai" href=" {{ route('pegawai.create') }}">
                <i class="bi bi-save"></i>
            </a>&nbsp;
            <a class="btn btn-danger" title="Export to PDF Pegawai" href="{{ url('pegawai-pdf') }}">
                <i class="bi bi-file-earmark-pdf"></i>
            </a>&nbsp;
            <a class="btn btn-success" title="Export to Excel Pegawai" href="{{ url('pegawai-excel') }}">
                <i class="bi bi-file-earmark-excel"></i>
            </a>&nbsp;
            <br /><br />
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Divisi</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($pegawai as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->nip }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jabatan->nama }}</td>
                        <td>{{ $row->divisi->nama }}</td>
                        <td>{{ $row->gender }}</td>
                        <td width="10%">
                            @empty($row->foto)
                            <img src="{{ url('admin/img/nophoto.png') }}" width="35%" alt="Profile" class="rounded-circle">
                            @else
                            <img src="{{ url('admin/img')}}/{{$row->foto}}" width="35%" alt="Profile" class="rounded-circle">
                            @endempty
                        </td>
                        <td width="15%">
                            <form method="POST" id="formDelete">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm" title="Detail Pegawai"
                                    href=" {{ route('pegawai.show',$row->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-warning btn-sm" title="Ubah Pegawai"
                                    href=" {{ route('pegawai.edit',$row->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                &nbsp;
                                <button type="submit" 
                                data-action="{{ route('pegawai.destroy',$row->id) }}"
                                class="btn btn-danger btn-sm btnDelete" title="Hapus Pegawai">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    $('body').on('click', '.btnDelete', function(e) {
    e.preventDefault();
    var action = $(this).data('action');
    Swal.fire({
        title: 'Yakin ingin menghapus data ini?',
        text: "Data yang sudah dihapus tidak bisa dikembalikan lagi",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Yakin'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#formDelete').attr('action', action);
            $('#formDelete').submit();
        }
    })
})
</script>
@endsection