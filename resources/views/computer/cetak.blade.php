<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>Data Computer</title>

    <style>
        body{
            margin: -30px -20px !important;
        }
    </style>
</head>

<body>
    
    <h4 class="text-center mb-4">Spesifikasi Komputer</h4>
        <center>
            <img src="http://smkn1jakarta.sch.id/wp-content/uploads/2016/11/SMKN1-JAKARTA.png" alt="" width="100px">
        </center>
        
        <table class="table table-bordered table-striped mt-4 mb-4">
            <thead>
                <tr>
                    <th scope="col" colspan="2" style="text-align: center">Spesifikasi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">No</th>
                    <td>{{ $computer->no }}</td>
                </tr>
                <tr>
                    <th scope="row">Lokasi</th>
                    <td>{{ $computer->location->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Procesor</th>
                    <td>{{ $computer->procesor }}</td>
                </tr>
                <tr>
                    <th scope="row">Memory</th>
                    <td>{{ $computer->memory }} GB</td>
                </tr>
                <tr>
                    <th scope="row">HardDisk</th>
                    <td>{{ $computer->harddisk }}</td>
                </tr>
                <tr>
                    <th scope="row">VGA</th>
                    <td>{{ $computer->vga }}</td>
                </tr>
                <tr>
                    <th scope="row">Kondisi</th>
                    <td>
                        @if ($computer->condition == "Hidup")
                            <span class="badge badge-success" style="font-size: 15px;padding: 5px 40px;border-radius: 50px">{{ $computer->condition }}</span>
                        @elseif($computer->condition == "Mati")
                            <span class="badge badge-danger" style="font-size: 15px;padding: 5px 40px;border-radius: 50px">{{ $computer->condition }}</span>
                        @else
                            <span class="badge badge-warning" style="font-size: 15px;padding: 5px 40px;border-radius: 50px">{{ $computer->condition }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">Network</th>
                    <td>{{ $computer->network }}</td>
                </tr>
                <tr>
                    <th scope="row">Monitor</th>
                    <td>{{ $computer->monitor }}</td>
                </tr>
                <tr>
                    <th scope="row">Mouse</th>
                    <td>{{ $computer->mouse }}</td>
                </tr>
                <tr>
                    <th scope="row">Keyboard</th>
                    <td>{{ $computer->keyboard }}</td>
                </tr>
                <tr>
                    <th scope="row">Type</th>
                    <td>{{ $computer->type }}</td>
                </tr>
                <tr>
                    <th scope="row">Keterangan</th>
                    <td>{{ $computer->description }}</td>
                </tr>
                <tr>
                    <th scope="row">Foto</th>
                    <td>
                        <img src="{{ public_path('/computers/'.$computer->image) }}" alt="" width="50px" height="50px">
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="text-muted" style="font-size: 12px;text-align:center">&copy; E - Computer SMKN 1 JAKARTA</p>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>