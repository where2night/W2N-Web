$(document).ready(function() { 
      //Upload image
      $('#photoimg').on('change', function(){ 
        $("#preview").html('');
        $("#preview").html('<img src="../images/edit/loader.gif" alt="Subiendo imagen..."/>');

        $("#imageform").ajaxForm({
            target: '#preview'
        }).submit();
    
      });
  }); 