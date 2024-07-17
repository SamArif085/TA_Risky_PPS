<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="font-weight-bold mb-0">{{ $subtitle }}</h4>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form {{ $judulForm }}</h4>
                <form class="forms-sample" action="{{ route('presensi.submit') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="Semester">Semester</label>
                                <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="qrcode" id="qrcode" value="">
                                <input type="text" class="form-control" id="semester" placeholder="Semester"
                                    name="semester" value="{{ $semester }}" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="angkatan">Angkatan</label>
                                <input type="text" class="form-control" id="angkatan" placeholder="Angkatan"
                                    name="angkatan" value="{{ $angkatan }}" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="kode_matkul">Kode matkul</label>
                                <input type="text" class="form-control" id="kode_matkul" placeholder="kode_matkul"
                                    name="kode_matkul" value="{{ $kode_matkul }}" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" placeholder="tanggal"
                                    name="tanggal" value="{{ $tanggal }}" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="waktu_masuk">Waktu Masuk</label>
                                <input type="time" class="form-control" id="waktu_masuk" placeholder="waktu_masuk"
                                    name="waktu_masuk" value="{{ $waktu }}" readonly>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="status_kehadiran">Status Kehadiran</label>
                                <div id="status_kehadiran" class="row">
                                    @foreach ($status_kehadiran as $item)
                                    <div class="col-auto mx-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status_kehadiran"
                                                id="status_kehadiran_{{ $loop->index }}" value="{{ $item }}">
                                            <label class="form-check-label" for="status_kehadiran_{{ $loop->index }}">
                                                {{ $item }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="ttd">Upload QR-Code Presensi</label>
                                <input type="file" class="form-control" id="ttd" placeholder="ttd" name="ttd"
                                    accept="image/*" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <img id="image" />
                            <div id="result"></div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="keterangan">keterangan (optional)</label>
                                <textarea class="form-control" id="keterangan" name="keterangan"
                                    placeholder="keterangan" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary mr-2" disabled>Submit</button>
                    <a href="{{ route('matkul_mhs') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')

<script>
    $(document).ready(function() {
        // Select input file element
        var inputFile = document.getElementById('ttd');

        // When file input changes
        inputFile.addEventListener('change', function() {
            var file = this.files[0];
            var formData = new FormData();
            formData.append('file', file);

            fetchRequest(file, formData); // Call fetchRequest function with file and formData
        });

        // Function to fetch request
        function fetchRequest(file, formData) {
            var infoText = $("#result"); // Assuming you have a div with id 'result' to show information

            Swal.fire({
                title: 'Scanning QR Code...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: "http://api.qrserver.com/v1/read-qr-code/",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(result) {
                    result = result[0].symbol[0].data; // Assuming result format is JSON array with symbol object

                    if (result) {
                        Swal.fire({
                            icon: 'success',
                            title: 'QR Code scanned successfully',
                            text: result,
                        });
                        $("#qrcode").val(result); // Save QR Code to hidden input field
                        $("#image").attr("src", URL.createObjectURL(file)); // Display image preview
                        searchDataUser(result);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to scan QR Code',
                            text: 'Please try again or upload a valid QR Code image.',
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to scan QR Code',
                        text: 'Please try again later.',
                    });
                },
                complete: function() {
                    Swal.close();
                }
            });
        }

        function searchDataUser(kode_user) {
            $.ajax({
                type: "post",
                url: `{{ route('search_data_mhs.cari') }}`,
                data: {
                    kode_user: kode_user
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == 200) {
                        // console.log(response.message);
                        // swal
                        Swal.fire({
                            icon:'success',
                            title: 'Data Ditemukan',
                            text: response.message.nama,
                        });
                        $("#submit").prop('disabled', false);
                    } else {
                        console.log(response.message);
                    }
                }
            });
        }
    });
</script>


@endsection
