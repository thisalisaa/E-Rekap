<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivasi Akun</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .activation-container {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .activation-container img {
            max-width: 80px;
            margin-bottom: 10px;
        }

        .activation-container h6 {
            margin-bottom: 20px;
            color: #333;
            font-size: 16px;
        }

        .form-control {
            border-radius: 20px;
            border-color: #d1d1d1;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #000;
            box-shadow: none;
        }

        .btn-activation {
            background-color: #000;
            color: #fff;
            border-radius: 20px;
            width: 100%;
            transition: background-color 0.3s;
        }

        .btn-activation:hover {
            background-color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .activation-container {
                padding: 20px;
            }

            .activation-container img {
                max-width: 60px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .btn-activation {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="activation-container">
        <!-- Logo Aplikasi -->
        <div>
            <img src="{{ asset('assets/image/voting-box.png') }}" alt="Logo Aplikasi">
            <h6>Aplikasi Rekap Hasil Pemilu</h6>
        </div>
        <form action="{{ route('activation.submit') }}" method="POST">
            @csrf
            <!-- Kode Aktivasi -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="text" name="activation_code" id="activation_code" class="form-control" placeholder="Kode Aktivasi">
                </div>
            </div>

            <button type="submit" class="btn btn-activation">Aktivasi</button>
        </form>
    </div>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
