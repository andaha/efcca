$(function() {
    
    //DataTable
    $('.datatable').DataTable(); 
    
    //Clickable Card
    $('.link-card').on('click', function() {
        window.document.location = $(this).data("card-link");
    }); 
    
    //Clickable Card
    $('.linkrow').on('click', function() {
        window.document.location = $(this).data("row-link");
    });
    
    //Cancel Button
    $('.cancel-btn').on('click', function() {
        let $confirm = confirm("Are you sure you want to cancel this operation?");
        if($confirm) {
            window.location.href = $(this).data('cancel-link');
        }
    });
    
    //Delete Operations
    $('.do-delete').on('click', function(ev) {
        ev.preventDefault();
        $delete = confirm('Are you sure you want to delete this record?');
        if($delete) {
            window.location.href = $(this).attr('href');
        }
    });
    
    //State Selector
    $('#selState').on('change', function() {
        let state = this.options[this.selectedIndex].text; //or jquery way below
        //let $state = $(this).children('option:selected').text();
       $.post('jxify/getLGA.php', { stateid: $(this).val() }, function(data, err) {
           $('#selLGA').html(data);
           $('#stateVal').val(state);
        });
    });
    
    
    //Select, Crop and Set Staff Picture for Upload
    let pickPhoto = $('#pickPhoto'),
        $cropArea = $('#cropArea'),
        $cropImageModal = $('#cropImageModal'),
        $cropImageBtn = $('#cropImageBtn');
    
    //Crop Are Definition
    $cropArea.croppie({
        enableExif: true,
        enableResize: true,
        viewport: {
            width: 300,
            height: 200,
            type: "square" // you can also use circle
        },
        boundary: {
            width: 400,
            height: 300
        }
    });
    
    //Photo Select / Picker(Browser)
    pickPhoto.on('change', function() {
        let photo = this.files[0],
            dispPhoto = document.querySelector('#dispPhoto'),
            imgData = document.querySelector('#imgData'),
            reader = new FileReader();
        
        reader.addEventListener('load', () => {
            $cropArea.croppie('bind', { url: reader.result });
            
            $cropImageModal.modal();
        }, false);
        (photo) ? reader.readAsDataURL(photo) : console.log("Error");
    });
    
    //Image Crop and Save Button
    $cropImageBtn.on('click', function(ev) {
       $cropArea.croppie('result', {
           type: 'canvas',
           size: 'viewport'
       }).then(function(response) {
           dispPhoto.setAttribute('src', response);
           imgData.value = response;
           $cropImageModal.modal('hide');
       });
    });
});