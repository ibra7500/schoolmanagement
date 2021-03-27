<div class="container">
    <h2 class="text-center mt-5">Login Aplikasi</h2>
            <div class="card">
                    <div class="card-body">
                         <form action="<?php echo base_url('home/aksi_login'); ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username"></div>
                        <div class="form-group">
                            <label for="nama">Password</label>
                                <input type="password" name="password" class="form-control" id="password"></div>
                        <div class="form-group">
                            <div class="col text-center">
                                <button type="submit" name="login" class="btn btn-primary">Login</button></div> 
                        </div>
</div>