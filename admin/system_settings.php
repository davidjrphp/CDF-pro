<style>
    img#cimg {
        height: 15vh;
        width: 15vh;
        object-fit: cover;
        border-radius: 100% 100%;
    }

    img#cimg2 {
        height: 50vh;
        width: 100%;
        object-fit: contain;
        /* border-radius: 100% 100%; */
    }

    .new_station,
    .new_cop,
    .view_cop,
    .view_kra,
    .backup {
        border-radius: 444px
    }
</style>
<div class="col-lg-12">
    <div class="card card-outline rounded-0 card-primary">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <a class="btn btn-outline btn-md btn-default btn-light bg-success border-navy" id="toggle-settings" href="javascript:void(0)">
                        <i class="fa fa-cog"></i> Settings
                    </a>
                </div>
            </div>
            <div id="settings-buttons" style="display: none;">
                <div class="row">
                    <div class="col-md-2">
                        <a class="btn btn-block btn-sm btn-default btn-light bg-success border-navy new_station" href="javascript:void(0"><i class="fa fa-plus"></i> Constituency</a>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-block btn-sm btn-default btn-light bg-success border-primary view_kra" href="./index.php?page=constituencies"><i class="fa fa-eye"></i> View Constituencies</a>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-block btn-sm btn-default btn-light bg-success border-primary new_cop" href="javascript:void(0)"><i class="fa fa-plus"></i> </a>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-block btn-sm btn-default btn-light bg-success border-primary view_cop" href="./index.php?page=view_cops"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="" id="system-frm">
                <div id="msg" class="form-group"></div>
                <div class="form-group">
                    <label for="name" class="control-label">System Name</label>
                    <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?php echo $_SESSION['system']['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="short_name" class="control-label">System Short Name</label>
                    <input type="text" class="form-control form-control-sm" name="short_name" id="short_name" value="<?php echo $_SESSION['system']['short_form'] ?>">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">About (CDF)</label>
                    <textarea name="content[about]" id="" cols="30" rows="2" class="form-control summernote"><?php echo  is_file('about.html') ? file_get_contents('about.html') : "" ?></textarea>
                </div>

                <div class="form-group">
                    <label for="" class="control-label">System Logo</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input rounded-circle" id="customFile1" name="img" onchange="displayImg(this,$(this))">
                        <label class="custom-file-label" for="customFile1">Choose file</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center align-items-center">
                    <img src="<?php echo isset($avatar) ? '../assets/uploads/' . $avatar : '' ?>" alt="" id="cimg" class="img-fluid img-thumbnail ">
                </div>
                <hr>
                <div class="col-lg-12 text-right justify-content-center d-flex">
                    <button class="btn btn-light bg-success mr-2" form="system-frm">Update</button>
                    <button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=employee_list'">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function displayImg(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#cimg').attr('src', e.target.result);
                _this.siblings('.custom-file-label').html(input.files[0].name)
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function displayImg2(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                _this.siblings('.custom-file-label').html(input.files[0].name)
                $('#cimg2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function displayImg3(input, _this) {
        var fnames = [];
        Object.keys(input.files).map(function(k) {
            fnames.push(input.files[k].name)

        })
        _this.siblings('.custom-file-label').html(fnames.join(", "))
    }

    document.getElementById('toggle-settings').addEventListener('click', function() {
        var settingsButtons = document.getElementById('settings-buttons');
        if (settingsButtons.style.display === 'none') {
            settingsButtons.style.display = 'block';
        } else {
            settingsButtons.style.display = 'none';
        }
    });

    $('#system-frm').submit(function(e) {
        e.preventDefault()
        start_load()
        $.ajax({
            url: 'ajax.php?action=save_system',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                if (resp == 1) {
                    alert_toast('System Information successfully Updated', "success");
                    setTimeout(function() {
                        location.replace('index.php?page=system_information')
                    }, 1500)
                }
            }
        })
    })

    $(document).ready(function() {
        $('.rem_img').click(function() {
            _conf("Are sure to delete this image permanently?", 'delete_img', ["'" + $(this).attr('data-path') + "'"])
        })
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ol', 'ul', 'paragraph', 'height']],
                ['table', ['table']],
                ['view', ['undo', 'redo', 'fullscreen', 'help']]
            ]
        })
        $('.new_cop').click(function() {
            uni_modal("New Country Operation Plan", "new_cop.php")
        })
        $('.new_station').click(function() {
            uni_modal("Enter New Station", "station.php")
        })
    })
</script>