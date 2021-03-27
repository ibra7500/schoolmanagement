<div class="container">
    <h2 class="text-center mt-5">Data Siswa 9-B</h2>
    <div class="col text-center">
            <a class="btn btn-outline-secondary" href="<?= base_url(); ?>siswa9b/chart" role="button">Chart</a>
            <a class="btn btn-outline-danger" href="<?= base_url(); ?>siswa9b/export_pdf" role="button">Export to PDF</a>
            <a class="btn btn-outline-success" href="<?= base_url(); ?>siswa9b/export_excel" role="button">Export to Excel</a>
    </div>

    <div class="table-responsive">
      <br />
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>NISN</th>
            <th>ID Kelas</th>
            <th>Nama</th>
            <th>TTL</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telpon</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>   
    </div>
  </div>
</body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
  
  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>siswa9b/load_data",
      dataType:"JSON",
      success:function(data){
        var html = '<tr>';
        html += '<td id="nisn" contenteditable placeholder="Masukkan NISN"></td>';
        html += '<td id="id_kelas" value="KLS0092">KLS0092</td>';
        html += '<td id="nama_siswa" contenteditable placeholder="Masukkan Nama Siswa"></td>';
        html += '<td id="ttl" contenteditable placeholder="Masukkan Tempat, Tanggal Lahir"></td>';
        html += '<td id="jk" contenteditable placeholder="Masukkan Jenis Kelamin"></td>';
        html += '<td id="alamat" contenteditable placeholder="Masukkan Alamat"></td>';
        html += '<td id="no_telp" contenteditable placeholder="Masukkan No Telpon"></td>';
        html += '<td id="email" contenteditable placeholder="Masukkan Email"></td>';
        html += '<td><button type="button" name="btn_add" id="btn_add" class="btn btn-success btn-sm">Tambah</button></td></tr>';
        for(var count = 0; count < data.length; count++)
        {
          html += '<tr>';
          html += '<td class="table_data" data-row_id="'+data[count].nisn+'" data-column_name="nisn">'+data[count].nisn+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].nisn+'" data-column_name="id_kelas">'+data[count].id_kelas+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].nisn+'" data-column_name="nama_siswa" contenteditable>'+data[count].nama_siswa+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].nisn+'" data-column_name="ttl">'+data[count].ttl+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].nisn+'" data-column_name="jk">'+data[count].jk+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].nisn+'" data-column_name="alamat" contenteditable>'+data[count].alamat+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].nisn+'" data-column_name="no_telp" contenteditable>'+data[count].no_telp+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].nisn+'" data-column_name="email" contenteditable>'+data[count].email+'</td>';
          html += '<td><button type="button" name="delete_btn" id="'+data[count].nisn+'" class="btn btn-sm btn-danger btn_delete">Hapus</button></td></tr>';
        }
        $('tbody').html(html);
      }
    });
  }

  load_data();

  $(document).on('click', '#btn_add', function(){
    var nisn = $('#nisn').text();
    var id_kelas = $('#id_kelas').text();
    var nama_siswa = $('#nama_siswa').text();
    var ttl = $('#ttl').text();
    var jk = $('#jk').text();
    var alamat = $('#alamat').text();
    var no_telp = $('#no_telp').text();
    var email = $('#email').text();
    
    if(nisn == '')
    {
      alert('Masukkan NISN!');
      return false;
    }
    
    if(nama_siswa == '')
    {
      alert('Masukkan Nama Siswa!');
      return false;
    }
    
    if(ttl == '')
    {
      alert('Masukkan Tempat, Tanggal Lahir!');
      return false;
    }
    
     if(jk == '')
    {
      alert('Masukkan Jenis Kelamin!');
      return false;
    }

    if(alamat == '')
    {
      alert('Masukkan Alamat!');
      return false;
    }

    if(no_telp == '')
    {
      alert('Masukkan Nomor Telpon!');
      return false;
    }

    if(email == '')
    {
      alert('Masukkan Email!');
      return false;
    }

    $.ajax({
      url:"<?php echo base_url(); ?>siswa9b/insert",
      method:"POST",
      data:{nisn:nisn, id_kelas:id_kelas, nama_siswa:nama_siswa, ttl:ttl, jk:jk, alamat:alamat, no_telp:no_telp, email:email},
      success:function(data){
        load_data();
      }
    })
  });

  $(document).on('blur', '.table_data', function(){
    var nisn = $(this).data('row_id');
    var table_column = $(this).data('column_name');
    var value = $(this).text();
    $.ajax({
      url:"<?php echo base_url(); ?>siswa9b/update",
      method:"POST",
      data:{nisn:nisn, table_column:table_column, value:value},
      success:function(data)
      {
        load_data();
      }
    })
  });

  $(document).on('click', '.btn_delete', function(){
    var nisn = $(this).attr('id');
    if(confirm("Anda yakin ingin menghapus data?"))
    {
      $.ajax({
        url:"<?php echo base_url(); ?>siswa9b/delete",
        method:"POST",
        data:{nisn:nisn},
        success:function(data){
          load_data();
        }
      })
    }
  });
  
});
</script>