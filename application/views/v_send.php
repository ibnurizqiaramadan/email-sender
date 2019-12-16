<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="base_url" content="<?= base_url() ?>">
    <title>Welcome to Gmail sender</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/summernote/summernote-bs4.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/toastr/toastr.css') ?>">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $this->session->userdata('email') . " (<b>" . $this->session->userdata('name') . "</b>)" ?></h5>
                        <h5 class="card-title text-center"><a href="<?= base_url('keluar') ?>">Sign Out</a></h5>
                        <form class="form-signin">
                            <div class="form-group">
                                <label>Email address <b>(create new lines for multiple emails)</b></label>
                                <!-- <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus> -->
                                <textarea id="emails" class="form-control" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Subject</label>
                                <input class="form-control" id="subject" type="text">
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="konten" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>log</label>
                                <textarea id="log" class="form-control" rows="5" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" id="proses" style="width: 0%;">0%</div>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" id="btn_kirim" type="button">SEND</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/send.js') ?>"></script>
    <script src="<?= base_url('assets/toastr/toastr.min.js') ?>"></script>
    <script src="<?= base_url('assets/summernote/summernote-bs4.js') ?>"></script>
</body>

</html>