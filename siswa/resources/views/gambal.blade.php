@extends('template')


@section('judul')
    Gambar Media Link
@endsection


@section('isi')
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Link</th>
                <th>Gambar</th>

            </tr>
        </thead>
        <tbody>
            <b>Silahkan Copy Paste Pada Link</b>
            @foreach ($gambar as $item)
                <tr>
                    <td>/mediabelajar/app/files/{{ $item->nama_gambar }}
                        <!-- The text field -->



                    </td>
                    <td><img src="http://{{ $ip }}/mediabelajar/app/files/{{ $item->nama_gambar }}"
                            class="img-rounded" width="300" height="300">
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
