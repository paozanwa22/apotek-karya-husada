<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kadaluwarsa</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">Data Kadaluwarsa</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">

                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Kadaluwarsa-tab" data-toggle="tab" href="#Kadaluwarsa" role="tab" aria-controls="Kadaluwarsa" aria-selected="true">Kadaluwarsa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="akankadaluwarsa-tab" data-toggle="tab" href="#akankadaluwarsa" role="tab" aria-controls="akankadaluwarsa" aria-selected="false">Yang akan masuk kadaluwarsa</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Kadaluwarsa" role="tabpanel" aria-labelledby="Kadaluwarsa-tab">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                                <div class="tab-pane fade" id="akankadaluwarsa" role="tabpanel" aria-labelledby="akankadaluwarsa-tab">
                                    Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis neque eget tellus efficitur, eget maximus massa imperdiet. Morbi a mattis velit. Donec hendrerit venenatis justo, eget scelerisque tellus pharetra a.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<?= $this->endsection(); ?>