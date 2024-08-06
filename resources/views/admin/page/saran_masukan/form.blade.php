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
                <form class="forms-sample" action="{{ route('saran-masukan.submit') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="saran_masuk">Saran & Masukan</label>
                                <textarea class="form-control" id="saran_masuk" name="saran_masuk"
                                    placeholder="Saran & Masukan....."></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
