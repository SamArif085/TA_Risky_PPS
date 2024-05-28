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
            <?php
            $mataKuliahPerSemester = [];
            foreach ($link as $mataKuliah) {
                $idSemester = $mataKuliah['id_semester'];
                if (!isset($mataKuliahPerSemester[$idSemester])) {
                    $mataKuliahPerSemester[$idSemester] = [];
                }
                $mataKuliahPerSemester[$idSemester][] = $mataKuliah;
            }
            ?>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php foreach ($mataKuliahPerSemester as $semester => $mataKuliah) : ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link<?= $semester === 1 ? ' active' : '' ?>" id="tab-<?= $semester ?>"
                        data-bs-toggle="tab" data-bs-target="#semester-<?= $semester ?>" type="button" role="tab"
                        aria-controls="semester-<?= $semester ?>"
                        aria-selected="<?= $semester === 1 ? 'true' : 'false' ?>">Semester
                        <?= $semester ?>
                    </button>
                </li>
                <?php endforeach; ?>
            </ul>

            <div class="tab-content" id="myTabContent">
                <?php foreach ($mataKuliahPerSemester as $semester => $mataKuliah) : ?>
                <div class="tab-pane fade<?= $semester === 1 ? ' show active' : '' ?>" id="semester-<?= $semester ?>"
                    role="tabpanel" aria-labelledby="tab-<?= $semester ?>">
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
                            <?php foreach ($mataKuliah as $index => $mk) : ?>
                            <tr>
                                <td class="text-center">
                                    <?= $index + 1 ?>
                                </td>
                                <td class="text-center">
                                    <?= $mk['kode'] ?>
                                </td>
                                <td>
                                    <?= $mk['mata_kuliah'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $mk['teori'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $mk['praktek'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $mk['total'] ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
