@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <h2>Silahkan Pilih Nama Anda, Untuk Memulai Media Belajar</h2>
    <form method="POST">
        <!--
                                                                                                                                            <label>Nama Anda</label>

                                                                                                                            <input type="text" class="form-control" placeholder="Nama Anda" name="nama">

                                                                                                                <input type="text" class="form-control" placeholder="Nama Anda" name="nama">
                                                                                                                -->

        <label>Nama Anda </label>
        <select class="js-example-basic-single" name="nama1" required>
            <option value="">== Pilih Nama == </option>
            @foreach ($siswa as $item)
                <option value="{{ $item->nama }} | {{ $item->kelas }}">{{ $item->nama }} | {{ $item->kelas }}</option>
            @endforeach
        </select>

        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
        <br>
        <br>
        <label>Nama Teman </label>
        <select class="js-example-basic-single2" name="nama2">
            <option value="">== Tidak Ada == </option>
            @foreach ($siswa as $item)
                <option value="{{ $item->nama }} | {{ $item->kelas }}">{{ $item->nama }} | {{ $item->kelas }}</option>
            @endforeach
        </select>

        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single2').select2();
            });
        </script>
        <br>

        <br>
        <input type="submit" class="btn btn-info" value="Simpan Nama">
        @csrf
    </form>

    <br>
    <hr>
    <?php
    $id = $_GET['id'] . '.png';
    $foto = \DB::select('SELECT * FROM `foto` WHERE `file_name` LIKE ?', [$id]);
    $file = $foto[0]->file_name;

    ?>

    <!--
        <img src="../../upload/{{ $file }}" class="img-rounded">
    -->
@endsection
