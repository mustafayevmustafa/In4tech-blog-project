<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('Admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('Admin/css/sb-Admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('Admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 20% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            position: relative;
        }

        .close {
            position: absolute;
            right: 10px;
            top: 10px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .drop-zone {
            border: 2px dashed #000;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }

        .drop-zone.dragover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        #fileInput {
            display: none;
        }
    </style>

</head>
