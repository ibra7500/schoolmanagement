<div class="container">
    <h2 class="text-center mt-5">Data Mata Pelajaran</h2>
     <div class="col text-center">
            
            <a class="btn btn-outline-danger" href="<?= base_url(); ?>matpel/export_pdf" role="button">Export to PDF</a>
            <a class="btn btn-outline-success" href="<?= base_url(); ?>matpel/export_excel" role="button">Export to Excel</a>
    </div>
    <div class="table-responsive">
      <br />
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>ID Mata Pelajaran</th>
            <th>Nama Mata Pelajaran</th>
            <th>NIGN</th>
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
      url:"<?php echo base_url(); ?>matpel/load_data",
      dataType:"JSON",
      success:function(data){
        var html = '<tr>';
        html += '<td id="id_matpel" contenteditable placeholder="Masukkan ID Mata Pelajaran"></td>';
        html += '<td id="nama_matpel" contenteditable placeholder="Masukkan Nama Mata Pelajaran"></td>';
        html += '<td id="nign" contenteditable placeholder="Masukkan NIGN"></td>';
        html += '<td><button type="button" name="btn_add" id="btn_add" class="btn btn-success btn-sm">Tambah</button></td></tr>';
        for(var count = 0; count < data.length; count++)
        {
          html += '<tr>';
          html += '<td class="table_data" data-row_id="'+data[count].id_matpel+'" data-column_name="id_matpel">'+data[count].id_matpel+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].id_matpel+'" data-column_name="nama_matpel" contenteditable>'+data[count].nama_matpel+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].id_matpel+'" data-column_name="nign" contenteditable>'+data[count].nign+'</td>';
          html += '<td><button type="button" name="delete_btn" id="'+data[count].id_matpel+'" class="btn btn-sm btn-danger btn_delete">Hapus</button></td></tr>';
        
        }
        $('tbody').html(html);
      }
    });
  }

  load_data();

  $(document).on('click', '#btn_add', function(){
    var id_matpel = $('#id_matpel').text();
    var nama_matpel = $('#nama_matpel').text();
    var nign = $('#nign').text();
   
    if(id_matpel == '')
    {
      alert('Masukkan ID Mata Pelajaran!');
      return false;
    }
    
    if(nama_matpel == '')
    {
      alert('Masukkan Nama Mata Pelajaran!');
      return false;
    }
    
    if(nign == '')
    {
      alert('Masukkan NIGN');
      return false;
    }
    

    $.ajax({
      url:"<?php echo base_url(); ?>matpel/insert",
      method:"POST",
      data:{id_matpel:id_matpel, nama_matpel:nama_matpel, nign:nign},
      success:function(data){
        load_data();
      }
    })
  });

  $(document).on('blur', '.table_data', function(){
    var id_matpel = $(this).data('row_id');
    var table_column = $(this).data('column_name');
    var value = $(this).text();
    $.ajax({
      url:"<?php echo base_url(); ?>matpel/update",
      method:"POST",
      data:{id_matpel:id_matpel, table_column:table_column, value:value},
      success:function(data)
      {
        load_data();
      }
    })
  });

  $(document).on('click', '.btn_delete', function(){
    var id_matpel = $(this).attr('id');
    if(confirm("Anda yakin ingin menghapus data?"))
    {
      $.ajax({
        url:"<?php echo base_url(); ?>matpel/delete",
        method:"POST",
        data:{id_matpel:id_matpel},
        success:function(data){
          load_data();
        }
      })
    }
  });
  
});
</script>