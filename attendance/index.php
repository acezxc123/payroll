<?php session_start(); ?>
<?php include 'header.php'; ?>

<body>

    <div class=" container px-4 mx-auto flex flex-col ">

        <!-- Popup Result -->
        <div class="justify-center flex py-6">

            <div class="alert alert-success flex items-center justify-between rounded-xl w-full md:w-96 gap-4 p-4 text-green-700 border rounded border-green-900/10 bg-green-50" role="alert" style="display: none;">
                <div class="flex items-center gap-4">
                    <span class="p-2 text-white bg-green-600 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    <p>
                        <strong class="text-sm font-medium"> Hooray! Page will refresh in 5 secs</strong>

                        <span class="block text-xs opacity-90">
                            <span class="result"><span class="message text-sm"></span></span>
                        </span>
                    </p>
                </div>
                <button class="opacity-90 alert-del" type="button">
                    <span class="sr-only"> Close </span>

                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="alert alert-danger flex items-center justify-between rounded-xl gap-4 p-4 text-red-700 border rounded border-red-900/10 bg-red-50" role="alert" style="display: none;">
                <div class="flex items-center gap-4">
                    <span class="p-2 text-white bg-red-600 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                        </svg>
                    </span>

                    <p>
                        <strong class="text-sm font-medium"> Uh-oh! Page will refresh in 5 secs</strong>

                        <span class="block text-xs opacity-90">
                            <span class="result"><span class="message text-sm"></span></span>
                        </span>
                    </p>
                </div>
                <button class="opacity-90 alert-del" type="button">
                    <span class="sr-only"> Close </span>

                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

<div class="" style="margin:auto;text-align: center;">
  <p class="hours">hr</p>
  <p class="minutes">min</p>
  <p class="seconds">sec</p>
  <p><?php echo date('F d, Y');?></p>
</div>

        <div class="text-center">
            <h1 class="font-medium text-gray-600 text-2xl md:text-3xl">Scan QR</h1>
        </div>
        <form id="attendance">
            <!-- Video Cam -->
            <div class="flex justify-center mt-4 w-auto mb-5">
                <video id="vid" class="border-2 border-gray-200 rounded-xl md:w-3/5" width="100%"></video>


            </div>

            <div class="flex justify-center">
                <!-- Toggle A -->
                <div class="flex items-center justify-center w-full mb-5">
                    <div>
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
                        </label>

                        <label class="btn btn-secondary">
                            <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                        </label>
                    </div>
                </div>

            </div>
            <div class="flex justify-center mt-4 mb-7 md:w-auto">
                <input type="text" name="employee" id="employee" readonly placeholder="QR-CODE" class="px-3 py-2 border border-gray-200 rounded-xl focus:border-red-400 bg-slate-50" />
            </div>
            <!-- Choose Status -->
            <div class="box justify-center flex">
                <select class="rounded-xl" name="status">
                    <option value="in">Time In</option>
                    <option value="out">Time Out</option>
                </select>
            </div>
        </form>
    </div>



    <?php include 'scripts.php'; ?>
    <script>
        // Production Script
        $(function() {
            var interval = setInterval(function() {
                var momentNow = moment();
                $("#date").html(momentNow.format("dddd").substring(0, 3).toUpperCase() + " - " +
                    momentNow.format("MMMM DD, YYYY"));
                $("#time").html(momentNow.format("hh:mm:ss A"));
            }, 100);

            $("#attendance").submit(function(e) {
                e.preventDefault();
                var attendance = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "attendance.php",
                    data: attendance,
                    dataType: "json",
                    success: function(response) {
                        if (response.error) {
                            console.log('error');
                            $(".alert").hide();
                            $(".alert-danger").fadeIn();
                            $(".message").html(response.message);
                            setTimeout(function() {
                                window.location.reload();
                            }, 5000);
                        } else {
                            console.log('success');
                            $(".alert").hide();
                            $(".alert-success").fadeIn();
                            $(".message").html(response.message);
                            $("#employee").val("");
                            setTimeout(function() {
                                window.location.reload();
                            }, 5000);
                        }
                    },
                });
                return false;
            });
        });


        let scanner = new Instascan.Scanner({
            video: document.getElementById("vid"),
            mirror: false,
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
                $('[name="options"]').on('change', function() {
                    if ($(this).val() == 1) {
                        if (cameras[0] != "") {
                            scanner.start(cameras[0]);
                        } else {
                            alert('No Front camera found!');
                        }
                    } else if ($(this).val() == 2) {
                        if (cameras[1] != "") {
                            scanner.start(cameras[1]);
                        } else {
                            alert('No Back camera found!');
                        }
                    }
                });
            } else {
                console.error('No cameras found.');
                alert('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
            alert(e);
        });
        scanner.addListener("scan", function(c) {
            document.getElementById("employee").value = c;
            // submit form
            $("#attendance").submit();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('select').niceSelect();
        });

        var alert_del = document.querySelectorAll('.alert-del');
        alert_del.forEach((x) =>
            x.addEventListener('click', function() {
                // fade close
                $(this).parent().fadeOut(500, function() {
                    $(this).remove();
                });
            })
        );
    </script>

    <script>
function checkTime(){
  var today = new Date();
  var hr = today.getHours();
  var min = today.getMinutes();
  var sec = today.getSeconds();
  var hours = document.querySelector(".hours");
  var minutes = document.querySelector(".minutes");
  var seconds = document.querySelector(".seconds");
  
  if(hr < 10){
    hr = "0" + hr;
  }
    if(min < 10){
    min = "0" + min;
  }
    if(sec < 10){
    sec = "0" + sec;
  }
  
  hours.textContent = hr + " : ";
  minutes.textContent = min + " : ";
  seconds.textContent = sec;
}

setInterval(checkTime, 500);
</script>
<style>
    .hours {
  float: left; 
  font-size: 25px;
  padding: 5px;
  color: #484848;
}

.minutes {
  color: #484848;
  float: left;
  font-size: 25px;
  padding: 5px;
}

.seconds {
  color: #484848;
  float: left;
  font-size: 25px;
  padding: 5px;
}

@media (min-width: 768px){
.md\:w-3\/5 {
    width: 50% !important;
}
}
</style>

    </html>
</body>