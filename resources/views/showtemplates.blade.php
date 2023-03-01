<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container ">
    <div class="row">
        <div class="col-12">
            <h5 class="mt-3 mb-5">Email Templates</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Template Id</th>
                        <th scope="col">Template</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($templates as $index=> $template )
                        <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{$template->Templateid}}</td>
                        <td>{{$template->Template}}</td>
                        </tr>
                        @endforeach

                   

                </tbody>
            </table>
        </div>

        <div>
            <a href="/home"><button class="btn btn-primary">Back</button></a>
        </div>
    </div>
</div>