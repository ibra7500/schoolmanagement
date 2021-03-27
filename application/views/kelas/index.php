<div class="container">
    <h2 class="text-center mt-5">Data Kelas</h2>
    <div class="col text-center">
            <a class="btn btn-outline-secondary" href="<?= base_url(); ?>kelas/chart" role="button">Chart</a>
            <a class="btn btn-outline-danger" href="<?= base_url(); ?>kelas/export_pdf" role="button">Export to PDF</a>
            <a class="btn btn-outline-success" href="<?= base_url(); ?>kelas/export_excel" role="button">Export to Excel</a>

    </div>
    <div class="table-responsive">
      <br />
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>ID Kelas</th>
            <th>Kelas</th>
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
      url:"<?php echo base_url(); ?>kelas/load_data",
      dataType:"JSON",
      success:function(data){
        var html = '';
        for(var count = 0; count < data.length; count++)
        {
          html += '<tr>';
          html += '<td class="table_data" data-row_id="'+data[count].id_kelas+'" data-column_name="id_kelas">'+data[count].id_kelas+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].id_kelas+'" data-column_name="nama_matpel" contenteditable>'+data[count].kelas+'</td>';
        }
        $('tbody').html(html);
      }
    });
  }

  load_data();

});
</script>