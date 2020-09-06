<div class="container-fluid" id="all">
    <?= $this->session->flashdata('pesan') ?>
</div>

<div class="container-fluid mt-3" >
    
    <div class="card shadow mb-4">
        <div class="card-header">
            <button class="btn btn-dark" data-toggle="modal" data-target="#tambah_proses">Tambah Proses</button>
        </div>
        <div class="card-body"> 
            <div class="mb-4 mt-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('proses'); ?>">Semua Lamaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('proses/diterima'); ?>">Lamaran Diterima</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('proses/ditolak'); ?>">Lamaran Ditolak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('proses/menunggu'); ?>">Lamaran Menunggu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('proses/tidak_ada_respon'); ?>">Lamaran Tidak Ada Respon</a>
                    </li>
                </ul>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="datatable">
                    <thead class="atas">
                        <tr>
                            <th rowspan="2" class="nomor">No</th>
                            <th rowspan="2" class="tanggal">Tanggal</th>
                            <th rowspan="2" class="perusahaan">Nama Perusahaan</th>
                            <th rowspan="2" class="psikotes">Psikotes</th>
                            <th colspan="3" class="interview">Interview</th>
                            <th rowspan="2" class="status">Status</th>
                            <th rowspan="2" class="aksi">Aksi</th>
                        </tr>
                        <tr>
                            <th class="hrd">Hrd</th>
                            <th class="user">User</th>
                            <th class="owner">Owner</th>
                        </tr>
                    </thead>

                    <?php 
                        $no = 0;
                        foreach ($tampil_tidak_ada_respon as $row) { 
                        $no++;
                    ?>
                    <tbody>
                        <tr>
                            <td class="nomor"><?= $no ?></th>
                            <td class="tanggal"><?= $row->tanggal; ?></td>
                            <td><?= $row->nama_perusahaan; ?></td>
                            <td class="psikotes"><?= $row->psikotes; ?></td>
                            <td class="hrd"><?= $row->interview_hrd; ?></td>
                            <td class="interview"><?= $row->interview_user; ?></td>
                            <td class="owner"><?= $row->interview_owner; ?></td>
                            <td class="status"><?= $row->status_kepastian; ?></td>
                            <td class="aksi">
                                <a href="#!" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_proses<?php echo $row->id_data_proses; ?>">
                                    <i class="fas fa-th-list"></i>
                                </a>
                                <a href="#!" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_proses<?php echo $row->id_data_proses; ?>">
                                    <i class="fas fa-pen-alt"></i>
                                </a>
                                <a href="#!" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_proses<?php echo $row->id_data_proses; ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>

                    <?php } ?>

                    <tfoot>
                        <tr>
                            <th class="nomor">No</th>
                            <th class="tanggal">Tanggal</th>
                            <th class="perusahaan">Nama Perusahaan</th>
                            <th class="psikotes">Psikotes</th>
                            <th class="hrd">Hrd</th>
                            <th class="user">User</th>
                            <th class="owner">Owner</th>
                            <th class="status">Status</th>
                            <th class="aksi">Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="backTop">
    <div class="back">
        <i class="fa fa-angle-up" id="back"></i>
    </div>
</div>

