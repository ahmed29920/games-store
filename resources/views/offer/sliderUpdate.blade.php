{{view('dashboard')}}
<div class="table-container">

    @if(Session('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif
    <!-- start form -->
    <form action = "/edit-slider/<?php echo $slidres[0]->id; ?>" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <!-- satrt table -->
        <table class="table table-dark table-striped">
            <!-- row -->
            <tr class="table-dark ">
                <td class="table-dark description">description</td>
                <td class="table-dark "> image  </td>
            </tr>
            <!-- row -->
            <tr class="table-dark ">
            <td class="table-dark description">
                    <input type = 'text' name = 'description' value = '<?php echo $slidres[0]->description; ?>' style="width:100"> 
            </td>
            <td class="table-dark "> <img src="{{ asset('upload/slider/' . $slidres[0]->image) }}"  style="width : 35% ; hight :20%"></td>
            </tr>
            <!-- row -->
            <tr class="table-dark ">
                <td class="table-dark ">
                 <input type = 'submit' value = "Update Product"  class="btn btn-success">
                </td>
                <td  class="table-dark ">
                <a class="btn btn-danger" href = " {{ url('sliders') }}"> BACK </a>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>