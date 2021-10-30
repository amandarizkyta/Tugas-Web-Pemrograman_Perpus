<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>👨‍👧‍👧Login Admin</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom css -->
    <link href="assets/login.css" rel="stylesheet">
</head>

<body class="text-center">
    
    <main class="form-signin">
    <!-- <form method="post" action="loginProcess.php"> -->
    <!-- ngga pake form soalnya mau validasi ajax biar bisa pake alert sweet alert hehe  -->
        <i class="fas fa-book-reader"></i>
        <h1 class="h3 mb-3 fw-normal">Perpustakaan MariBaca</h1>
        <h3 class="h5 mb-3 fw-normal">Silahkan Login</h3>

        <div class="form-floating">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        </div>

        <button id="masuk" class="w-100 btn btn-lg btn-primary" type="submit" >Masuk</button>
        <!-- <input type="submit" class="w-100 btn btn-lg btn-primary" type="submit" value="Masuk"></input> -->
    <!-- </form> -->
    </main>

<!-- Javascript jquery, bootstrap, dan sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script>
   $(document).ready(function() {
      $("#masuk").click( function() {

        //identifikasi input
        var email = $("#floatingInput").val(); 
        var password = $("#floatingPassword").val();

          //cek kalo inputan email kosong
          if(email.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Email Wajib Diisi !'
            });
            
          } else if(password.length == "") { //cek kalo inputan password kosong

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            })
          }else{
            //mulai validasi pake ajax
            $.ajax({
              url: "loginProcess.php", //lokasi tukar data
              type: "POST",
              data: { //data pake variabel yang diatas 
                  "email": email,
                  "password": password
              },
              dataType : 'json', //untuk response
              //jika ajax sukses 
              success:function(response){
                //jika response true
                if (response.return) { 
                  window.location.href = "index.php";
                  console.log("ini bisa");
                } else { //jika response false
                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'silahkan coba lagi!'
                    });
                  console.log("ini ga bisa");
                }

                console.log(response);

              },

              //jika ajax gagal
              error:function(response){

                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);

              }

            });//ajax selesai

          }

      });

    });
</script>
</body>
</html>