<div class="modal fade" id="tambah_proses" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_proses">Detail Proses Data Lamaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>
            <form action="<?= base_url('proses/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="ml-2">Tanggal</label>
                        <input type="text" class="form-control" name="tanggal" id="datepicker" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Nomor Telephone</label>
                        <input type="number" class="form-control" name="no_hp" value="62" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Email Perusahaan</label>
                        <input type="email" class="form-control" name="email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Kirim Dari</label>
                        <select name="kirim_dari" class="form-control form-control-user">
                            <option disable selected>--Pilih Kirim Lamaran Dari--</option>
                            <option value="Email">Email</option>
                            <option value="Web">Web</option>
                            <option value="Google Form">Google Form</option>
                            <option value="Kirim Berkas">Kirim Berkas</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($tampil as $row) { ?>
<div class="modal fade" id="detail_proses<?php echo $row->id_data_proses; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_proses">Detail Proses Data Lamaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover mt-3">
                    <tr>
                        <th class="detail_proses">Tanggal</th>
                        <th class="sama_dengan">:</th>
                        <td><?= $row->tanggal; ?></td>
                    </tr>
                    <tr>
                        <th class="detail_proses">Nomor Handphone</th>
                        <th class="sama_dengan">:</th>
                        <td>
                            <a href="https://wa.me/<?= $row->no_hp; ?>" target="_blank">
                                <?= $row->no_hp; ?>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="detail_proses">email</th>
                        <th class="sama_dengan">:</th>
                        <td>
                            <a href="mailto:<?= $row->email; ?>">
                                <?= $row->email; ?> 
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="detail_proses">Nama Perusahaan</th>
                        <th class="sama_dengan">:</th>
                        <td><?= $row->nama_perusahaan; ?></td>
                    </tr>
                    <tr>
                        <th class="detail_proses">Kirim Dari</th>
                        <th class="sama_dengan">:</th>
                        <td><?= $row->kirim_dari; ?></td>
                    </tr>
                    <tr>
                        <th class="detail_proses">Psikotes</th>
                        <th class="sama_dengan">:</th>
                        <td><?= $row->psikotes; ?></td>
                    </tr>
                    <tr>
                        <th class="detail_proses">Interview HRD</th>
                        <th class="sama_dengan">:</th>
                        <td><?= $row->interview_hrd; ?></td>
                    </tr>
                    <tr>
                        <th class="detail_proses">Interview User</th>
                        <th class="sama_dengan">:</th>
                        <td><?= $row->interview_user; ?></td>
                    </tr>
                    <tr>
                        <th class="detail_proses">Interview Owner</th>
                        <th class="sama_dengan">:</th>
                        <td><?= $row->interview_owner; ?></td>
                    </tr>
                    <tr>
                        <th class="detail_proses">Tes Kesehatan</th>
                        <th class="sama_dengan">:</th>
                        <td><?= $row->tes_kesehatan; ?></td>
                    </tr>
                    <tr>
                        <th class="detail_proses">Status</th>
                        <th class="sama_dengan">:</th>
                        <td><?= $row->status_kepastian; ?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach ($tampil as $row) { ?>
<div class="modal fade" id="edit_proses<?php echo $row->id_data_proses; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_proses">Ubah Proses Data Lamaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>
            <form action="<?= base_url('proses/ubah/' . $row->id_data_proses) ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="ml-2">Tanggal</label>
                        <input type="text" class="form-control datepicker" name="tanggal" value="<?= $row->tanggal; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Nomor Telephone</label>
                        <input type="number" class="form-control" name="no_hp" value="<?= $row->no_hp; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Email Perusahaan</label>
                        <input type="email" class="form-control" name="email" value="<?= $row->email; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan" value="<?= $row->nama_perusahaan; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Kirim Dari</label>
                        <select name="kirim_dari" class="form-control form-control-user">
                            <option disable selected><?= $row->kirim_dari; ?></option>
                            <hr>
                            <option value="Email">Email</option>
                            <option value="Web">Web</option>
                            <option value="Google Form">Google Form</option>
                            <option value="Kirim Berkas">Kirim Berkas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Psikotes</label>
                        <input type="text" class="form-control" name="psikotes" value="<?= $row->psikotes; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Interview HRD</label>
                        <input type="text" class="form-control" name="interview_hrd" value="<?= $row->interview_hrd; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Interview User</label>
                        <input type="text" class="form-control" name="interview_user" value="<?= $row->interview_user; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Interview Owner</label>
                        <input type="text" class="form-control" name="interview_owner" value="<?= $row->interview_owner; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="ml-2">Tes Kesehatan</label>
                        <input type="text" class="form-control" name="tes_kesehatan" value="<?= $row->tes_kesehatan; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="ml-2">Status Kepastian</label>
                        <select name="status_kepastian" class="form-control form-control-user">
                            <option disable selected><?= $row->status_kepastian; ?></option>
                            <option value="Menunggu">Menunggu</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Tidak Ada Respon">Tidak Ada Respon</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach ($tampil as $row) { ?>
<div class="modal fade" id="hapus_proses<?php echo $row->id_data_proses; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Akan Dihapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>
            <div class="modal-body">
                Jika Menekan Hapus, Data Lamaran <b><?= $row->nama_perusahaan; ?></b> Akan Dihapus Secara Permanent?
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <a href="<?= base_url('proses/hapus/' . $row->id_data_proses) ?>" type="submit" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>
