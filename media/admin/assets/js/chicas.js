$(document).ready(function () {

    // Upload Foto
    $('#fotos-uploader').fineUploader({
      request: {
        endpoint: '<?=base_url()?>en/admin/chicas/upload',
        params: {
          propiedad_id: '<?php if (isset($row->id)) echo $row->id;?>'
       }
      },
      validation: {
        allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']//,
        //sizeLimit: 51200 // 50 kB = 50 * 1024 bytes
      },
      text: {
        uploadButton: 'Click o Arrastra'
      },
     /* showMessage: function(message) {
        $('#jquery-wrapped-fine-uploader').append('<div class="alert alert-error">' + message + '</div>');
      }*/
    }).on('complete', function(event, id, fileName, responseJSON) {
      if (responseJSON.success) {
        var div_img = '<div class="thumb">'
                        +'<img src="<?=base_url()?>scr/mthumb.php?src='+responseJSON.data+'&w=&h=100&zc=1&a=c" alt="">'
                        +'<div class="foto_orden">'
                            +'<label for="ordenes">Orden:</label>'
                            +'<input type="text" name="ordenes['+responseJSON.id+']" value="0"/>'
                        +'</div>'
                    +'</div>';
        $('.img-preview-upload').append(div_img);
        
        var ids  = '';
        var ids_ = new Array();
        
        if( $('#fotos_ids').val() != '' )
        {
            ids = $('#fotos_ids').val();
            ids_ = ids.split(",");
        }
        
        ids_.push(responseJSON.id);
        ids_.toString();
        
        $('#fotos_ids').val(ids_);
      }
    });


    $('.del').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        fotos_delete(id);               
    });

    function fotos_delete(id){
        $.post('<?=base_url()?>en/admin/chicas/delete_foto/'+id, function(data) {
            
            $('#foto_'+id).fadeOut('slow', function() {
                $(this).remove();
            });
            
            var ids  = '';
            var ids_ = new Array();
                            
            if( $('#fotos_ids').val() != '' )
            {
                ids = $('#fotos_ids').val();
                ids_ = ids.split(",");
            }
                            
            for(var i = ids_.length; i--;){
                if ( ids_[i] === String(id) ) ids_.splice(i, 1);
            }
            
            ids_.toString();
            $('#fotos_ids').val(ids_);
            
        });
    }
});