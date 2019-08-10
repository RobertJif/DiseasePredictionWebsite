
<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include ('include/header.php');?>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Gejala</h4>
                                <input type="hidden" id="note" name="note" value="<?php echo $note;?>">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                       
                       
                        <div class="card">
                            <div class="card-body">
                            <button type="button" class="btn btn-success margin-5" data-toggle="modal" data-target="#Modal2">
                                    Tambah
                                </button>
                                 <!-- Modal -->
                                 <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Gejala</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                     <form method="post" action="<?php echo base_url().'index.php/c_pakar/simpan_gejala_penyakit'?>">
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <select class="form-control" id="id_gejala" name="id_gejala" placeholder="Penyakit" value="">
                                        <option value="">Pilih Gejala</option>
                                   <?php
                                 foreach($data_g->result_array() as $is => $i):

                                  $id=$i['id'];
                                  $nama=$i['nama'];
                                  ?>
                                        <option value="<?php echo $id; ?>"><?php echo $nama; ?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <select class="form-control" id="id_penyakit" name="id_penyakit" placeholder="Penyakit" value="">
                                        <option value="">Pilih Penyakit</option>
                                   <?php
                                 foreach($data_p->result_array() as $is => $i):

                                  $id=$i['id'];
                                  $nama=$i['nama'];
                                  ?>
                                        <option value="<?php echo $id; ?>"><?php echo $nama; ?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="mb" name="mb" max="1" min="0" step="0.1" placeholder="Nilai MB" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="md" name="md" max="1" min="0" step="0.1" placeholder="Nilai MD" value="">
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                  
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                                </div>
                                <!-- Modal -->

                                <br> <br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Gejala</th>
                                                <th>Penyakit</th>
                                                <th>Nilai MB</th>
                                                <th>Nilai MD</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                         foreach($data->result_array() as $is => $i):
                                              $id=$i['id'];
                                              $id_gejala=$i['id_gejala'];
                                              $id_penyakit=$i['id_penyakit'];
                                              $nama_gejala=$i['nama_gejala'];
                                              $nama_penyakit=$i['nama_penyakit'];
                                              $mb=$i['mb'];
                                              $md=$i['md'];
                                          ?>
                                            <tr>
                                                <td><?php echo $is+1;?></td>
                                                <td><?php echo $nama_gejala;?></td>
                                                <td><?php echo $nama_penyakit;?></td>
                                                <td><?php echo $md;?></td>
                                                <td><?php echo $mb;?></td>
                                                  <td>  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modaledit<?php echo $id; ?>">
                                                    <i class="material-icons"></i>
                                                    <span>Edit</span>
                                                </button>
                                                    <a href="#" onclick="hapusData(<?php echo $id; ?>)">
                                                    <button type="button" class="btn btn-danger">Hapus</button></a>
                                            </td>
             
                                            </tr>
                                            <!-- Modal edit-->
                 <div class="modal fade" id="Modaledit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Gejala</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                     <form method="post" action="<?php echo base_url().'index.php/c_pakar/edit_gejala_penyakit'?>">
                            <div class="modal-body">
                                <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <select class="form-control" id="id_gejala" name="id_gejala" placeholder="Penyakit" value="">
                                        <option value="">Pilih Gejala</option>
                                   <?php
                                 foreach($data_g->result_array() as $isg => $ig):

                                  $id_gejalas=$ig['id'];
                                  $nama_gejalas=$ig['nama'];
                                  ?>
                                        <option value="<?php echo $id_gejalas; ?>" <?php if($id_gejalas==$id_gejala){echo "selected";} ?>><?php echo $nama_gejalas; ?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <select class="form-control" id="id_penyakit" name="id_penyakit" placeholder="Penyakit" value="">
                                        <option value="">Pilih Penyakit</option>
                                   <?php
                                 foreach($data_p->result_array() as $isp => $ip):

                                  $id_penyakits=$ip['id'];
                                  $nama_penyakits=$ip['nama'];
                                  ?>
                                        <option value="<?php echo $id_penyakits; ?>" <?php if($id_penyakits==$id_penyakit){echo "selected";} ?>><?php echo $nama_penyakits; ?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="mb" name="mb" max="1" min="0" step="0.1" placeholder="Nilai MB" value="<?php echo $mb;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="md" name="md" max="1" min="0" step="0.1" placeholder="Nilai MD" value="<?php echo $md;?>">
                                </div>
                            </div>
               
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- Modal edit-->
    
                                    <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

       
<?php include ('include/footer.php');?>
<script type="text/javascript">
    function hapusData(id){
    var r = confirm("Are you sure want to delete the data ?");
    if (r == true) {
        window.location ="<?php echo site_url('c_pakar/hapus_gejala_penyakit?id='); ?>"+id;
      } else {
      }
    }

    if (document.getElementById('note').value=="fail") {
        alert("Gejala Penyakit sudah ada!");
    }
</script>
</html>