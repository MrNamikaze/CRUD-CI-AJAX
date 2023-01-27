        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Profile saya</h1>
            <table class="table">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA</th>
                  <th>EMAIL</th>
                  <th>NO HP</th>
                  <th>FOTO</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody id="TargetData">
                
              </tbody>
            </table>

        </div>
<div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
 
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Edit Data</h4>
          </div>
          <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="idkaryawan">Id Karyawan</label>
                    <input type="text" name="idkaryawan_edit" class="form-control" readonly></input>
                </div>
                <div class="form-group">
                    <label for="namalengkap">Nama Lengkap</label>
                    <input type="text" name="nama_edit" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email_edit" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="nohp">NO HP</label>
                    <input type="text" name="nohp_edit" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="text" name="foto_edit" class="form-control"></input>
                </div>
 
            </form>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-success" id="btn_update_data">Update</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
 
      </div>
    </div>
        
<script type="text/javascript" src="<?php echo base_url().'assets/js/jQuery-3.3.1/jquery-3.3.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jQuery-3.3.1/jquery-3.3.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.js'?>"></script>
<br><script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>

<script type="text/javascript">
  $(document).ready(function(){
    tampil_data();   //pemanggilan fungsi tampil barang.
         
        $('#mydata').dataTable();
          
        //fungsi tampil barang
        function tampil_data(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url("user/ambildata")?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].idkaryawan+'</td>'+
                                '<td>'+data[i].namalengkap+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td>'+data[i].nohp+'</td>'+
                                '<td>'+data[i].foto+'</td>'+
                                '<td style="width: 16.66%;">' + '<span><button data-id="'+data[i].idkaryawan+'" class="btn btn-primary btn_edit">Edit</button><button style="margin-left: 5px;" data-id="'+data[i].idkaryawan+'" class="btn btn-danger btn_hapus">Hapus</button></span>'  + '</td>'

                                '</tr>';
                    }
                    $('#TargetData').html(html);
                }
 
            });
  }
  $("#TargetData").on('click','.btn_hapus',function(){
            var idkaryawan = $(this).attr('data-id');
            var status = confirm('Yakin ingin menghapus?');
            if(status){
                $.ajax({
                    url: '<?php echo base_url('user/hapusData'); ?>',
                    type: 'POST',
                    data: {idkaryawan:idkaryawan},
                    success: function(response){
                        tampil_data();
                    }
                })
            }
        })
  $("#TargetData").on('click','.btn_edit',function(){
            var idkaryawan = $(this).attr('data-id');
            $.ajax({
                url: '<?php echo base_url('user/ambilDataKaryawan'); ?>',
                type: 'POST',
                data: {idkaryawan:idkaryawan},
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    $("#editModal").modal('show');
                    $('input[name="idkaryawan_edit"]').val(response[0].idkaryawan);
                    $('input[name="nama_edit"]').val(response[0].namalengkap);
                    $('input[name="email_edit"]').val(response[0].email);
                    $('input[name="nohp_edit"]').val(response[0].nohp);
                    $('input[name="foto_edit"]').val(response[0].foto);
                }
            })
        });
  $("#btn_update_data").on('click',function(){
            var idkaryawan = $('input[name="idkaryawan_edit"]').val();
            var namalengkap = $('input[name="nama_edit"]').val();
            var email = $('input[name="email_edit"]').val();
            var nohp = $('input[name="nohp_edit"]').val();
            var foto = $('input[name="foto_edit"]').val();
            $.ajax({
                url: '<?php echo base_url('user/updateData'); ?>',
                type: 'POST',
                data: {idkaryawan:idkaryawan,namalengkap:namalengkap,email:email,nohp:nohp,foto:foto},
                success: function(response){
                    $('input[name="idkaryawan_edit"]').val("");
                    $('input[name="nama_edit"]').val("");
                    $('input[name="email_edit"]').val("");
                    $('input[name="nohp_edit"]').val("");
                    $('input[name="foto_edit"]').val("");
                    $("#editModal").modal('hide');
                    tampil_data();
                }
            })
 
        });
});


</script>
    

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      