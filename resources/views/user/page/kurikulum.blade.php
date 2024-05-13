<div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">{{ isset($title) ? $title : '' }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">{{ isset($title) ? $title : '' }}
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <center>
                <h4>Kurikulum Program Studi TNU</h4>
            </center>
            <p>
                Di dalam Kurikulum, untuk menyelesaikan pendidikan tingkat sarjana terapan di Prodi DIV Teknik Navigasi
                Udara, taruna perlu lulus minimum 145 SKS. Total SKS tersebut tersusun dari 38 Mata Kuliah Wajib, 4 Mata
                Kuliah Umum & 30 SKS kegiatan OJT
            </p>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Semester 1</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" rowspan="2">No</th>
                                <th scope="col" rowspan="2">Kode</th>
                                <th scope="col" rowspan="2">Mata Kuliah</th>
                                <th scope="col" colspan="3">SKS</th>
                            </tr>
                            <tr>
                                <th scope="col">Teori</th>
                                <th scope="col">Praktek</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
