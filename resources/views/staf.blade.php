@extends("template")
@section("content")
<h3>Data Petugas</h3>
<?php if (Session::has("message")): ?>
    <div class="alert alert-dismissible alert-info">
        {{ Session::get("message") }}
        <span class="close" data-dismiss="alert">&times;</span>
    </div>
<?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Petugas</th>
                <th>No Karyawan</th>
                <th>Tanggal Lahir</th>
                <th>Kelamin</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stafs as $staf)
            <tr>
                <td>{{ $staf->nama_petugas }}</td>
                <td>{{ $staf->no_karyawan }}</td>
                <td>{{ $staf->tanggal_lahir }}</td>
                <td>{{ $staf->kelamin }}</td>
                <td>{{ $staf->created_at }}</td>
                <td>{{ $staf->updated_at }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#modal" onclick='Edit({!! json_encode($staf) !!})'>
                    Edit
                    </button>
                    <a href='{{ url("/delete_staf/$staf->id") }}'>
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-success" data-toggle="modal"
    data-target="#modal" onclick="Add()">Tambah Data</button>
    
    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Form Petugas</h4>
                    <span class="close" data-dismiss="modal">&times;</span>
                </div>
                <form action="{{ url('/save_staf') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="action" id="action" />
                    <input type="hidden" name="id" id="id" />
                    <div class="modal-body">
                    Nama Petugas
                    <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" required />
                    No Karyawan
                    <input type="number" name="no_karyawan" id="no_karyawan" class="form-control" required />
                    Tanggal Lahir
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required />
                    Kelamin
                    <!-- <input type="text" name="kelamin" id="kelamin" required /> -->
                    <select name="kelamin" id="kelamin" class="form-control">
                        <option value="P">P</option>
                        <option value="L">L</option>
                    </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function Add(){
            document.getElementById("action").value = "insert";
            document.getElementById("nama_petugas").value = "";
            document.getElementById("no_karyawan").value = "";
            document.getElementById("tanggal_lahir").value = "";
            document.getElementById("kelamin").value = "";
        }

        function Edit(Petugas){
            document.getElementById("action").value = "update";
            document.getElementById("id").value = Petugas.id;
            document.getElementById("nama_petugas").value = Petugas.nama_petugas;
            document.getElementById("no_karyawan").value = Petugas.no_karyawan;
            document.getElementById("tanggal_lahir").value = Petugas.tanggal_lahir;
            document.getElementById("kelamin").value = Petugas.kelamin;
        }
    </script>
    @endsection